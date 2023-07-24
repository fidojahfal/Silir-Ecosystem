import React, { useMemo } from "react";
import Header from "../components/Header";
import KategoriAdminList from "../components/KategoriAdminList";
import Section from "../components/Section";

function KategoriAdmin() {
  const dummy = useMemo(
    () => ({
      data: [
        {
          ID: 1,
          CreatedAt: "0001-01-01T00:00:00Z",
          UpdatedAt: "0001-01-01T00:00:00Z",
          DeletedAt: null,
          Nama_kategori: "Air",
          Available: true,
          Ticket: null,
          Wahana: [
            {
              ID: 1,
              CreatedAt: "0001-01-01T00:00:00Z",
              UpdatedAt: "0001-01-01T00:00:00Z",
              DeletedAt: null,
              Id_kategori: 1,
              Nama_wahana: "Arung Jeram",
              Fee: 20000,
              KategoriWahana: {
                ID: 0,
                CreatedAt: "0001-01-01T00:00:00Z",
                UpdatedAt: "0001-01-01T00:00:00Z",
                DeletedAt: null,
                Nama_kategori: "",
                Available: false,
                Ticket: null,
                Wahana: null,
              },
            },
            {
              ID: 2,
              CreatedAt: "0001-01-01T00:00:00Z",
              UpdatedAt: "0001-01-01T00:00:00Z",
              DeletedAt: null,
              Id_kategori: 1,
              Nama_wahana: "Seluncur Air",
              Fee: 10000,
              KategoriWahana: {
                ID: 0,
                CreatedAt: "0001-01-01T00:00:00Z",
                UpdatedAt: "0001-01-01T00:00:00Z",
                DeletedAt: null,
                Nama_kategori: "",
                Available: false,
                Ticket: null,
                Wahana: null,
              },
            },
          ],
        },
        {
          ID: 2,
          CreatedAt: "0001-01-01T00:00:00Z",
          UpdatedAt: "0001-01-01T00:00:00Z",
          DeletedAt: null,
          Nama_kategori: "Kering",
          Available: true,
          Ticket: null,
          Wahana: [
            {
              ID: 3,
              CreatedAt: "0001-01-01T00:00:00Z",
              UpdatedAt: "0001-01-01T00:00:00Z",
              DeletedAt: null,
              Id_kategori: 2,
              Nama_wahana: "Pijat Uslug-Uslug",
              Fee: 9999999,
              KategoriWahana: {
                ID: 0,
                CreatedAt: "0001-01-01T00:00:00Z",
                UpdatedAt: "0001-01-01T00:00:00Z",
                DeletedAt: null,
                Nama_kategori: "",
                Available: false,
                Ticket: null,
                Wahana: null,
              },
            },
          ],
        },
      ],
      status: "1",
    }),
    []
  );

  return (
    <div className="content-wrapper">
      <Header title="List Kategori" />
      <Section>
        <KategoriAdminList dataKategori={dummy.data} />
      </Section>
    </div>
  );
}

export default KategoriAdmin;
