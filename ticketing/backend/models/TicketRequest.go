package models

type TicketRequest struct {
	Id_tiket    uint    `json:"id_tiket"`
	Id_kategori uint    `json:"id_kategori"`
	Id_user     uint    `json:"id_user"`
	Id_wahana   uint    `json:"id_wahana"`
	Fee         float32 `json:"fee"`
	Status      int     `json:"status"`
	Type        int     `json:"type`
}
