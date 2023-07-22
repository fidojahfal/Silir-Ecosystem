import React from "react";
import KategoriItem from "./KategoriItem";

function KategoriList(props) {
  return (
    <div className="row">
      {props.list.map((kategori, index) => {
        return (
          <div className="col-sm-12 col-md-6" key={index}>
            <KategoriItem
              id={kategori.ID}
              title={kategori.Nama_kategori}
              wahanas={kategori.Wahana}
            />
          </div>
        );
      })}
    </div>
  );
}

export default KategoriList;
