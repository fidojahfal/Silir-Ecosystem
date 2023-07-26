import { useNavigate } from "react-router-dom";
import axios from "axios";
import Button from "../../shared/components/Form/Button";
import React, { useContext } from "react";
import useHttpClient from "../../shared/components/Hooks/HttpHook";
import { globalContext } from "../../shared/components/Context/global-context";

function Ringkasan(props) {
  const navigate = useNavigate();
  const { isLoading, sendRequest, error, clearError } = useHttpClient();
  const GlobalVar = useContext(globalContext);

  async function handleBuy() {
    try {

      const request = await axios.post(
        `http://${GlobalVar.urlAPI}:8080/api/v1/ticket`,
        {
          id_kategori: parseInt(GlobalVar.categoryGlobal),
          fee: parseInt(props.wahana.total),
        },
        {
          headers: {
            "Content-Type": "application/json",
            // Authorization: "bearer " + sessionStorage.getItem("access_token")
          },
        }
      );
      window.open(request.data.url, "_blank", "noreferrer");
      navigate(`/tiket/` + request.data.transaction_id);
    } catch (error) {}
  }

  return (
    <div
      className="border border-dark border-3"
      style={{
        maxWidth: "80%",
        borderColor: "#777777",
        backgroundColor: "gray",
      }}
    >
      <div className="container mt-3">
        <h6 className="mb-3 font-weight-bold">Ringksan</h6>
        <div className="row mb-4">
          <h6 className="col-sm-6">{props.wahana.nama_kategori}</h6>
          <h6 className="col-sm-6 text-right">{props.wahana.total}</h6>
        </div>
        <div className="row">
          <h6 className="col-sm-6 font-weight-bold">Total Harga</h6>
          <h6 className="col-sm-6 text-right font-weight-bold">
            {props.wahana.total}
          </h6>
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
