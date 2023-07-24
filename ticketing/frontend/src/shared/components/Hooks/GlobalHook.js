import { useCallback, useState } from "react";

export function useGlobal() {
  const [categoryGlobal, setsCategoryGlobal] = useState();

  const setCategoryGlobal = useCallback((category) => {
    setsCategoryGlobal(category);
  }, []);

  return { categoryGlobal, setCategoryGlobal };
}


