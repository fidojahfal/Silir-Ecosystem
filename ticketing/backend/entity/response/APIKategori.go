package response

type APIKategori struct {
	ID            uint     `json:"id"`
	Nama_kategori string   `json:"nama_kategori"`
	Available     int      `json:"available"`
	Wahana        []Wahana `gorm:"foreignKey:Id_kategori;references:ID";json:"wahana"`
}

type Wahana struct {
	ID          uint    `json:"id"`
	Id_kategori uint    `json:"id_kategori"`
	Nama_wahana string  `json:"nama_wahana"`
	Fee         float32 `json:"fee"`
}
