import React from "react";

function Button(props) {
  if (props.href) {
    return (
      <a href={props.href} className={`btn ${props.class}`} style={props.style} onClick={props.onClick}>
        {props.children}
      </a>
    );
  }
  return (
    <button type="button" className={`btn ${props.class}`} style={props.style} onClick={props.onClick}>
      {props.children}
    </button>
  );
}

export default Button;
