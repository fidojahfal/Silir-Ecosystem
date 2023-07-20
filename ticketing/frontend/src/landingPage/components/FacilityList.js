import React from "react";
import FacilityItem from "./FacilityItem";

function FacilityList() {
  return (
    <div className="row mb_30">
      <FacilityItem title="Toilet" logo="lnr-dinner">Di wisata silir menyediakan restoran yang terjangkau.</FacilityItem>
      <FacilityItem title="Mushola" logo="lnr-dinner">Di wisata silir menyediakan restoran yang terjangkau.</FacilityItem>
      <FacilityItem title="Restaurant" logo="lnr-dinner">Di wisata silir menyediakan restoran yang terjangkau.</FacilityItem>
    </div>
  );
}

export default FacilityList;
