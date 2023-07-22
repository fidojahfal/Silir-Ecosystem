package models

type KategoriWahanaRequest struct {
	Nama_kategori string `json:"nama_kategori"`
	Available     int    `json:"available"`
}
