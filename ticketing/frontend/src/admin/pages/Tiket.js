import React, { useMemo } from "react";
import TitleTiket from "../components/Header";
import TiketList from "../components/TiketList";
import Section from "../components/Section";

function Tiket() {
  const dummy = useMemo(
    () => ({
      data: [
        {
          ID: 70000000,
          CreatedAt: "2023-07-17T17:03:05.265+07:00",
          UpdatedAt: "2023-07-17T17:03:05.265+07:00",
          DeletedAt: null,
          Id_kategori: 1,
          Fee: 40000,
          Masuk: null,
          KategoriWahana: {
            ID: 1,
            CreatedAt: "0001-01-01T00:00:00Z",
            UpdatedAt: "0001-01-01T00:00:00Z",
            DeletedAt: null,
            Nama_kategori: "Air",
            Available: true,
            Ticket: null,
            Wahana: null,
          },
        },
        {
          ID: 70000001,
          CreatedAt: "2023-07-17T17:04:05.933+07:00",
          UpdatedAt: "2023-07-17T17:04:05.933+07:00",
          DeletedAt: null,
          Id_kategori: 1,
          Fee: 40000,
          Masuk: null,
          KategoriWahana: {
            ID: 1,
            CreatedAt: "0001-01-01T00:00:00Z",
            UpdatedAt: "0001-01-01T00:00:00Z",
            DeletedAt: null,
            Nama_kategori: "Air",
            Available: true,
            Ticket: null,
            Wahana: null,
          },
        },
      ],
      status: "1",
    }),
    []
  );

  return (
    <div className="content-wrapper">
      <TitleTiket title="List Tiket" />
      <Section>
        <TiketList dataTiket={dummy.data} />
      </Section>
    </div>
  );
}

export default Tiket;
