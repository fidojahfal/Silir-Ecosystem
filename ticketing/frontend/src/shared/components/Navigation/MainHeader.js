import React from "react";

function MainHeader(props) {
  return (
    <header className="header_area">
      <div className="container">
        <nav className="navbar navbar-expand-lg navbar-light">{props.children}</nav>
      </div>
    </header>
  );
}

export default MainHeader;
