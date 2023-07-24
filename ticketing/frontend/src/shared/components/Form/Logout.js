import { useContext, useEffect } from "react";
import { globalContext } from "../Context/global-context";

function Logout() {
  const GlobalVar = useContext(globalContext);
  useEffect(() => {
    sessionStorage.clear();
    window.open(`http://${GlobalVar.urlAPI}:7778/logout`, "_self");
  }, [GlobalVar.urlAPI]);
}

export default Logout;
