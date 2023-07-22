package models

import "gorm.io/gorm"

type KategoriWahana struct {
	gorm.Model
	Nama_kategori string   `json:nama_kategori`
	Available     int      `json:available`
	Ticket        []Ticket `gorm:"foreignKey:Id_kategori;references:ID"`
	Wahana        []Wahana `gorm:"foreignKey:Id_kategori;references:ID"`
}
