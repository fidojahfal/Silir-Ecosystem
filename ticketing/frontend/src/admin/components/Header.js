import React from "react";

function Header(props) {
  return (
    <section className="content-header">
      <div className="container-fluid">
        <div className="row mb-2">
          <div className="col-sm-6">
            <h1>{props.title}</h1>
          </div>
        </div>
      </div>
    </section>
  );
  
}

export default Header;
