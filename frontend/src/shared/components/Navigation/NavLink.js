import React from "react";

function NavLink() {
  return <div className="collapse navbar-collapse offset" id="navbarSupportedContent">
  <ul className="nav navbar-nav menu_nav ml-auto">
      <li className="nav-item active"><a className="nav-link" href="index.html">Home</a></li> 
      <li className="nav-item"><a className="nav-link" href="about.html">About us</a></li>
      <li className="nav-item"><a className="nav-link" href="accomodation.html">Accomodation</a></li>
      <li className="nav-item"><a className="nav-link" href="gallery.html">Gallery</a></li>
      <li className="nav-item submenu dropdown">
          {/* <a href="#" className="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog</a> */}
          <ul className="dropdown-menu">
              <li className="nav-item"><a className="nav-link" href="blog.html">Blog</a></li>
              <li className="nav-item"><a className="nav-link" href="blog-single.html">Blog Details</a></li>
          </ul>
      </li> 
      <li className="nav-item"><a className="nav-link" href="elements.html">Elemests</a></li>
      <li className="nav-item"><a className="nav-link" href="contact.html">Contact</a></li>
  </ul>
</div>
}

export default NavLink;
