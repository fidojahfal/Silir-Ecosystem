import React, { useContext, useEffect, useMemo, useState } from "react";
import Header from "../components/Header";
import Section from "../components/Section";
import WahanaAdminList from "../components/WahanaAdminList";
import useHttpClient from "../../shared/components/Hooks/HttpHook";
import { globalContext } from "../../shared/components/Context/global-context";

function WahanaAdmin() {

  const {sendRequest} = useHttpClient();
  const GlobalVar = useContext(globalContext);
  const [dataTiket, setDataTiket] = useState([]);

  useEffect(() =>{
    async function getTiket(){
      try {
        const request = await sendRequest(`http://${GlobalVar.urlAPI}:8080/api/v1/ride`);
        setDataTiket(request.data)
      } catch (error) {
        
      }
    }
    getTiket();
  }, [GlobalVar.urlAPI, sendRequest])

  return (
    <div className="content-wrapper">
      <Header title="List Wahana" />

      <Section>
        <WahanaAdminList dataWahana={dataTiket} />
      </Section>
    </div>
  );
}

export default WahanaAdmin;
