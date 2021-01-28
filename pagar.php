<?php
include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
include 'templates/cabecera.php'
?>

<?php
    if ($_POST) {

        $total=0;
        $SID=session_id();
        $Correo=$_POST['email'];


        foreach($_SESSION['CARRITO'] AS $indice=>$producto){

            $total=$total+($producto['PRECIO']*$producto['CANTIDAD']);


        }

            $sentencia=$pdo->prepare("INSERT INTO `tblventas` 
            (`ID`, `ClaveTransaccion`, `PaypalDatos`, `Fecha`, `Correo`, `Total`, `status`) 
            VALUES (NULL,:ClaveTransaccion, '', NOW(),:Correo,:Total, 'pendiente');");

            $sentencia->bindParam(":ClaveTransaccion",$SID);
            $sentencia->bindParam(":Correo",$Correo);
            $sentencia->bindParam(":Total",$total);
            
            $sentencia->execute();

            $idVenta=$pdo->lastInsertId();

            foreach($_SESSION['CARRITO'] AS $indice=>$producto){

                $sentencia=$pdo->prepare("INSERT INTO 
                `tbldetalleventa` (`ID`, `IDVENTA`, `IDPRODUCTO`, `PRECIOUNITARIO`, `CANTIDAD`, `DESCARGADO`) 
                VALUES (NULL,:IDVENTA,:IDPRODUCTO,:PRECIOUNITARIO,:CANTIDAD, '0');");

                    $sentencia->bindParam(":IDVENTA",$idVenta);
                    $sentencia->bindParam(":IDPRODUCTO",$producto['ID']);
                    $sentencia->bindParam(":PRECIOUNITARIO",$producto['PRECIO']);
                    $sentencia->bindParam(":CANTIDAD",$producto['CANTIDAD']);

                    $sentencia->execute();

            
            }

       // echo "<h3>".$total."</h3>";

    }


?>



<script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>
 

<div class="jumbotron text-center">
    <h1 class="display-4">¡Paso Final!</h1>
    <hr class="my-4">
    <p class="lead">Estas a punto de Pagar con Paypal la cantidad de:
            <h4> $<?php echo number_format($total,2)?></h4>

            <div id="paypal-button-container"></div>

    </p>
    
    <p>Los Productos podrán ser entregados una vez se procese el pago <br/>
    <strong>Para aclaraciones: cruz_r_e@live.com</strong>
    </p>
</div>



<script>
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({

            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            
                            value: '0.01'

                           // description;"Compra de Productos a la Tienda: $ <?php // echo number_format($total,2);?>",
                            //custom:"<?php //echo $SID;?>#<?php // echo $idVenta;?>"


                        }
                    }]
                });
            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    // Show a success message to the buyer
                  //  alert('Transaction completed by ' + details.payer.name.given_name + '!');
                    
                   console.log(data);
                   
                  
                   
                
                
                  <?php
                  $sentencia=$pdo->prepare("INSERT INTO `pagosventa` (`ID`, `IDVENTA`, `PAGO`) VALUES (NULL, $idVenta, 'pagado');");
                  $sentencia->execute(); 

                  $sentencia=$pdo->prepare("UPDATE `tblventas` SET `PaypalDatos` = $idVenta, `status` = 'Pagado' WHERE `tblventas`.`ID` = $idVenta;");

                    $sentencia->execute();  
                    session_destroy();
                   // $session_destroy() ;

                      //echo"<script>alert('PAGO REALIZADO CON EXITO...')</script>";

                    ?>

                      // alert('¡Pago realizado con éxito!.... ');   

                       window.location="verificadorw.php"




                });
            }


        }).render('#paypal-button-container');
    </script>


<?php
include 'templates/pie.php'
?>