<?php
$host= $_SERVER["HTTP_HOST"];
$url= $_SERVER["REQUEST_URI"];
if("http://" . $host . $url === "http://carlosjc.epizy.com/sections/prod_comparacion.php"){
    header("Location: ../inicio");
}
?>
<div class="prod_comparacion">
    <h5>Productos de comparación más vendidos durante los últimos días.</h5>
    <div class="container mb-5 mt-5">
        <div class="pricing card-deck flex-column flex-md-row mb-3">
            <div class="card card-pricing text-center px-3 mb-4">
                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Automóviles</span>
                <div class="card-body pt-0">
                    <img src="../img/1.jpg" alt="" class="img-thumbnail">
                    <ul class="list-unstyled mb-4">
                        <li>Producto de limpieza bucal en oferta</li>
                    </ul>
                    <button type="button" class="btn btn-outline-secondary mb-3">VER REGISTRO</button>
                </div>
            </div>
            <div class="card card-pricing popular shadow text-center px-3 mb-4">
                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Televisores</span>
                <div class="card-body pt-0">
                    <ul class="list-unstyled mb-4">
                        <img src="../img/2.jpg" alt="..." class="img-thumbnail">
                        <li>Producto de higiene infantil en oferta</li>
                        
                    </ul>
                    <button type="button" class="btn btn-outline-secondary mb-3">VER REGISTRO</button>
                </div>
            </div>
            <div class="card card-pricing text-center px-3 mb-4">
                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Electrodomésticos</span>
                <div class="card-body pt-0">
                    <ul class="list-unstyled mb-4">
                        <img src="../img/3.jpg" alt="..." class="img-thumbnail">
                        <li>Producto de Ducha y Baño en oferta</li>
                    </ul>
                    <button type="button" class="btn btn-outline-secondary mb-3">VER REGISTRO</button>
                </div>
            </div>
            <div class="card card-pricing text-center px-3 mb-4">
                <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Computadoras</span>
                <div class="card-body pt-0">
                    <ul class="list-unstyled mb-4">
                        <img src="../img/4.jpg" alt="..." class="img-thumbnail">
                        
                        <li>Producto de Higiene intima en oferta</li>
                    </ul>
                    <button type="button" class="btn btn-outline-secondary mb-3">VER REGISTRO</button>
                </div>
            </div>
        </div>
        <div class="graf1">
                <div id="piechart"></div>
            </div>
            <div class="graf2">
                <div id="piechart2"></div>
            </div>
            <br><br>
        <div id="curve_chart" style="width: 900px; height: 500px"></div>
    </div>
</div>