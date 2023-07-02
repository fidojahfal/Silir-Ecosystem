import React from "react";

function FooterLanding() {
  const year = new Date().getFullYear();
  return (
    <footer class="footer-area section_gap">
      <div class="container">
        <div class="row footer-bottom d-flex justify-content-between align-items-center">
          <p class="col-lg-8 col-sm-12 footer-text m-0">
            Copyright &copy; {year} All rights reserved | This template is made
            with <i class="fa fa-heart-o" aria-hidden="true"></i> by{" "}
            <a href="https://colorlib.com" target="_blank">
              Colorlib
            </a>
          </p>
          <div class="col-lg-4 col-sm-12 footer-social">
            <a href="#">
              <i class="fa fa-facebook"></i>
            </a>
            <a href="#">
              <i class="fa fa-twitter"></i>
            </a>
            <a href="#">
              <i class="fa fa-dribbble"></i>
            </a>
            <a href="#">
              <i class="fa fa-behance"></i>
            </a>
          </div>
        </div>
      </div>
    </footer>
  );
}

export default FooterLanding;
