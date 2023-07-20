import React from "react";
import KategoriItem from "./KategoriItem";

function KategoriList(props) { 
    return <div className="row">
        {props.list.map((kategori, index) =>{
            return(
                <KategoriItem key={index} id={kategori.category} title={kategori.nama}/>
            )
        })}
    </div>
}

export default KategoriList;