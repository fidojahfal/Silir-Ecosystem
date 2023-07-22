import { useCallback, useState } from "react";

function useGlobal() {
  const [categoryGlobal, setsCategoryGlobal] = useState(null);

  const setCategoryGlobal = useCallback((category) => {
    setsCategoryGlobal(category);
  }, []);

  return { categoryGlobal, setCategoryGlobal };
}

export default useGlobal;
