package controllers

import (
	"encoding/json"
	"io/ioutil"
	"log"
	"net/http"

	"github.com/gin-gonic/gin"
	"gorm.io/driver/mysql"
	"gorm.io/gorm"

	"silirapi/models"
)

func GetCategory(c *gin.Context) {
	dsn := "root:@tcp(127.0.0.1:3306)/silir-api?charset=utf8mb4&parseTime=True&loc=Local"
	db, err := gorm.Open(mysql.Open(dsn), &gorm.Config{})
	_ = err
	id := c.Param("id")

	if id == "" {
		categories := []models.KategoriWahana{}
		result := db.Model(&[]models.KategoriWahana{}).Preload("Wahana").Table("kategori_wahanas").Find(&categories)
		_ = result
		c.JSON(http.StatusOK, gin.H{
			"status": "1",
			"data":   categories,
		})
	} else {
		categories := []models.KategoriWahana{}
		result := db.Model(&[]models.KategoriWahana{}).Preload("Wahana").Table("kategori_wahanas").Find(&categories, "id = ?", id)
		_ = result
		c.JSON(http.StatusOK, gin.H{
			"status": "1",
			"data":   categories,
		})
	}
}

func StoreCategory(c *gin.Context) {
	dsn := "root:@tcp(127.0.0.1:3306)/silir-api?charset=utf8mb4&parseTime=True&loc=Local"
	db, err := gorm.Open(mysql.Open(dsn), &gorm.Config{})
	_ = err
	bodyByte, err := ioutil.ReadAll(c.Request.Body)
	if err != nil {
		log.Println(err)
		c.JSON(http.StatusBadRequest, gin.H{
			"message": "error",
		})
		return
	}
	var request models.KategoriWahanaRequest
	err = json.Unmarshal(bodyByte, &request)

	var count int64

	db.Model(&models.KategoriWahana{}).Count(&count)

	category_id := 50000000 + uint(count)

	db.Create(&models.KategoriWahana{
		Model:         gorm.Model{ID: category_id},
		Nama_kategori: request.Nama_kategori,
		Available:     request.Available,
	})
}

func UpdateCategory(c *gin.Context) {
	dsn := "root:@tcp(127.0.0.1:3306)/silir-api?charset=utf8mb4&parseTime=True&loc=Local"
	db, err := gorm.Open(mysql.Open(dsn), &gorm.Config{})
	_ = err
	id := c.Param("id")

	bodyByte, err := ioutil.ReadAll(c.Request.Body)
	if err != nil {
		log.Println(err)
		c.JSON(http.StatusBadRequest, gin.H{
			"message": "error",
		})
		return
	}
	var request models.KategoriWahanaRequest
	err = json.Unmarshal(bodyByte, &request)

	result := db.Model(models.KategoriWahana{}).Where("id = ?", id).Select("nama_kategori", "available").Updates(
		models.KategoriWahana{
			Nama_kategori: request.Nama_kategori,
			Available:     request.Available,
		})

	if result.Error != nil {
		c.JSON(http.StatusBadRequest, gin.H{
			"message": result.Error,
		})
	}
}
