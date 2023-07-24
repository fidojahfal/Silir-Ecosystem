import React from "react";

function AsideNavLink() {
  return (
    <ul
      className="nav nav-pills nav-sidebar flex-column"
      data-widget="treeview"
      role="menu"
      data-accordion="false"
    >
      {/* Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library */}
      <li className="nav-item">
        <a href="#" className="nav-link">
          <i className="nav-icon fas fa-copy"></i>
          <p>
            Ticket
            <i className="fas fa-angle-left right"></i>
            <span className="badge badge-info right"></span>
          </p>
        </a>
        <ul className="nav nav-treeview" style={{display: "block"}}>
          <li className="nav-item">
            <a href="/tiket/tambah" className="nav-link">
              <i className="far fa-circle nav-icon"></i>
              <p>Tambah Tiket</p>
            </a>
          </li>
          <li className="nav-item">
            <a href="/" className="nav-link">
              <i className="far fa-circle nav-icon"></i>
              <p>List Tiket</p>
            </a>
          </li>
        </ul>
      </li>
      <li className="nav-item">
        <a href="pages/widgets.html" className="nav-link">
          <i className="nav-icon fas fa-th"></i>
          <p>
            Transaksi
            <span className="right badge badge-danger"></span>
          </p>
        </a>
      </li>
      <li className="nav-item">
        <a href="#" className="nav-link">
          <i className="nav-icon fas fa-copy"></i>
          <p>
            Kategori Wahana
            <i className="fas fa-angle-left right"></i>
            <span className="badge badge-info right"></span>
          </p>
        </a>
        <ul className="nav nav-treeview" style={{display: "block"}}>
          <li className="nav-item">
            <a href="/kategori/tambah" className="nav-link">
              <i className="far fa-circle nav-icon"></i>
              <p>Tambah Kategori</p>
            </a>
          </li>
          <li className="nav-item">
            <a href="/kategori" className="nav-link">
              <i className="far fa-circle nav-icon"></i>
              <p>List Kategori</p>
            </a>
          </li>
        </ul>
      </li>
      <li className="nav-item">
        <a href="#" className="nav-link">
          <i className="nav-icon fas fa-copy"></i>
          <p>
            Wahana
            <i className="fas fa-angle-left right"></i>
            <span className="badge badge-info right"></span>
          </p>
        </a>
        <ul className="nav nav-treeview" style={{display: "block"}}>
          <li className="nav-item">
            <a href="/wahana/tambah" className="nav-link">
              <i className="far fa-circle nav-icon"></i>
              <p>Tambah Wahana</p>
            </a>
          </li>
          <li className="nav-item">
            <a href="/wahana" className="nav-link">
              <i className="far fa-circle nav-icon"></i>
              <p>List Wahana</p>
            </a>
          </li>
        </ul>
      </li>
      <li className="nav-item">
        <a href="/logout" className="nav-link">
          <i className="nav-icon fas fa-th"></i>
          <p>
            Logout
            <span className="right badge badge-danger"></span>
          </p>
        </a>
      </li>
    </ul>
  );
}

export default AsideNavLink;
