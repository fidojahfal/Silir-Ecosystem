package request

type WahanaRequest struct {
	Id_kategori uint    `json:"Id_kategori"`
	Nama_wahana string  `json:"Nama_wahana"`
	Fee         float32 `json:"Fee"`
}
