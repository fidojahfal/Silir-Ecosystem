import { createContext } from "react";

export const globalContext = createContext({
  categoryGlobal: null,
  token: null,
  urlAPI: null,
  userId: null,
  nama: null,
  role: null,
  setCategoryGlobal: () => {},
  login: () => {},
});
