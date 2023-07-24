import React, { useState } from "react";
import {
  Routes,
  BrowserRouter as Router,
  Route,
  Navigate
} from "react-router-dom";

import MainNavigation from "./shared/components/Navigation/MainNavigation";
import Landing from "./landingPage/pages/Landing";
import Kategori from "./pemesanan/pages/Kategori";
import FooterLanding from "./shared/components/UIElements/FooterLanding";
import Checkout from "./pemesanan/pages/Checkout";
import Tiket from "./pemesanan/pages/Tiket";
import TiketAdmin from "./admin/pages/Tiket";
import { useGlobal } from "./shared/components/Hooks/GlobalHook";
import { globalContext } from "./shared/components/Context/global-context";
import MainAsideNavigation from "./shared/components/Navigation/admin/MainAsideNavigation";
import KategoriAdmin from "./admin/pages/KategoriAdmin";
import WahanaAdmin from "./admin/pages/WahanaAdmin";
import TambahTiket from "./admin/pages/TambahTiket";
import TambahKategori from "./admin/pages/TambahKategori";
import TambahWahana from "./admin/pages/TambahWahana";
import { CheckToken } from "./shared/components/Auth/CheckToken";

function App() {
  const { categoryGlobal, setCategoryGlobal } = useGlobal();
  const [role, setRole] = useState("user");


  let router;
  if (role === "admin") {
    router = (
      <Router>
        <MainAsideNavigation />
        <main>
          <Routes>
            <Route path="/" element={<TiketAdmin />} />
            <Route path="/tiket/tambah" element={<TambahTiket />} />
            <Route path="/kategori" element={<KategoriAdmin />} />
            <Route path="/kategori/tambah" element={<TambahKategori />} />
            <Route path="/wahana" element={<WahanaAdmin />} />
            <Route path="/wahana/tambah" element={<TambahWahana />} />
            <Route path="*" element={<Navigate to="/" />} />
          </Routes>
        </main>
      </Router>
    );
  } else {
    document.body.style.backgroundColor = "black";
    router = (
      <Router>
        <MainNavigation />
        <main>
        {/* <CheckToken /> */}
          <Routes>
            <Route path="/" element={<Landing />} />
            <Route path="/pesan/kategori" element={<Kategori />} />
            <Route path="/pesan/checkout" element={<Checkout />} />
            <Route path="/tiket/:id" element={<Tiket />} />
            <Route path="*" element={<Navigate to="/" />} />
          </Routes>
        </main>
        <FooterLanding />
      </Router>
    );
  }

  return (
    <globalContext.Provider
      value={{
        categoryGlobal,
        setCategoryGlobal,
      }}
    >
      {router}
    </globalContext.Provider>
  );
}

export default App;
