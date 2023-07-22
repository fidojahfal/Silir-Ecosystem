import { createContext } from "react";

export const globalContext = createContext({
  categoryGlobal: null,
  token: null,
  setCategoryGlobal: () => {},
  login: () => {},
});
