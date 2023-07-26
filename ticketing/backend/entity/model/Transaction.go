package model

type Transaction struct {
	ID       string `gorm:"primaryKey";json:"id"`
	Id_tiket uint   `json:"id_tiket"`
	Status   uint   `json:"status"`
	Ticket   Ticket `gorm:"foreignKey:Id_tiket"`
}
