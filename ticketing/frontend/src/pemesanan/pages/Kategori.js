import React, {
  useMemo,
  useEffect,
  useState,
  useLayoutEffect,
  useContext,
} from "react";
import KategoriList from "../components/KategoriList";
import useHttpClient from "../../shared/components/Hooks/HttpHook";
import { globalContext } from "../../shared/components/Context/global-context";

function Kategori() {
  const { isLoading, sendRequest, error, clearError } = useHttpClient();
  const [category, setCategory] = useState([]);
  const GlobalVar = useContext(globalContext);
  // const dummy = useMemo(
  //   () => [
  //     {
  //       category: "1",
  //       nama: "Air",
  //     },
  //     {
  //       category: "2",
  //       nama: "Darat",
  //     },
  //     {
  //       category: "3",
  //       nama: "Api"
  //     },
  //   ],
  //   []
  // );

  useLayoutEffect(() => {
    document.body.style.backgroundColor = "black";
  }, []);

  useEffect(() => {
    async function getCategory() {
      try {
        const request = await sendRequest(
          `http://${GlobalVar.urlAPI}:8080/api/v1/category`
        );
        setCategory(request.data);
      } catch (error) {
        setCategory([]);
      }
    }
    getCategory();
  }, [sendRequest]);
  return (
    <div className="container pt-5 section_gap mb-5">
      <h2 className="mt-5 text-center" color="white">
        Pilih Kategori Tiket
      </h2>
      <KategoriList list={category} />
    </div>
  );
}

export default Kategori;
