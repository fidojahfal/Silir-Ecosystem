import React from "react";

function Input(props) {
  if (props.typeInput === "textArea") {
  }
  if (props.typeInput === "select") {
    return (
      <div className="form-group">
        <label>{props.title}</label>
        <select
          name={props.name}
          id={props.id}
          onChange={props.onChange}
          className="form-control select2"
          style={{ width: "100%" }}
        >
        <option value=""></option>
          {props.dataKategori.map((kategori, index) => {
            return <option key={index} value={kategori.ID}>{kategori.Nama_kategori}</option>;
          })}
        </select>
      </div>
    );
  }

  return (
    <div className="form-group">
      <label>{props.title}</label>
      <input
        type={props.type}
        className="form-control"
        name={props.name}
        id={props.id}
        placeholder={props.placeholder}
        onChange={props.onChange}
        value={props.value}
        disabled={props.disabled}
      />
    </div>
  );
}

export default Input;
