import React from "react";
import MainAside from "./MainAside";
import AsideNavLink from "./AsideNavLink";

function MainAsideNavigation() {
  return (
    <MainAside>
      <nav className="mt-2">
        <AsideNavLink />
      </nav>
    </MainAside>
  );
}

export default MainAsideNavigation;
