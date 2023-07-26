import React, { useContext, useState } from "react";
import Header from "../components/Header";
import Input from "../../shared/components/Form/Input";
import Button from "../../shared/components/Form/Button";
import useHttpClient from "../../shared/components/Hooks/HttpHook";
import { globalContext } from "../../shared/components/Context/global-context";
import { useNavigate } from "react-router-dom";

function TambahKategori() {
  const { sendRequest } = useHttpClient();
  const GlobalVar = useContext(globalContext);
  const navigate = useNavigate();
  const [dataForm, setDataForm] = useState({
    nama_kategori: "",
    available: "",
  });

  async function handleSubmit(event) {
    event.preventDefault();
    try {
      await sendRequest(
        `http://${GlobalVar.urlAPI}:8080/api/v1/category`,
        "POST",
        JSON.stringify(dataForm),
        {
          "Content-Type": "application/json",
        }
      );
    } catch (error) {}
    navigate("/kategori");
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
      <Header title="Form Tambah Kategori" />

      {/* Main content */}
      <section className="content">
        <div className="container-fluid">
          <div className="row">
            {/* left column */}
            <div className="col-md-10">
              {/* general form elements */}
              <div className="card card-primary">
                <div className="card-header">
                  <h3 className="card-title">Tambah Kategori</h3>
                </div>
                {/* /.card-header */}
                {/* form start */}
                <form onSubmit={handleSubmit}>
                  <div className="card-body">
                    <Input
                      title="Nama Kategori"
                      type="text"
                      name="nama_kategori"
                      placeholder="Masukkan Nama Kategori"
                      id="nama_kategori"
                      onChange={handleChange}
                      value={dataForm.nama_kategori}
                    />
                    <Input
                      title="Available"
                      type="text"
                      name="available"
                      placeholder="Available"
                      id="available"
                      onChange={handleChange}
                      value={dataForm.available}
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

export default TambahKategori;
