package models

import "gorm.io/gorm"

type HistoriWahana struct {
	gorm.Model
	Id_tiket  uint    `json:"id_tiket"`
	Id_wahana uint    `json:"id_wahana"`
	Fee       float32 `json:"fee"`
	Ticket    Ticket  `gorm:"foreignKey:Id_tiket"`
	Wahana    Wahana  `gorm:"foreignKey:Id_wahana"`
}
