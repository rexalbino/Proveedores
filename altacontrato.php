<?php



?>
<html>
    <head>
    <title>Bitacora digital</title>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="shortcut icon" href="img/man.ico" type="image/x-icon" > 
        
    </head>
      
    <body class="#212121 grey darken-4">
        <?php

			require("connection.php");
            

            $nombre=$_POST['nombre'];
            $inicio=$_POST['inicio'];
            $fin=$_POST['fin'];
            $area=$_POST['area'];
            $tipocontrato=$_POST['contratype'];
            $thirdp=$_POST['tparty'];
            
        
            $tamano = $_FILES["flie"]['size'];
	        $tipo = $_FILES["flie"]['type'];
	        $archivo = $_FILES["flie"]['name'];
	        $prefijo = substr(md5(uniqid(rand())),0,6);
            //$ruta="IMG/productos/";
            $archivod = "pdf/".$prefijo."_".$archivo;
        
        
            if(empty($nombre) || empty($inicio) || empty($fin) || empty($area) || empty($tipocontrato) || empty($thirdp)){
                echo "<script language=javaScript>alert('No se a podido cargar el articulo');</script>";
                
            }else{
                copy($_FILES['flie']['tmp_name'],$archivod);
                move_uploaded_file($_FILES["flie"]["name"], $archivo);
                $sql2="INSERT INTO `contratos` (`id_contrato`, `num_contrato`, `date_start`, `date_end`, `area`, `tipo_contrato`, `third_party`, `contrato`) VALUES (NULL, '$nombre', '$inicio', '$fin', '$area', '$tipocontrato', '$thirdp', '$archivod');";
                mysqli_query($link,$sql2);
                echo "<script language=javaScript>alert('Articulo cargado exitosamente');</script>";
                
            }
            echo $nombre." ".$inicio." ".$fin." ".$area." ".$tipocontrato." ".$thirdp;
        
        echo "<h1 class='center-align #afb42b lime darken-2'>Subiendo contrato</h1>";
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
       <div class="preloader-wrapper big active">
      <div class="spinner-layer spinner-blue">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div><div class="gap-patch">
          <div class="circle"></div>
        </div><div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>

      <div class="spinner-layer spinner-red">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div><div class="gap-patch">
          <div class="circle"></div>
        </div><div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>

      <div class="spinner-layer spinner-yellow">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div><div class="gap-patch">
          <div class="circle"></div>
        </div><div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>

      <div class="spinner-layer spinner-green">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div><div class="gap-patch">
          <div class="circle"></div>
        </div><div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>
    </div>
        </div>
        
    </body>
            <?php
session_start();
$user=$_SESSION['user'];
$sql="SELECT * FROM usuarios WHERE nombre_usuario='$user'";
$resultado = mysqli_query($link,$sql) ;
$row = mysqli_fetch_array($resultado);
if (@!$_SESSION['user']) {
	header("Location:index.php");
}elseif($row['admin']==0){
    echo "<script language=javaScript>alert('Usted no puede entar aqui');</script>";
    header("Location:index.php");
}else{
    header("Refresh: 5; URL=admin.php");
}
        die();
    ?>
  </html>