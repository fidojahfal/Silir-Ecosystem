import React from "react";

function FooterLanding() {
  const year = new Date().getFullYear();
  return (
    <footer className="footer-area section_gap">
      <div className="container">
        <div className="row footer-bottom d-flex justify-content-between align-items-center">
          <p className="col-lg-8 col-sm-12 footer-text m-0">
            Copyright &copy; {year} All rights reserved | This template is made
            with <i className="fa fa-heart-o" aria-hidden="true"></i> by{" "}
            <a href="https://colorlib.com" target="_blank">
              Colorlib
            </a>
          </p>
          <div className="col-lg-4 col-sm-12 footer-social">
            <a href="#">
              <i className="fa fa-facebook"></i>
            </a>
            <a href="#">
              <i className="fa fa-twitter"></i>
            </a>
            <a href="#">
              <i className="fa fa-dribbble"></i>
            </a>
            <a href="#">
              <i className="fa fa-behance"></i>
            </a>
          </div>
        </div>
      </div>
    </footer>
  );
}

export default FooterLanding;
