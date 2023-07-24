import React from "react";

function MainHeader(props) {
  return (
    <header className="header_area">
      <div className="container">{props.children}</div>
    </header>
  );
}

export default MainHeader;
