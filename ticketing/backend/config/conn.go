package config

import (
	"gorm.io/driver/mysql"
	"gorm.io/gorm"
)

func Conn() (*gorm.DB, error) {
	dsn := GetEnv("DB_USERNAME") + ":" + GetEnv("DB_PASSWORD") + "@tcp(" + GetEnv("DB_HOST") + ":" + GetEnv("DB_PORT") + ")/" + GetEnv("DB_DATABASE") + "?charset=utf8mb4&parseTime=True&loc=Local"
	db, err := gorm.Open(mysql.Open(dsn), &gorm.Config{})
	if err != nil {
		return nil, err
	}
	return db, nil
}

func CloseConn(db *gorm.DB) {
	dbInstance, _ := db.DB()
	_ = dbInstance.Close()
}
