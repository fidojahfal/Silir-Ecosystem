import React, { useState } from "react";
import Header from "../components/Header";
import Input from "../../shared/components/Form/Input";
import Button from "../../shared/components/Form/Button";

function TambahTiket() {
  const [dataForm, setDataForm] = useState({
    kategori: undefined,
    id_tiket: "",
    id_user: "",
    tanggal_masuk: "",
    status: "",
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
      <Header title="Form Tambah Tiket" />

      {/* Main content */}
      <section className="content">
        <div className="container-fluid">
          <div className="row">
            {/* left column */}
            <div className="col-md-10">
              {/* general form elements */}
              <div className="card card-primary">
                <div className="card-header">
                  <h3 className="card-title">Tambah Tiket</h3>
                </div>
                {/* /.card-header */}
                {/* form start */}
                <form onSubmit={handleSubmit}>
                  <div className="card-body">
                    <Input
                      typeInput="select"
                      title="Kategori Wahana"
                      dataKategori={[1, 2, 3]}
                      name="kategori"
                      id="kategori"
                      onChange={handleChange}
                      //   value={dataForm.id_tiket}
                    />
                    <Input
                      title="id_tiket"
                      type="text"
                      name="id_tiket"
                      placeholder="Masukkan id tiket"
                      id="id_tiket"
                      onChange={handleChange}
                      value={dataForm.id_tiket}
                    />
                    <Input
                      title="id_user"
                      type="text"
                      name="id_user"
                      placeholder="Masukkan id user"
                      id="id_user"
                      onChange={handleChange}
                      value={dataForm.id_user}
                    />

                    <Input
                      title="Tanggal Masuk"
                      type="date"
                      name="tanggal_masuk"
                      id="tanggal_masuk"
                      onChange={handleChange}
                      value={dataForm.tanggal_masuk}
                    />
                    <Input
                      title="Status"
                      type="text"
                      name="status"
                      id="status"
                      onChange={handleChange}
                      value={dataForm.status}
                    />
                  </div>
                  {/* /.card-body */}
                  <div className="card-footer">
                    <Button type="submit" class="btn-primary">Submit</Button>
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

export default TambahTiket;
