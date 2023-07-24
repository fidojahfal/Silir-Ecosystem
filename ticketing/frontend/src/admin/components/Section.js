import React from "react";

function Section(props) {
  return (
    <section className="content">
      <div className="container-fluid">
        <div className="row">
          <div className="col-12">
            <div className="card">
              <div className="card-header"></div>
              <div className="card-body">{props.children}</div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}

export default Section;
