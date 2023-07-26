package controllers

import (
	"encoding/json"
	"io/ioutil"
	"log"
	"net/http"

	"github.com/gin-gonic/gin"
	"gorm.io/gorm"

	"silirapi/config"
	"silirapi/entity/model"
	"silirapi/entity/request"
	"silirapi/entity/response"
)

func GetCategory(c *gin.Context) {
	db, err := config.Conn()
	if err != nil {
		panic(err)
	}
	id := c.Param("id")

	if id == "" {
		categories := []response.APIKategori{}
		result := db.Model(&[]model.KategoriWahana{}).Preload("Wahana").Table("kategori_wahanas").Find(&categories)
		_ = result
		c.JSON(http.StatusOK, gin.H{
			"status": "1",
			"data":   categories,
		})
	} else {
		categories := response.APIKategori{}
		result := db.Model(&model.KategoriWahana{}).Preload("Wahana").Table("kategori_wahanas").Find(&categories, "id = ?", id)
		_ = result
		total := 0
		for _, element := range categories.Wahana {
			total += int(element.Fee)
		}
		c.JSON(http.StatusOK, gin.H{
			"id":            categories.ID,
			"nama_kategori": categories.Nama_kategori,
			"total":         total,
			"wahana":        categories.Wahana,
		})
	}
}

func StoreCategory(c *gin.Context) {
	db, err := config.Conn()
	if err != nil {
		panic(err)
	}
	bodyByte, err := ioutil.ReadAll(c.Request.Body)
	if err != nil {
		log.Println(err)
		c.JSON(http.StatusBadRequest, gin.H{
			"message": "error",
		})
		return
	}
	var request request.Kategori
	err = json.Unmarshal(bodyByte, &request)

	var count int64

	db.Model(&model.KategoriWahana{}).Count(&count)

	category_id := 50000000 + uint(count)

	db.Create(&model.KategoriWahana{
		Model:         gorm.Model{ID: category_id},
		Nama_kategori: request.Nama_kategori,
		Available:     request.Available,
	})
}

func UpdateCategory(c *gin.Context) {
	db, err := config.Conn()
	if err != nil {
		panic(err)
	}
	id := c.Param("id")

	bodyByte, err := ioutil.ReadAll(c.Request.Body)
	if err != nil {
		log.Println(err)
		c.JSON(http.StatusBadRequest, gin.H{
			"message": "error",
		})
		return
	}
	var request request.Kategori
	err = json.Unmarshal(bodyByte, &request)

	result := db.Model(model.KategoriWahana{}).Where("id = ?", id).Select("nama_kategori", "available").Updates(
		model.KategoriWahana{
			Nama_kategori: request.Nama_kategori,
			Available:     request.Available,
		})

	if result.Error != nil {
		c.JSON(http.StatusBadRequest, gin.H{
			"message": result.Error,
		})
	}
}
