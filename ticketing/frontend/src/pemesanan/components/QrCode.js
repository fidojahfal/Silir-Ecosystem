import React from "react";
import { QRCodeCanvas } from "qrcode.react";

function QrCode(props) {
  return (
    <div className="mb-2">
      <QRCodeCanvas
        value={`{"id_tiket": ${parseInt(props.idTiket)}}`}
        size="200"
        level="H"
      />
    </div>
  );
}

export default QrCode;
