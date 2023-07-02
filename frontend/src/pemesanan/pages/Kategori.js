import React from "react";
import KategoriList from "../components/KategoriList";

function Kategori() {
  const dummy = [
    {
      category: "1",
      nama: "Air",
    },
    {
      category: "2",
      nama: "Darat",
    },
    {
      category: "3",
      nama: "Api",
    },
  ];

  return (
    <div className="container pt-5 section_gap mb-5">
      <h2 className="mt-5 text-center">Pilih Kategori Tiket</h2>
      <KategoriList list={dummy} />
    </div>
  );
}

export default Kategori;
