import React from "react";

function TransaksiTiket(props){
    return <div className="mb-5">
        <p>ID Tiket : {props.idTiket}</p>
        <p>Kategori : {props.kategori}</p>
        <p>Nama : {props.namaPembeli}</p>
        <p>Tanggal pembelian : {new Date(Date.parse(props.tanggalTransaksi)).toDateString()}</p>
    </div>
}

export default TransaksiTiket;