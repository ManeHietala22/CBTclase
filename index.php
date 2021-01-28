<?php
include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
include 'templates/cabecera.php'
?>

<!-- para iniciar el formato con un   !   -->

<br>  <!-- Colocamos un br/ -->

        <?php if ($mensaje!="") {
          
        ?>

        <div class="alert alert-success">   <!-- Colocamos un b-alert y seleccionamos success -->

        <?php  echo $mensaje; ?>

        <a href="mostrarCarrito.php" class="badge badge-succes"> Ver Carrito</a>   <!-- colocar un boton  -->

        </div>

        <?php }?>

 <!-- No toca crear una columna -->


      <div class="row">   <!-- Se inserta la fila con   b-row -->
           
           <?php 
           
            $sentencia=$pdo->prepare("SELECT * FROM `tblproductos`"); //abrimos una sentencia SQL
            $sentencia->execute();  // permite ejecutar la sentencia SQL
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC); //asignamos a la variable lista de productos la sentencia
           // print_r($listaProductos);  //desplegamos los productos
           
           ?>


           <?php foreach ($listaProductos as $producto) { ?>   <!-- leer el contenido de la sentecnia que esta almacenada que se transfiere a la variable producto inicia la instrucción  for -->
            

            <div class="col-3">   <!-- Se inserta un elemento col con un tamaño de 3   col-xs-12 col-sm-8 col-md-9  
            seleccionar a partir de col 3 para repetir el producto-->
            <div class="card">
                                <!-- Insertamos un elemento B-img  y seleccionamos el b-card-img-top
                              src="archivos/<?php // echo $producto['Imagen'];?>" 

                             
                              -->
                <img  
                title="<?php echo $producto['Nombre'];?>"  
                alt="<?php echo $producto['Nombre'];?>"
                class="card-img-top" 
                
                src="<?php echo $producto['Imagen'];?>"  

                data-toggle="popover"
                data-trigger="hover"
                data-content="<?php echo $producto['Descripcion'];?>"
                height="317px"
                >

                <div class="card-body">
                    <span><?php echo $producto['Nombre'];?></span>
                        <h5 class="card-title">$<?php echo $producto['Precio'];?></h5>  <!-- colocamos datos-->
                        <!--  <p class="card-text"><?php //echo $producto['Descripcion'];?></p>  colocamos datos-->

                        <!-- Colocamos un boton con b-btn-->
                        <!-- se inicia un formulario para enviar informaciónal carrito
                      -->
                        <form action="" method="post">

                              <!--el boton debe de estar dentro del formulario-->
                           
                            <input type="hidden" name="id" id="id" value="<?php echo $producto['ID'];?>">
                            <input type="hidden" name="nombre" id="nombre" value="<?php echo $producto['Nombre'];?>">
                            <input type="hidden" name="precio" id="precio" value="<?php echo $producto['Precio'];?>">
                            <input type="hidden" name="cantidad" id="cantidad" value="<?php echo 1;?>">


                              <button class="btn btn-primary" 
                              name="btnAccion" 
                              value="Agregar" 
                              type="submit">
                                  Agregar al carrito
                              </button>

                        </form>
                        

                        

                </div>
            </div>

            </div>


           <?php } ?>



      </div>

      </div>




      <!-- inicia el scrip de popover  esto para que muestre el titulo y la descripción de los productos
    permitte que identifica los popover 
    --> 
<script>

$(function () {
  $('[data-toggle="popover"]').popover()
});

</script>
<!-- inicia el scrip de popover--> 


<?php
include 'templates/pie.php'
?>