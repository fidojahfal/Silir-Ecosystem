import { useCallback, useState } from "react";

export function useGlobal() {
  const [categoryGlobal, setsCategoryGlobal] = useState();
  const [loginDetail, setLoginDetail] = useState({});
  const [urlAPIGlobal, setUrlApiGlobal] = useState("192.168.246.241");

  const setCategoryGlobal = useCallback((category) => {
    setsCategoryGlobal(category);
  }, []);

  const login = useCallback((userId, nama, role) => {
    setLoginDetail({
      userId,
      role,
      nama
    });
  }, []);

  return {
    categoryGlobal,
    urlAPIGlobal,
    loginDetail,
    login,
    setCategoryGlobal,
  };
}
