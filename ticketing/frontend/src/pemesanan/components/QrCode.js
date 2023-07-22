import React from "react";
import { QRCodeCanvas } from "qrcode.react";

function QrCode(props) {
  return (
    <div className="mb-2">
      <QRCodeCanvas
        value={`{"idTiket": "${props.idTiket}"}`}
        size="300"
        level="H"
      />
    </div>
  );
}

export default QrCode;
