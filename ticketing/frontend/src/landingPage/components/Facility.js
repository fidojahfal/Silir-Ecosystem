import React from "react";
import FacilityList from "./FacilityList";

function Facility() {
  return (
    <section className="facilities_area section_gap">
      <div
        className="overlay bg-parallax"
        data-stellar-ratio="0.8"
        data-stellar-vertical-offset="0"
        data-background=""
      ></div>
      <div className="container">
        <div className="section_title text-center">
          <h2 className="title_w">Silir Facilities</h2>
          <p>Who are in extremely love with eco friendly system.</p>
        </div>
        <FacilityList />
      </div>
    </section>
  );
}

export default Facility;
