import React from "react";

function FacilityItem(props) {
  return (
    <div className="col-lg-4 col-md-6">
      <div className="facilities_item">
        <h4 className="sec_h4">
          <i className={`lnr ${props.logo && props.logo}`}></i>
          {props.title}
        </h4>
        <p>{props.children}</p>
      </div>
    </div>
  );
}

export default FacilityItem;
