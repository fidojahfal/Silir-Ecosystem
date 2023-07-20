package controllers

import (
	"encoding/json"
	"fmt"
	"io"
	"io/ioutil"
	"log"
	"net/http"
	"strconv"
	"strings"
	"time"

	"github.com/gin-gonic/gin"
	"gorm.io/driver/mysql"
	"gorm.io/gorm"

	"silirapi/models"
)

func GetTicket(c *gin.Context) {
	dsn := "root:@tcp(127.0.0.1:3306)/silir-api?charset=utf8mb4&parseTime=True&loc=Local"
	db, err := gorm.Open(mysql.Open(dsn), &gorm.Config{})
	_ = err
	id := c.Param("id")

	if id == "" {
		tickets := []models.Ticket{}
		result := db.Model(&[]models.Ticket{}).Preload("KategoriWahana").Preload("Transaction").Find(&tickets)
		_ = result
		c.JSON(http.StatusOK, gin.H{
			"status": "1",
			"data":   tickets,
		})
	} else {
		tickets := []models.Ticket{}
		result := db.Model(&[]models.Ticket{}).Preload("KategoriWahana").Preload("Transaction").Find(&tickets, "id = ?", id)
		_ = result
		c.JSON(http.StatusOK, gin.H{
			"status": "1",
			"data":   tickets,
		})
	}
}

func StoreTicket(c *gin.Context) {
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
	var request models.TicketRequest
	err = json.Unmarshal(bodyByte, &request)

	var count int64

	db.Model(&models.Ticket{}).Count(&count)

	ticket_id := 70000000 + uint(count)

	db.Create(&models.Ticket{
		Model:       gorm.Model{ID: ticket_id},
		Id_kategori: request.Id_kategori,
		Fee:         request.Fee,
	})

	transaction_id := "TR-" + strconv.Itoa(int(ticket_id)) + "-" + strconv.Itoa(int(time.Now().Unix()))

	db.Create(&models.Transaction{
		ID:       transaction_id,
		Id_tiket: ticket_id,
		Status:   0,
	})

	url := "https://app.sandbox.midtrans.com/snap/v1/transactions"
	payload := strings.NewReader("{\"transaction_details\":{\"order_id\":\"" + transaction_id + "\",\"gross_amount\":100000,},}")
	req, _ := http.NewRequest("POST", url, payload)

	req.Header.Add("accept", "application/json")
	req.Header.Add("content-type", "application/json")
	req.Header.Add("Authorization", "Basic SB-Mid-server-Dc5jdhFPLHf1ItzRoF0dE_uC:Silirinterop123!")

	res, _ := http.DefaultClient.Do(req)

	defer res.Body.Close()
	body, _ := io.ReadAll(res.Body)

	fmt.Println(string(body))

	c.JSON(http.StatusOK, gin.H{
		"message": "pong",
	})
}

func CheckTicket(c *gin.Context) {
	dsn := "root:@tcp(127.0.0.1:3306)/silir-api?charset=utf8mb4&parseTime=True&loc=Local"
	db, err := gorm.Open(mysql.Open(dsn), &gorm.Config{})
	if err != nil {
		panic(err)
	}
	body, err := ioutil.ReadAll(c.Request.Body)
	if err != nil {
		panic(err)
	}
	log.Println(string(body))
	var req models.TicketRequest
	err = json.Unmarshal(body, &req)
	if err != nil {
		panic(err)
	}
	tickets := []models.Ticket{}
	result := db.Find(&tickets, req.Id_tiket)
	msg := ""
	if result.RowsAffected > 0 {
		msg = "Success"
	} else {
		msg = "Not found"
	}
	c.JSON(http.StatusOK, gin.H{
		"status": result.RowsAffected,
		"data":   msg,
	})
}
