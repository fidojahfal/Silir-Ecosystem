package controllers

import (
	"encoding/base64"
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

type Payment struct {
	Token        string `json:"token"`
	Redirect_url string `json:"redirect_url"`
}

func GetTicket(c *gin.Context) {
	// if IsAuth(c) != true {
	// 	c.JSON(http.StatusForbidden, gin.H{})
	// 	return
	// }
	dsn := "root:@tcp(127.0.0.1:3306)/silir-api?charset=utf8mb4&parseTime=True&loc=Local"
	db, err := gorm.Open(mysql.Open(dsn), &gorm.Config{})
	_ = err
	id := c.Param("id")
	tickets := []models.Ticket{}
	var count int64
	if id == "" {
		db.Model(&[]models.Ticket{}).Preload("KategoriWahana").Preload("Transaction").Find(&tickets).Count(&count)

	} else {
		db.Model(&[]models.Ticket{}).Preload("KategoriWahana").Preload("Transaction").Find(&tickets, "id = ?", id).Count(&count)
	}
	if count != 0 {
		c.JSON(http.StatusOK, gin.H{
			"status": "1",
			"data":   tickets,
		})
	} else {
		c.JSON(http.StatusNotFound, gin.H{
			"message": "No data found",
		})
	}
}

func StoreTicket(c *gin.Context) {
	// if IsAuth(c) != true {
	// 	c.JSON(http.StatusForbidden, gin.H{})
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
	var request models.TicketRequest
	err = json.Unmarshal(bodyByte, &request)

	var count int64

	db.Model(&models.Ticket{}).Count(&count)

	ticket_id := 70000000 + uint(count)

	if db.Create(&models.Ticket{
		Model:       gorm.Model{ID: ticket_id},
		Id_kategori: request.Id_kategori,
		Fee:         request.Fee,
	}).Error != nil {
		c.JSON(http.StatusBadRequest, gin.H{
			"message": "Error in creating new ticket",
		})
		return
	}

	transaction_id := "TR-" + strconv.Itoa(int(ticket_id)) + "-" + strconv.Itoa(int(time.Now().Unix()))

	if db.Create(&models.Transaction{
		ID:       transaction_id,
		Id_tiket: ticket_id,
		Status:   0,
	}).Error != nil {
		c.JSON(http.StatusBadRequest, gin.H{
			"message": "Error in creating new transaction",
		})
		return
	}

	url := "https://app.sandbox.midtrans.com/snap/v1/transactions"
	payload := strings.NewReader("{\"transaction_details\":{\"order_id\":\"" + transaction_id + "\",\"gross_amount\":100000}}")
	req, _ := http.NewRequest("POST", url, payload)

	req.Header.Add("accept", "application/json")
	req.Header.Add("content-type", "application/json")
	req.Header.Add("Authorization", "Basic "+base64.StdEncoding.EncodeToString([]byte("SB-Mid-server-Dc5jdhFPLHf1ItzRoF0dE_uC:Silirinterop123"))) //!

	res, _ := http.DefaultClient.Do(req)

	defer res.Body.Close()
	body, _ := io.ReadAll(res.Body)

	fmt.Println(string(body))

	var link Payment
	err = json.Unmarshal(body, &link)

	c.JSON(http.StatusCreated, gin.H{
		"token": link.Token,
		"url":   link.Redirect_url,
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
	tickets := models.Ticket{}
	result := db.Find(&tickets, req.Id_tiket)
	t := time.Now()
	if result.RowsAffected > 0 {
		if req.Type == 1 {
			if tickets.Masuk == nil {
				result.Updates(models.Ticket{
					Masuk: &t,
				})
			} else {
				c.JSON(http.StatusForbidden, gin.H{
					"message": "Ticket has been used",
				})
				return
			}
		} else if req.Type == 2 {
			wahanaaaa := models.Wahana{}
			db.Model(&models.Wahana{}).Find(&wahanaaaa, "id = ?", req.Id_wahana)
			if wahanaaaa.Id_kategori != tickets.Id_kategori {
				c.JSON(http.StatusForbidden, gin.H{
					"message":         "Ticket type is invalid",
					"ticket category": tickets.Id_kategori,
					"req category":    wahanaaaa.Id_kategori,
				})
				return
			}
			if db.Create(&models.HistoriWahana{
				Id_tiket:  req.Id_tiket,
				Id_wahana: req.Id_wahana,
				Fee:       tickets.Fee,
			}).Error != nil {
				c.JSON(http.StatusBadRequest, gin.H{
					"message": "Error in creating new ride history",
				})
				return
			}
		}
	} else {
		c.JSON(http.StatusNotFound, gin.H{
			"message": "Ticket not found",
		})
	}
}
