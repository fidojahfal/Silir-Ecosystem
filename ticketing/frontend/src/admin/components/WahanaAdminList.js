import React from "react";
import WahanaAdminItem from "./WahanaAdminItem";

function WahanaAdminList(props) {
  return (
    <table id="example2" className="table table-bordered table-hover">
      <thead>
        <tr>
          <th>Nama Wahana</th>
          <th>Nama Kategori</th>
          <th>Harga</th>
        </tr>
      </thead>
      <WahanaAdminItem wahanas={props.dataWahana}/>
      <tfoot></tfoot>
    </table>
  );
}

export default WahanaAdminList;
