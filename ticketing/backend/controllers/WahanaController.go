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

func GetRide(c *gin.Context) {
	// if IsAuth(c) != true {
	// 	c.JSON(http.StatusForbidden, gin.H{})
	// 	return
	// }

	dsn := "root:@tcp(127.0.0.1:3306)/silir-api?charset=utf8mb4&parseTime=True&loc=Local"
	db, err := gorm.Open(mysql.Open(dsn), &gorm.Config{})
	_ = err
	id := c.Param("id")

	if id == "" {
		wahanas := []models.Wahana{}
		result := db.Model(&[]models.Wahana{}).Preload("KategoriWahana").Find(&wahanas)
		_ = result
		c.JSON(http.StatusOK, gin.H{
			"status": "1",
			"data":   wahanas,
		})
	} else {
		wahanas := []models.Wahana{}
		result := db.Model(&[]models.Wahana{}).Preload("KategoriWahana").Find(&wahanas, "id = ?", id)
		_ = result
		c.JSON(http.StatusOK, gin.H{
			"status": "1",
			"data":   wahanas,
		})
	}
}

func StoreRide(c *gin.Context) {

	// if IsAdmin(c) != true {
	// 	c.JSON(http.StatusUnauthorized, gin.H{})
	// 	return
	// }

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
	var request models.WahanaRequest
	err = json.Unmarshal(bodyByte, &request)

	var count int64

	db.Model(&models.Wahana{}).Count(&count)

	ride_id := 60000000 + uint(count)

	db.Create(&models.Wahana{
		Model:       gorm.Model{ID: ride_id},
		Id_kategori: request.Id_kategori,
		Nama_wahana: request.Nama_wahana,
		Fee:         request.Fee,
	})
}

func UpdateRide(c *gin.Context) {
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
	var request models.WahanaRequest
	err = json.Unmarshal(bodyByte, &request)

	result := db.Model(models.Wahana{}).Where("id = ?", id).Updates(
		models.Wahana{
			Id_kategori: request.Id_kategori,
			Nama_wahana: request.Nama_wahana,
			Fee:         request.Fee,
		})

	if result.Error != nil {
		c.JSON(http.StatusBadRequest, gin.H{
			"message": result.Error,
		})
	}
}
