import React from "react";
import KategoriItem from "./KategoriItem";

function KategoriList(props) { 
    return <div className="row">
        {props.list.map(kategori =>{
            return(
                <KategoriItem title={kategori.nama}/>
            )
        })}
    </div>
}

export default KategoriList;