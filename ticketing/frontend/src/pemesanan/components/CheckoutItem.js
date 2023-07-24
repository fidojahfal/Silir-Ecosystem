import React from "react";

function CheckoutItem(props) {
  return (
    <ul className="list-group list-group-flush" >
      {props.items.map((item) => {
        return <li key={item.ID} className="list-group-item" style={{backgroundColor: "gray", borderColor: "#777777"}}><h5 className="text-left">{item.Nama_wahana}</h5> <h6 className="text-right">Rp.{item.Fee}</h6></li>;
      })}
    </ul>
  );
}

export default CheckoutItem;
