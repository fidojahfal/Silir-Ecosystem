import React from "react";

function KategoriAdminItem(props) {
  return (
    <tbody>
      {props.kategories.map((kategori, index) =>{
        return <tr>
        <td>{index + 1}</td>
        <td>{kategori.Nama_kategori}</td>
        <td>{kategori.Wahana.length}</td>
      </tr>
      })}
    </tbody>
  );
}

export default KategoriAdminItem;
