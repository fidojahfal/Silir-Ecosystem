import React, { useContext } from "react";
import Button from "../../shared/components/Form/Button";
import { useNavigate } from "react-router-dom";
import { globalContext } from "../../shared/components/Context/global-context";

function KategoriItem(props) {
  const navigate = useNavigate();
  const globalVar = useContext(globalContext);

  function handleChooseCategory() {
    console.log(props.id);
    globalVar.setCategoryGlobal(props.id)
    navigate("/pesan/checkout");
  }

  return (
    <div className="card text-center m-4" style={{ minWidth: "300px", backgroundColor: "rgba(249, 249, 255, 0.102)", borderColor: "#777777", color: "white" }}>
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
