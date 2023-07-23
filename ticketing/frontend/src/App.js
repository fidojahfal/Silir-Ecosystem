import React from "react";
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
import useGlobal from "./shared/components/Hooks/GlobalHook";
import { globalContext } from "./shared/components/Context/global-context";

function App() {
  const { categoryGlobal, setCategoryGlobal } = useGlobal();

  return (
    <globalContext.Provider
      value={{
        categoryGlobal,
        setCategoryGlobal: setCategoryGlobal,
      }}
    >
      <Router>
        <MainNavigation />
        <main>
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
    </globalContext.Provider>
  );
}

export default App;
