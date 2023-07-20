import { useNavigate } from "react-router-dom";
import Button from "../../shared/components/Form/Button";
import React from "react";

function Ringkasan(props) {
  const navigate = useNavigate();

  function handleBuy() {
    navigate("/");
  }

  return (
    <div className="border border-dark border-3" style={{ maxWidth: "80%" }}>
      <div className="container mt-3">
        <h6 className="mb-3 font-weight-bold">Ringksan</h6>
        <div className="row mb-4">
          <h6 className="col-sm-6">{props.wahana}</h6>
          <h6 className="col-sm-6 text-right">Rp.99999</h6>
        </div>
        <div className="row">
          <h6 className="col-sm-6 font-weight-bold">Total Harga</h6>
          <h6 className="col-sm-6 text-right font-weight-bold">Rp.99999</h6>
          <Button
            class="genric-btn primary radius btn-block m-2"
            onClick={handleBuy}
            style={{ fontSize: "20px" }}
          >
            Beli
          </Button>
        </div>
      </div>
    </div>
  );
}

export default Ringkasan;
