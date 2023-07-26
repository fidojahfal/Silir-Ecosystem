package responses

import "time"

type APITicket struct {
	ID             uint
	Id_kategori    uint           `json:"id_kategori"`
	Id_user        uint           `json:"id_user"`
	Fee            float32        `json:"fee"`
	Masuk          *time.Time     `json:"masuk"`
	KategoriWahana KategoriWahana `gorm:"foreignKey:Id_kategori"`
}

type KategoriWahana struct {
	ID            uint   `json:"id"`
	Nama_kategori string `json:"nama_kategori"`
	Available     int    `json:"available"`
}
