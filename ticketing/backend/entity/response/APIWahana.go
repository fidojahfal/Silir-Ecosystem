package response

type APIWahana struct {
	ID             uint     `json:"id"`
	Id_kategori    uint     `json:"id_kategori"`
	Nama_wahana    string   `json:"nama_wahana"`
	Fee            float32  `json:"fee"`
	KategoriWahana Kategori `gorm:"foreignKey:Id_kategori"; json:"kategori_wahana"`
}

type Kategori struct {
	ID            uint   `json:"id"`
	Nama_kategori string `json:"nama_wahana"`
	Available     int    `json:"fee"`
}
