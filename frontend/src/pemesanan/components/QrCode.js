import React from "react";
import { QRCodeCanvas } from "qrcode.react";

function QrCode(props) {
    return <QRCodeCanvas value={{"id_tiket": "1223"}} size="300" level="H" />
}

export default QrCode;
