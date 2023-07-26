package responses

import "time"

type APITransaction struct {
	ID       string `json:"id"`
	Id_tiket uint   `json:"id_tiket"`
	Status   uint   `json:"status"`
	Ticket   Ticket `gorm:"foreignKey:Id_tiket";json:"ticket"`
}

type Ticket struct {
	ID          uint
	Id_kategori uint       `json:"id_kategori"`
	Id_user     uint       `json:"id_user"`
	Fee         float32    `json:"fee"`
	Masuk       *time.Time `json:"masuk"`
}
