import React from "react";
import QrCode from "../components/QrCode";

function Tiket() {
  return (
    <div className="container pt-5 section_gap mb-5" style={{ color: "black" }}>
      {/* <div className="border border-dark border-5 mt-5"> */}
        <div className="container m-4">
          {/* <h1 className="">{dummy.namaWahana}</h1> */}
          <div className="row">
            <div className="col-md-12">
              <QrCode />
            </div>
            {/* <div className="col-md-4 align-items-center">
          <Ringkasan wahana={dummy.namaWahana} />
        </div> */}
          </div>
        </div>
      {/* </div> */}
    </div>
  );
}

export default Tiket;
