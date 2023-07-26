import React, { useContext, useEffect, useMemo, useState } from "react";
import TitleTiket from "../components/Header";
import TiketList from "../components/TiketList";
import Section from "../components/Section";
import useHttpClient from "../../shared/components/Hooks/HttpHook";
import { globalContext } from "../../shared/components/Context/global-context";

function Tiket() {
  const {sendRequest} = useHttpClient();
  const GlobalVar = useContext(globalContext);
  const [dataTiket, setDataTiket] = useState([]);

  useEffect(() =>{
    async function getTiket(){
      try {
        const request = await sendRequest(`http://${GlobalVar.urlAPI}:8080/api/v1/ticket`);
        setDataTiket(request.data)
      } catch (error) {
        
      }
    }
    getTiket();
  }, [GlobalVar.urlAPI, sendRequest])


  return (
    <div className="content-wrapper">
      <TitleTiket title="List Tiket" />
      <Section>
        <TiketList dataTiket={dataTiket} />
      </Section>
    </div>
  );
}

export default Tiket;
