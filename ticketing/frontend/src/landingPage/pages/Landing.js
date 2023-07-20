import React from "react";
import Banner from "../components/Banner";
import Facility from "../components/Facility";
import BookNow from "../components/BookNow";

function Landing() {
  return (
    <React.Fragment>
      <Banner />
      <BookNow />
      <Facility />
    </React.Fragment>
  );
}

export default Landing;
