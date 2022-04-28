<?php
$host= $_SERVER["HTTP_HOST"];
$url= $_SERVER["REQUEST_URI"];
if("http://" . $host . $url === "http://carlosjc.epizy.com/sections/atencionCliente.php"){
    header("Location: ../inicio");
}
?>
<div class="atencion_cliente">
    <h5>Una buena atención es un factor que ayuda a mantener una buena relación con los clientes.</h5>
    <div class="enlaces container">
        <a href="#">Preguntas frecuentes</a>
        <a href="#">Productos o servicios</a>
        <a href="#">Chats recientes</a>
        <a href="#">Clientes</a>
    </div>
    <div class="container mb-5 mt-5"> 
    <!-- <div class="card">
        <div class="card-header">
          Quejas/ Subgeremcias
        </div>
        <div class="card-body">
          <h5 class="card-title">Describa brevemente</h5>
        <input class="form-control form-control-lg" type="text" placeholder="text">
        <br>
          <a href="#" class="btn btn-primary">Enviar</a>
        </div>
      </div> -->
      <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Código</th>
      <th scope="col">Descripción</th>
      <th scope="col">Cliente</th>
      <th scope="col">Producto</th>
      <th scope="col">Estado</th>
      <th scope="col">Duración</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Resuelto</td>
      <td>0.00</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
      <td>Pendiente</td>
      <td>0.00</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
      <td>Resuelto</td>
      <td>0.00</td>
    </tr>
  </tbody>
</table>
    </div>
    