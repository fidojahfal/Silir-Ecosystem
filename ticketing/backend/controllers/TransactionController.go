package controllers

import (
	"net/http"

	"github.com/gin-gonic/gin"
	"gorm.io/driver/mysql"
	"gorm.io/gorm"

	"silirapi/models"
)

func GetTransaction(c *gin.Context) {
	dsn := "root:@tcp(127.0.0.1:3306)/silir-api?charset=utf8mb4&parseTime=True&loc=Local"
	db, err := gorm.Open(mysql.Open(dsn), &gorm.Config{})
	_ = err
	id := c.Param("id")

	if id == "" {
		tickets := []models.Transaction{}
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

// func StoreTicket(c *gin.Context) {
// 	dsn := "root:@tcp(127.0.0.1:3306)/silir-api?charset=utf8mb4&parseTime=True&loc=Local"
// 	db, err := gorm.Open(mysql.Open(dsn), &gorm.Config{})
// 	_ = err
// 	bodyByte, err := ioutil.ReadAll(c.Request.Body)
// 	if err != nil {
// 		log.Println(err)
// 		c.JSON(http.StatusBadRequest, gin.H{
// 			"message": "error",
// 		})
// 		return
// 	}
// 	var req models.TicketRequest
// 	err = json.Unmarshal(bodyByte, &req)
// 	db.Create(&models.Ticket{
// 		Id_kategori: req.Id_kategori,
// 		Fee:         req.Fee,
// 	})
// 	c.JSON(http.StatusOK, gin.H{
// 		"message": "pong",
// 	})
// }

// func CheckTicket(c *gin.Context) {
// 	dsn := "root:@tcp(127.0.0.1:3306)/silir-api?charset=utf8mb4&parseTime=True&loc=Local"
// 	db, err := gorm.Open(mysql.Open(dsn), &gorm.Config{})
// 	if err != nil {
// 		panic(err)
// 	}
// 	body, err := ioutil.ReadAll(c.Request.Body)
// 	if err != nil {
// 		panic(err)
// 	}
// 	log.Println(string(body))
// 	var req models.TicketRequest
// 	err = json.Unmarshal(body, &req)
// 	if err != nil {
// 		panic(err)
// 	}
// 	tickets := []models.Ticket{}
// 	result := db.Find(&tickets, req.Id_tiket)
// 	msg := ""
// 	if result.RowsAffected > 0 {
// 		msg = "Success"
// 	} else {
// 		msg = "Not found"
// 	}
// 	c.JSON(http.StatusOK, gin.H{
// 		"status": result.RowsAffected,
// 		"data":   msg,
// 	})
// }
