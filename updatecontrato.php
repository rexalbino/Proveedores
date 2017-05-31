<?php



?>
<html>
    <head>
    <title>Actualizando</title>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="shortcut icon" href="img/man.ico" type="image/x-icon" > 
        
    </head>
      
    <body class="#000000 black">
        <?php

			require("connection.php");
            
            $id=$_GET['id'];    
        
            $nombre=$_POST['nombre'];
            $moneda=$_POST['moneda'];
            $clabe=$_POST['clabe'];
            $cuenta=$_POST['cuenta'];
            $sucursal=$_POST['sucursal'];
            $swift=$_POST['swift'];
            $abba=$_POST['abba'];
            $ref=$_POST['referencia'];
            

        
        
            if(empty($id)||empty($nombre) || empty($moneda) || empty($clabe) || empty($cuenta) || empty($sucursal) || empty($swift)){
                echo "<script language=javaScript>alert('No se a podido cargar el articulo');</script>";
                
                echo "<h1 class='center-align #afb42b lime darken-2'>Algo salio mal</h1>";?>
     >
    <div class="center-align">
      <img src="img/sad.png">
        </div>
                
            <?php }else{
                $sql2="UPDATE `proveedores` SET `prob_nombre` = '$nombre', `id_monedau` = '$moneda', `prob_clabe` = '$clabe', `prob_cuenta` = '$cuenta', `prob_sucursal` = '$sucursal', `prob_swift` = '$swift', `prob_abba` = '$abba', `prob_ref` = '$ref' WHERE `proveedores`.`id_proveedor` = '$id';";
                mysqli_query($link,$sql2);
               // echo "<script language=javaScript>alert('Proveedor cargado exitosamente');</script>";
                
            
        
        echo "<h1 class='center-align #afb42b lime darken-2'>Actualizando</h1>";
        ?>
        </br>
        </br>
        </br>
        </br>
        </br>
        </br>
        </br>
        </br>
        </br>
        </br>
    <div class="center-align">
      <img src="img/PacMan.gif">
        </div>
        <?php } ?>
    </body>
            <?php
session_start();
$user=$_SESSION['user'];
$sql="SELECT * FROM usuario WHERE nombre_user='$user'";
$resultado = mysqli_query($link,$sql) ;
$row = mysqli_fetch_array($resultado);
if (@!$_SESSION['user']) {
	header("Location:index.php");
}elseif($row['roll']==0){
    echo "<script language=javaScript>alert('Usted no puede entar aqui');</script>";
    header("Location:index.php");
}else{
    header("Refresh: 5; URL=admin.php");
}
        die();
    ?>
  </html>