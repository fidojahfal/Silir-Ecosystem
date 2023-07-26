import React, { useState } from "react";
import {
  Routes,
  BrowserRouter as Router,
  Route,
  Navigate,
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
import QRAdmin from "./admin/pages/QRAdmin";
import Logout from "./shared/components/Form/Logout";

function App() {
  const {
    categoryGlobal,
    urlAPIGlobal,
    setCategoryGlobal,
    login,
    loginDetail,
  } = useGlobal();
  const [role, setRole] = useState("user");

  let routes;
  if (loginDetail.role === "admin") {
    document.body.style.backgroundColor = "white";
    routes = (
      <Routes>
        <Route path="/admin" element={<TiketAdmin />} />
        <Route path="/admin/tiket/:id" element={<QRAdmin />} />
        <Route path="/tiket/tambah" element={<TambahTiket />} />
        <Route path="/kategori" element={<KategoriAdmin />} />
        <Route path="/kategori/tambah" element={<TambahKategori />} />
        <Route path="/wahana" element={<WahanaAdmin />} />
        <Route path="/wahana/tambah" element={<TambahWahana />} />
        <Route path="/logout" element={<Logout />} />
        {/* <Route path="*" element={<Navigate to="/admin" />} /> */}
      </Routes>
    );
  } else {
    document.body.style.backgroundColor = "black";
    routes = (
      <Routes>
        <Route path="/landing" element={<Landing />} />
        <Route path="/pesan/kategori" element={<Kategori />} />
        <Route path="/pesan/checkout" element={<Checkout />} />
        <Route path="/tiket/:id" element={<Tiket />} />
        <Route path="/logout" element={<Logout />} />
        {/* <Route path="*" element={<Navigate to="/landing" />} /> */}
      </Routes>
    );
  }

  return (
    <globalContext.Provider
      value={{
        categoryGlobal,
        setCategoryGlobal,
        urlAPI: urlAPIGlobal,
        login,
        userId: loginDetail.userId,
        nama: loginDetail.nama,
        role: loginDetail.role,
      }}
    >
      <Router>
        {loginDetail.role === "admin" ? (
          <MainAsideNavigation />
        ) : (
          <MainNavigation />
        )}
        <main>
          <CheckToken />
          {routes}
        </main>
        {loginDetail.role === "user" && <FooterLanding />}
      </Router>
    </globalContext.Provider>
  );
}

export default App;
