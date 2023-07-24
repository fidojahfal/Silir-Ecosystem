import React, { useMemo, useEffect, useContext, useState } from "react";
import CheckoutList from "../components/CheckoutList";
import Ringkasan from "../components/Ringkasan";
import { globalContext } from "../../shared/components/Context/global-context";
import useHttpClient from "../../shared/components/Hooks/HttpHook";
import { useNavigate } from "react-router-dom";

function Checkout() {
  const GlobalVar = useContext(globalContext);
  const { isLoading, sendRequest, error, clearError } = useHttpClient();
  const [categoryById, setcategoryById] = useState({});
  const [wahana, setWahana] = useState([]);
  const navigate = useNavigate();
  // const dummy = useMemo(
  //   () => ({
  //     namaWahana: "Wahana Bebas",
  //     listWahana: [
  //       { wahanaName: "Kincir Angin", harga: "99999" },
  //       { wahanaName: "Rumah Hantu", harga: "99999" },
  //       { wahanaName: "Kora Kora", harga: "99999" },
  //       { wahanaName: "Arum Jeram", harga: "99999" },
  //       { wahanaName: "Istana Boneka", harga: "99999" },
  //     ],
  //   }),
  //   []
  // );
  useEffect(() => {
    if(!GlobalVar.categoryGlobal){
      return navigate("/pesan/kategori")
    }
    async function getCategoryById() {
      try {
        const request = await sendRequest(
          `http://${GlobalVar.urlAPI}:8080/api/v1/category/${GlobalVar.categoryGlobal}`
        );
        setcategoryById(request);
        setWahana(request.wahana);
      } catch (error) {}
    }
    getCategoryById();
  }, [sendRequest, GlobalVar.categoryGlobal, GlobalVar.urlAPI]);

  console.log(categoryById.Wahana);
  return (
    <div
      className="container pt-5 section_gap mb-5 mt-5"
      style={{ color: "white" }}
    >
      <div
        className="border border-dark border-5 mt-5"
        style={{
          borderColor: "#777777",
          backgroundColor: "rgba(249, 249, 255, 0.102)",
        }}
      >
        <div className="container m-4">
          <h1 className="">{categoryById.nama_kategori}</h1>
          {console.log()}
          <div className="row">
            <div className="col-md-8">
              <CheckoutList lists={wahana} />
            </div>
            <div className="col-md-4 align-items-center">
              <Ringkasan wahana={categoryById} />
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}

export default Checkout;
