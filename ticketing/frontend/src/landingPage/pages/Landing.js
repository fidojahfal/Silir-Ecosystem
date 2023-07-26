import React, { useLayoutEffect } from "react";
import Banner from "../components/Banner";
import Facility from "../components/Facility";
import BookNow from "../components/BookNow";

function Landing() {
  
  useLayoutEffect(() => {
    document.body.style.backgroundColor = "white";
  }, []);

  

  return (
    <React.Fragment>
      <Banner />
      <BookNow />
      <Facility />
    </React.Fragment>
  );
}

export default Landing;
