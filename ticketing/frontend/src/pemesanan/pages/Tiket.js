import React, { useContext, useEffect, useMemo, useState } from "react";
import QrCode from "../components/QrCode";
import TransaksiTiket from "../components/TransaksiTiket";
import useHttpClient from "../../shared/components/Hooks/HttpHook";
import { globalContext } from "../../shared/components/Context/global-context";
import { useParams } from "react-router-dom";

function Tiket() {
  const [tiket, setTiket] = useState({});
  const { sendRequest } = useHttpClient();
  const GlobalVar = useContext(globalContext);
  const { id } = useParams();
  

  useEffect(() => {
    async function getTiket() {
      try {
        const request = await sendRequest(
          `http://${GlobalVar.urlAPI}:8080/api/v1/ticket/${id}`
        );
          setTiket(request.data)
      } catch (error) {}
    }
    getTiket();
  }, [id, GlobalVar.urlAPI, sendRequest]);

  return (
    <div className="container pt-5 section_gap mb-5" style={{ color: "white" }}>
      <div
        className="border border-dark border-5 mt-5 "
        style={{ backgroundColor: "gray" }}
      >
        <div className="container m-4 ">
          {/* <h1 className="">{dummy.namaWahana}</h1> */}
          <div className="row">
            <div className="col-md-12 d-flex align-items-center justify-content-center">
              <TransaksiTiket
                idTiket={tiket.ID}
                kategori={tiket.ID}
                namaPembeli={GlobalVar.nama}
                tanggalTransaksi={tiket.CreatedAt}
              />
            </div>
            <div className="col-md-12 d-flex align-items-center justify-content-center">
              <QrCode idTiket={tiket.ID} />
            </div>
            {/* <div className="col-md-4 align-items-center">
          <Ringkasan wahana={dummy.namaWahana} />
        </div> */}
          </div>
        </div>
      </div>
    </div>
  );
}

export default Tiket;
