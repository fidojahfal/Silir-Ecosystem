import React, { useMemo, useEffect } from "react";
import CheckoutList from "../components/CheckoutList";
import Ringkasan from "../components/Ringkasan";
import useGlobal from "../../shared/components/Hooks/GlobalHook";

function Checkout() {
  const { categoryGlobal } = useGlobal();
  // const dummy = useMemo(
  //   () => ({
  //     namaWahana: "Wahana Bebas",
  //     listWahana: [
  //       { wahanaName: "Kincir Angin", harga: "99999" },
  //       { wahanaName: "Rumah Hantu", harga: "99999" },
  //       { wahanaName: "Kora Kora", harga: "99999" },
  //       { wahanaName: "Arum Jeram", harga: "99999" },
  //       { wahanaName: "Istana Boneka", harga: "99999" },
  //     ],
  //   }),
  //   []
  // );
  useEffect(() => {
    console.log(categoryGlobal);
  }, [categoryGlobal]);
  return (
    <div className="container pt-5 section_gap mb-5" style={{ color: "black" }}>
      <div className="border border-dark border-5 mt-5">
        <div className="container m-4">
          {/* <h1 className="">{dummy.namaWahana}</h1> */}
          <div className="row">
            <div className="col-md-8">
              {/* <CheckoutList lists={dummy.listWahana} /> */}
            </div>
            <div className="col-md-4 align-items-center">
              {/* <Ringkasan wahana={dummy.namaWahana} /> */}
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}

export default Checkout;
