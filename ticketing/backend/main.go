package main

import (
	"silirapi/controllers"
	"silirapi/models"

	"github.com/gin-gonic/gin"

	"gorm.io/driver/mysql"
	"gorm.io/gorm"
)

func main() {
	dsn := "root:@tcp(127.0.0.1:3306)/silir-api?charset=utf8mb4&parseTime=True&loc=Local"
	db, err := gorm.Open(mysql.Open(dsn), &gorm.Config{})
	_ = err

	AutoMigrate(db)

	route := gin.Default()
	v1 := route.Group("/api/v1")
	v1.GET("/ticket", controllers.GetTicket)
	v1.GET("/transaction", controllers.GetTransaction)
	v1.POST("/ticket/validation", controllers.CheckTicket)
	v1.POST("/ticket", controllers.StoreTicket)
	v1.GET("/ticket/:id", controllers.GetTicket)
	v1.GET("/category/", controllers.GetCategory)
	v1.GET("/category/:id", controllers.GetCategory)
	v1.GET("/ride", controllers.GetRide)
	v1.GET("/ride/:id", controllers.GetRide)
	route.Run()
}

func AutoMigrate(conn *gorm.DB) {
	conn.Debug().AutoMigrate(
		&models.KategoriWahana{},
		&models.Ticket{},
		&models.Wahana{},
		&models.Transaction{},
	)
}
