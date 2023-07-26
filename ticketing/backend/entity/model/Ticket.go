package model

import (
	"time"

	"gorm.io/gorm"
)

type Ticket struct {
	gorm.Model
	Id_kategori    uint           `json:"Id_kategori"`
	Id_user        uint           `json:"id_user"`
	Fee            float32        `json:"Fee"`
	Masuk          *time.Time     `json:"Masuk"`
	KategoriWahana KategoriWahana `gorm:"foreignKey:Id_kategori"`
}
