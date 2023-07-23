package main

import (
	"silirapi/controllers"
	"silirapi/models"

	"github.com/gin-gonic/gin"

	"gorm.io/driver/mysql"
	"gorm.io/gorm"
)

func CORSMiddleware() gin.HandlerFunc {
	return func(c *gin.Context) {
		c.Writer.Header().Set("Access-Control-Allow-Origin", "*")
		c.Writer.Header().Set("Access-Control-Allow-Credentials", "true")
		c.Writer.Header().Set("Access-Control-Allow-Headers", "Content-Type, Content-Length, Accept-Encoding, X-CSRF-Token, Authorization, accept, origin, Cache-Control, X-Requested-With")
		c.Writer.Header().Set("Access-Control-Allow-Methods", "POST, OPTIONS, GET, PUT")

		if c.Request.Method == "OPTIONS" {
			c.AbortWithStatus(204)
			return
		}

		c.Next()
	}
}

func main() {
	dsn := "root:@tcp(127.0.0.1:3306)/silir-api?charset=utf8mb4&parseTime=True&loc=Local"
	db, err := gorm.Open(mysql.Open(dsn), &gorm.Config{})
	_ = err

	AutoMigrate(db)

	route := gin.Default()
	route.Use(CORSMiddleware())
	v1 := route.Group("/api/v1")
	v1.GET("/ticket", controllers.GetTicket)
	v1.GET("/ticket/:id", controllers.GetTicket)
	v1.POST("/ticket", controllers.StoreTicket)
	v1.POST("/ticket/validation", controllers.CheckTicket)

	v1.GET("/transaction", controllers.GetTransaction)

	v1.GET("/category", controllers.GetCategory)
	v1.GET("/category/:id", controllers.GetCategory)
	v1.PUT("/category/:id", controllers.UpdateCategory)
	v1.POST("/category", controllers.StoreCategory)

	v1.GET("/ride", controllers.GetRide)
	v1.GET("/ride/:id", controllers.GetRide)
	v1.PUT("/ride/:id", controllers.UpdateRide)
	v1.POST("/ride", controllers.StoreRide)

	route.Run()
}

func AutoMigrate(conn *gorm.DB) {
	conn.Debug().AutoMigrate(
		&models.KategoriWahana{},
		&models.Ticket{},
		&models.Wahana{},
		&models.HistoriWahana{},
		&models.Transaction{},
	)
}
