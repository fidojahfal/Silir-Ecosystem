import React, { useContext, useEffect, useState } from "react";
import Header from "../components/Header";
import Input from "../../shared/components/Form/Input";
import Button from "../../shared/components/Form/Button";
import { globalContext } from "../../shared/components/Context/global-context";
import useHttpClient from "../../shared/components/Hooks/HttpHook";
import { useNavigate } from "react-router-dom";

function TambahWahana() {
  const [dataForm, setDataForm] = useState({
    nama_wahana: "",
    id_kategori: undefined,
    fee: undefined,
  });

  const GlobalVar = useContext(globalContext);
  const [kategori, setKategori] = useState([]);
  const { sendRequest } = useHttpClient();
  const navigate = useNavigate();

  useEffect(() => {
    async function getKategori() {
      try {
        const request = await sendRequest(
          `http://${GlobalVar.urlAPI}:8080/api/v1/category`
        );
        setKategori(request.data);
      } catch (error) {}
    }
    getKategori();
  }, [GlobalVar.urlAPI, sendRequest]);

  async function handleSubmit(event) {
    event.preventDefault();
    try {
      await sendRequest(
        `http://${GlobalVar.urlAPI}:8080/api/v1/ride`,
        "POST",
        JSON.stringify({
          nama_wahana: dataForm.nama_wahana,
          id_kategori: parseInt(dataForm.id_kategori),
          fee: parseInt(dataForm.fee),
        }),
        {
          "Content-Type": "application/json",
        }
      );
    } catch (error) {}
    navigate("/wahana");
  }

  function handleChange(event) {
    const { name, value } = event.target;

    setDataForm((prevDataForm) => {
      return {
        ...prevDataForm,
        [name]: value,
      };
    });
  }
  return (
    <div className="content-wrapper">
      {/* Content Header (Page header) */}
      <Header title="Form Tambah Wahana" />

      {/* Main content */}
      <section className="content">
        <div className="container-fluid">
          <div className="row">
            {/* left column */}
            <div className="col-md-10">
              {/* general form elements */}
              <div className="card card-primary">
                <div className="card-header">
                  <h3 className="card-title">Tambah Wahana</h3>
                </div>
                {/* /.card-header */}
                {/* form start */}
                <form onSubmit={handleSubmit}>
                  <div className="card-body">
                    <Input
                      title="Nama Wahana"
                      type="text"
                      name="nama_wahana"
                      placeholder="Masukkan Nama Wahana"
                      id="nama_wahana"
                      onChange={handleChange}
                      value={dataForm.nama_wahana}
                    />
                    <Input
                      typeInput="select"
                      title="Kategori"
                      type="text"
                      name="id_kategori"
                      id="id_kategori"
                      dataKategori={kategori}
                      onChange={handleChange}
                      value={dataForm.kategori}
                    />
                    <Input
                      title="Harga"
                      type="number"
                      name="fee"
                      placeholder="Masukkan Harga"
                      id="fee"
                      onChange={handleChange}
                      value={dataForm.harga}
                    />
                  </div>
                  {/* /.card-body */}
                  <div className="card-footer">
                    <Button type="submit" class="btn-primary">
                      Submit
                    </Button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  );
}

export default TambahWahana;
