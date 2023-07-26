package model

import "gorm.io/gorm"

type Wahana struct {
	gorm.Model
	Id_kategori    uint           `json:"Id_kategori"`
	Nama_wahana    string         `json:"Nama_wahana"`
	Fee            float32        `json:"Fee"`
	KategoriWahana KategoriWahana `gorm:"foreignKey:Id_kategori"`
}
