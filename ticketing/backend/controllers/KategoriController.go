package controllers

import (
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
