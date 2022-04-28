<?php
$host= $_SERVER["HTTP_HOST"];
$url= $_SERVER["REQUEST_URI"];
if("http://" . $host . $url === "http://carlosjc.epizy.com/sections/administrador.php"){
    header("Location: ../inicio");
}
?>
<div class="">
    <h5>Productos de especialidad más vendidos durante los últimos días.</h5>
    <div class="enlaces container">
        <a href="#">Ver ventas</a>
        <a href="#">Registro diario</a>
        <a href="#">Estado de clientes</a>
        <a href="#">Actualizar productos y servicios</a>
    </div>
    <div class="container mb-5 mt-5">
        <div class="graf1">
            <div id="piechart"></div>
        </div>
        <div class="graf2">
            <div id="piechart2"></div>
        </div>
        <div id="curve_chart" style="width: 900px; height: 500px"></div>
    </div>
</div>