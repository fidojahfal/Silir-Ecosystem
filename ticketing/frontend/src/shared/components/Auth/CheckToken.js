import { useContext, useEffect } from "react";
import { useSearchParams } from "react-router-dom";
import useHttpClient from "../Hooks/HttpHook";
import { globalContext } from "../Context/global-context";

export const CheckToken = () => {
  const [queryParameters] = useSearchParams();
  const { sendRequest } = useHttpClient();
  const GlobalVar = useContext(globalContext);

  useEffect(() => {
    if (!queryParameters.get("access_token")) {
      if (!sessionStorage.getItem("access_token")) {
        return window.open(`http://${GlobalVar.urlAPI}:7778`, "_self");
      }
    } else {
      sessionStorage.setItem(
        "access_token",
        queryParameters.get("access_token")
      );
    }

    async function getDataUser() {
      try {
        const request = await sendRequest(
          `http://${GlobalVar.urlAPI}:7777/api/auth/user-profile`,
          "GET",
          null,
          {
            Authorization: `Bearer ` + sessionStorage.getItem("access_token"),
          }
        );
        GlobalVar.login(request.id, request.name, request.role);
      } catch (error) {
        window.open(`http://${GlobalVar.urlAPI}:7778`, "_self");
      }
    }
    if (!GlobalVar.userId) {
      getDataUser();
    }
  }, [queryParameters, sendRequest, GlobalVar]);
};
