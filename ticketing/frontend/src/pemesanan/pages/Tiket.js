import React, { useMemo } from "react";
import QrCode from "../components/QrCode";
import TransaksiTiket from "../components/TransaksiTiket";

function Tiket() {
  const dummy = useMemo(
    () => ({
      id: "2112",
      kategori: "1",
      nama: "Fido",
      tanggalTransaksi: "20 Mei 2022",
    }),
    []
  );

  return (
    <div className="container pt-5 section_gap mb-5" style={{ color: "white" }}>
      <div className="border border-dark border-5 mt-5 " style={{backgroundColor: "gray"}}>
        <div className="container m-4 ">
          {/* <h1 className="">{dummy.namaWahana}</h1> */}
          <div className="row">
            <div className="col-md-12 d-flex align-items-center justify-content-center">
              <TransaksiTiket
                idTiket={dummy.id}
                kategori={dummy.kategori}
                namaPembeli={dummy.nama}
                tanggalTransaksi={dummy.tanggalTransaksi}
              />
            </div>
            <div className="col-md-12 d-flex align-items-center justify-content-center">
              <QrCode idTiket={dummy.id} />
            </div>
            {/* <div className="col-md-4 align-items-center">
          <Ringkasan wahana={dummy.namaWahana} />
        </div> */}
          </div>
        </div>
      </div>
    </div>
  );
}

export default Tiket;
