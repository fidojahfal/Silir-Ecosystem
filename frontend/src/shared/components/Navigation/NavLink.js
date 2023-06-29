import React from "react";

function NavLink() {
  return <div className="collapse navbar-collapse offset" id="navbarSupportedContent">
  <ul className="nav navbar-nav menu_nav ml-auto">
      <li className="nav-item active"><a className="nav-link" href="index.html">Home</a></li> 
      <li className="nav-item"><a className="nav-link" href="accomodation.html">Wahana</a></li>
      <li className="nav-item"><a className="nav-link" href="gallery.html">Fasilitas</a></li>
      <li className="nav-item"><a className="nav-link" href="about.html">About us</a></li>
  </ul>
</div>
}

export default NavLink;
