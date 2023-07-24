import React, { useMemo } from "react";
import Header from "../components/Header";
import Section from "../components/Section";
import WahanaAdminList from "../components/WahanaAdminList";

function WahanaAdmin() {
  const dummy = useMemo(
    () => ({
      data: [
        {
          ID: 1,
          CreatedAt: "0001-01-01T00:00:00Z",
          UpdatedAt: "0001-01-01T00:00:00Z",
          DeletedAt: null,
          Id_kategori: 1,
          Nama_wahana: "Arung Jeram",
          Fee: 20000,
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
          ID: 2,
          CreatedAt: "0001-01-01T00:00:00Z",
          UpdatedAt: "0001-01-01T00:00:00Z",
          DeletedAt: null,
          Id_kategori: 1,
          Nama_wahana: "Seluncur Air",
          Fee: 10000,
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
          ID: 3,
          CreatedAt: "0001-01-01T00:00:00Z",
          UpdatedAt: "0001-01-01T00:00:00Z",
          DeletedAt: null,
          Id_kategori: 2,
          Nama_wahana: "Pijat Uslug-Uslug",
          Fee: 10000000,
          KategoriWahana: {
            ID: 2,
            CreatedAt: "0001-01-01T00:00:00Z",
            UpdatedAt: "0001-01-01T00:00:00Z",
            DeletedAt: null,
            Nama_kategori: "Kering",
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
      <Header title="List Wahana" />

      <Section>
        <WahanaAdminList dataWahana={dummy.data} />
      </Section>
    </div>
  );
}

export default WahanaAdmin;
