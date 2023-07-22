import React from "react";
import CheckoutItem from "./CheckoutItem";

function CheckoutList(props) {
  return (
    <div className="border border-dark border-3 mb-3" style={{maxWidth: "85%"}}>
      <div className="card">
        <CheckoutItem items={props.lists} />
      </div>
    </div>
  );
}

export default CheckoutList;
