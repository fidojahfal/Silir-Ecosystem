import { useEffect } from "react";
import { useSearchParams } from "react-router-dom";
import useHttpClient from "../Hooks/HttpHook";

export const CheckToken = () => {
  const [queryParameters] = useSearchParams();
  const { sendRequest } = useHttpClient();
  useEffect(() => {
    if (!queryParameters.get("access_token")) {
      if (!sessionStorage.getItem("access_token")) {
        window.open("http://localhost:8080", "_self");
      }
    }
    sessionStorage.setItem("access_token", queryParameters.get("access_token"));

    async function getDataUser() {
      try {
        const request = await sendRequest("URL", "GET", null, {
          Authorization: `Bearer ` + sessionStorage.getItem("access_token"),
        });
      } catch (error) {}
    }
    getDataUser();
  }, [queryParameters, sendRequest]);
};
