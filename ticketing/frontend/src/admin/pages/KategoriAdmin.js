import React, { useContext, useEffect, useMemo, useState } from "react";
import Header from "../components/Header";
import KategoriAdminList from "../components/KategoriAdminList";
import Section from "../components/Section";
import useHttpClient from "../../shared/components/Hooks/HttpHook";
import { globalContext } from "../../shared/components/Context/global-context";

function KategoriAdmin() {

  const {sendRequest} = useHttpClient();
  const GlobalVar = useContext(globalContext);
  const [dataKategori, setDataKategori] = useState([]);

  useEffect(() =>{
    async function getKategori(){
      try {
        const request = await sendRequest(`http://${GlobalVar.urlAPI}:8080/api/v1/category`);
        setDataKategori(request.data)
      } catch (error) {
        
      }
    }
    getKategori();
  }, [GlobalVar.urlAPI, sendRequest])

  return (
    <div className="content-wrapper">
      <Header title="List Kategori" />
      <Section>
        <KategoriAdminList dataKategori={dataKategori} />
      </Section>
    </div>
  );
}

export default KategoriAdmin;
