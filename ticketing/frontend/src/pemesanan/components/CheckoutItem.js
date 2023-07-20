import React from "react";

function CheckoutItem(props) {
  return (
    <ul className="list-group list-group-flush">
      {props.items.map((item) => {
        return <li className="list-group-item"><h5 className="text-left">{item.wahanaName}</h5> <h6 className="text-right">Rp.{item.harga}</h6></li>;
      })}
    </ul>
  );
}

export default CheckoutItem;
