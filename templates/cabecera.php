<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tienda</title>

    <!-- Entrar a la la liga https://getbootstrap.com/docs/4.3/getting-started/introduction/
  copiar el enlace de CSS y JS

  También puedes usar extenciones

  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>

<!-- Para hacer un menu escribimos 

b-navbar
b-navbar-default

  -->

    
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="index.php">CBT Timilpan Esferas</a>  <!-- Modificamos el título  colocamos en hret index.php-->
        <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="Empresa/index.html">Empresa <span class="sr-only">(current)</span></a>  <!-- Modificamosa Inicio y colocamos en href index.php -->
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Catálogo <span class="sr-only">(current)</span></a>  <!-- Modificamosa Inicio y colocamos en href index.php -->
            </li>

            <li class="nav-item">
              <a class="nav-link" href="mostrarCarrito.php">Carrito(<?php 
              echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);
              
              ?>)</a>  <!-- Modificamos a carrito -->
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</a>
              <div class="dropdown-menu" aria-labelledby="dropdownId">
                <a class="dropdown-item" href="admintienda/template/index.php">LOG IN   </a>
               <!--  <a class="dropdown-item" href="#">Action  -->
              </div>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>

      <br/>    <!-- Se colocan br/ -->
      <br/>

      <div class="container">   <!-- Colocamos un div con la clase container -->
        