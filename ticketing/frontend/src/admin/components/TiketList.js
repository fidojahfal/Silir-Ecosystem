import React from "react";
import TiketItem from "./TiketItem";

function TiketList(props) {
  return (
    <table id="example2" className="table table-bordered table-hover">
      <thead>
        <tr>
          <th>Kategori Wahana</th>
          <th>id_tiket</th>
          <th>id_user</th>
          <th>Tanggal Masuk</th>
          <th>Status</th>
        </tr>
      </thead>
      <TiketItem tikets={props.dataTiket} />
    </table>
  );
}

export default TiketList;
