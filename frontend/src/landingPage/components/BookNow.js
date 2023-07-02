import React from "react";
import Button from "../../shared/components/Form/Button";

function BookNow() {
  return (
    <section className="accomodation_area m-5 text-center">
      <div className="container">
        <Button
          href="/pesan/kategori"
          class="genric-btn primary radius btn-block"
        >
          Pesan Sekarang
        </Button>
      </div>
    </section>
  );
}

export default BookNow;
