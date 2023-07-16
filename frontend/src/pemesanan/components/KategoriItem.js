import React from "react";
import Button from "../../shared/components/Form/Button";
import { useNavigate } from "react-router-dom";

function KategoriItem(props) {
  const navigate = useNavigate();

  function handleChooseCategory() {
    console.log(props.id);
    navigate("/pesan/checkout");
  }

  return (
    <div className="card text-center m-4">
      <div className="card-header">{props.title}</div>
      <div className="card-body">
        <h5 className="card-title">Wahana :</h5>
        <p className="card-text">
          With supporting text below as a natural lead-in to additional content.
        </p>
      </div>
      <div className="card-footer">
        <Button class="btn-success" onClick={handleChooseCategory}>
          Pilih Kategori
        </Button>
      </div>
    </div>
  );
}

export default KategoriItem;
