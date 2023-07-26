package controllers

import (
	"net/http"

	"github.com/gin-gonic/gin"
	"gorm.io/driver/mysql"
	"gorm.io/gorm"

	"silirapi/models"
	"silirapi/models/responses"
)

func GetTransaction(c *gin.Context) {
	dsn := "root:@tcp(127.0.0.1:3306)/silir-api?charset=utf8mb4&parseTime=True&loc=Local"
	db, err := gorm.Open(mysql.Open(dsn), &gorm.Config{})
	_ = err
	id := c.Param("id")

	if id == "" {
		tickets := []responses.APITransaction{}
		result := db.Model(&[]models.Transaction{}).Preload("Ticket").Find(&tickets)
		_ = result
		c.JSON(http.StatusOK, gin.H{
			"status": "1",
			"data":   tickets,
		})
	} else {
		tickets := []models.Transaction{}
		result := db.Model(&[]models.Transaction{}).Preload("Ticket").Find(&tickets, "id = ?", id)
		_ = result
		c.JSON(http.StatusOK, gin.H{
			"status": "1",
			"data":   tickets,
		})
	}
}
