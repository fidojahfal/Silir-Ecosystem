import React from "react";

function TiketItem(props) {
  return (
    <tbody>
      {props.tikets.map(tiket =>{
        return <tr key={tiket.ID}>
            <td>{tiket.KategoriWahana.Nama_kategori}</td>
            <td>{tiket.ID}</td>
            <td>-</td>
            <td>{tiket.masuk}</td>
            <td>-</td>
        </tr>
      })}
    </tbody>
  );
}

export default TiketItem;
