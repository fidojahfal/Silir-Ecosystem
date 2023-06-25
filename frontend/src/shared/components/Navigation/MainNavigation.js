import React from "react";
import MainHeader from "./MainHeader";
import NavLink from "./NavLink";

function MainNavigation() {
  return (
    <MainHeader>
      <a className="navbar-brand logo_h" href="index.html">
        <img src="/images/Logo.png" alt=""></img>
      </a>
      <button
        className="navbar-toggler"
        type="button"
        dataToggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span className="icon-bar"></span>
        <span className="icon-bar"></span>
        <span className="icon-bar"></span>
      </button>
      <NavLink />
    </MainHeader>
  );
}

export default MainNavigation;
