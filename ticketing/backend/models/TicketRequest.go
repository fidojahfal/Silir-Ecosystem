package models

type TicketRequest struct {
	Id_tiket    uint    `json:"id_tiket"`
	Id_kategori uint    `json:"id_kategori"`
	Fee         float32 `json:"fee"`
	Type        int     `json:"type"`
}
