import React, { useState } from "react";
import Header from "../components/Header";
import Input from "../../shared/components/Form/Input";
import Button from "../../shared/components/Form/Button";

function TambahWahana() {
  const [dataForm, setDataForm] = useState({
    nama_wahana: "",
    kategori: undefined,
    harga: undefined,
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
                      name="kategori"
                      id="kategori"
                      dataKategori={[1, 2, 3]}
                      onChange={handleChange}
                      value={dataForm.kategori}
                    />
                    <Input
                      title="Harga"
                      type="number"
                      name="harga"
                      placeholder="Masukkan Harga"
                      id="harga"
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
