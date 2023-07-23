import React from "react";
import Button from "../../shared/components/Form/Button";
import { useNavigate } from "react-router-dom";
import useGlobal from "../../shared/components/Hooks/GlobalHook";

function KategoriItem(props) {
  const navigate = useNavigate();
  const { setCategoryGlobal } = useGlobal();

  function handleChooseCategory() {
    console.log(props.id);
    setCategoryGlobal(props.id);
    navigate("/pesan/checkout");
  }

  return (
    <div className="card text-center m-4" style={{ minWidth: "300px" }}>
      <div className="card-header">{props.title}</div>
      <div className="card-body">
        <h5 className="card-title">Wahana :</h5>
        {props.wahanas.map((wahana, index) => {
          return (
            <p key={index} className="card-text">
              {wahana.Nama_wahana}
            </p>
          );
        })}
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
