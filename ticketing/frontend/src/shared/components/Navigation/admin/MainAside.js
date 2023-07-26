import React from "react";

function MainAside(props) {
  return (
    <aside className="main-sidebar sidebar-dark-primary elevation-4">
      {/* Brand Logo */}
      <a href="index3.html" className="brand-link">
        <span className="brand-text font-weight-light">Admin Panel</span>
      </a>

      {/* Sidebar Menu */}
      {props.children}
    </aside>
  );
}

export default MainAside;
