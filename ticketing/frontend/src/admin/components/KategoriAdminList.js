import React from "react";
import KategoriAdminItem from "./KategoriAdminItem";

function KategoriAdminList(props) {
  return (
    <table id="example2" className="table table-bordered table-hover">
      <thead>
        <tr>
          <th>no.</th>
          <th>Nama Kategori</th>
          <th>Jumlah Wahana</th>
        </tr>
      </thead>
      <KategoriAdminItem kategories={props.dataKategori}/>
      <tfoot></tfoot>
    </table>
  );
}

export default KategoriAdminList;
