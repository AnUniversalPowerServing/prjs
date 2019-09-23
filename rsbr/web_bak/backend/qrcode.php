<?php
include('lib/phpqrcode/qrlib.php');
QRcode::png($_GET["qrContent"]);
?>