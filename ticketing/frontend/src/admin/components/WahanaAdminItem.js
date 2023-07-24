import React from "react";

function WahanaAdminItem(props) {
  return (
    <tbody>
      {props.wahanas.map((wahana) => {
        return (
          <tr>
            <td>{wahana.Nama_wahana}</td>
            <td>{wahana.KategoriWahana.Nama_kategori}</td>
            <td>{wahana.Fee}</td>
          </tr>
        );
      })}
    </tbody>
  );
}

export default WahanaAdminItem;
