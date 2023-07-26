import React, { useContext, useEffect, useState } from "react";
import Header from "../components/Header";
import Input from "../../shared/components/Form/Input";
import Button from "../../shared/components/Form/Button";
import { globalContext } from "../../shared/components/Context/global-context";
import useHttpClient from "../../shared/components/Hooks/HttpHook";
import { useNavigate } from "react-router-dom";

function TambahTiket() {
  const GlobalVar = useContext(globalContext);
  const [kategori, setKategori] = useState([]);
  const { sendRequest } = useHttpClient();
  const [dataForm, setDataForm] = useState({
    id_kategori: 0,
    id_user: GlobalVar.userId,
    status: "",
  });
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
      const request = await sendRequest(
        `http://${GlobalVar.urlAPI}:8080/api/v1/ticket`,
        "POST",
        JSON.stringify(dataForm),
        {
          "Content-Type": "application/json",
        }
      );
        navigate("/admin/tiket/" + request.transaction_id);
    } catch (error) {}
  }

  function handleChange(event) {
    const { name, value } = event.target;

    setDataForm((prevDataForm) => {
      return {
        ...prevDataForm,
        [name]: parseInt(value),
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
                      dataKategori={kategori}
                      name="id_kategori"
                      id="id_kategori"
                      onChange={handleChange}
                      //   value={dataForm.id_tiket}
                    />
                    <Input
                      title="id_user"
                      type="text"
                      name="id_user"
                      placeholder="Masukkan id user"
                      id="id_user"
                      onChange={handleChange}
                      value={GlobalVar.userId}
                      disabled={true}
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

export default TambahTiket;
