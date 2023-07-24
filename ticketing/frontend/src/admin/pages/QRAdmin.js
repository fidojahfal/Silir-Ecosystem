import React, { useContext, useEffect, useState } from "react";
import { useParams } from "react-router-dom";
import QrCode from "../../pemesanan/components/QrCode";
import useHttpClient from "../../shared/components/Hooks/HttpHook";
import { globalContext } from "../../shared/components/Context/global-context";

function QRAdmin() {
  const { id } = useParams();
  const { sendRequest } = useHttpClient();
  const GlobalVar = useContext(globalContext);
  const [tiketAdmin, setTiketAdmin] = useState({});

  useEffect(() => {
    async function getAdminTiket() {
      try {
        const request = await sendRequest(
          `http://${GlobalVar.urlAPI}:8080/api/v1/ticket/${id}`
        );
        setTiketAdmin(request.data);
      } catch (error) {}
    }
    getAdminTiket();
  }, [GlobalVar.urlAPI, id, sendRequest]);

  return (
    <div className="container pt-5 section_gap mb-5" style={{ color: "white" }}>
      <div
        className="border border-dark border-5 mt-5 "
        style={{ backgroundColor: "gray" }}
      >
        <div className="container m-4 ">
          <div className="row">
            <div className="col-md-12 d-flex align-items-center justify-content-center">
              <QrCode idTiket={tiketAdmin.ID}/>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}

export default QRAdmin;
