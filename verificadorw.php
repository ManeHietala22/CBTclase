<?php
include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
//include 'mostrarCarrito.php';
include 'templates/cabecera.php';


?>

<?php
//header ("Location:index.php");

session_destroy();

?>


<div class="jumbotron">
    <h1 class="display-4">Listo</h1>
    <p class="lead">Tu pago se aprobado</p>
    <hr class="my-4">
    <p>Content</p>
</div>





<?php
include 'templates/pie.php'
?>