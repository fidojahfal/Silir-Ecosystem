import React, { useState } from "react";
import Header from "../components/Header";
import Input from "../../shared/components/Form/Input";
import Button from "../../shared/components/Form/Button";

function TambahKategori() {
  const [dataForm, setDataForm] = useState({
    nama_kategori: "",
    available: "",
  });

  function handleSubmit(event) {
    event.preventDefault();
    console.log(dataForm);
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
