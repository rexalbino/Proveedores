<?php
require("connection.php");

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
}

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
		
            $id=$_GET['id'];
        
        $sql2="DELETE FROM `usuarios` WHERE `usuarios`.`id_usuario` = $id";
                $resultado1 = mysqli_query($link,$sql2);
        
        echo "<script>location.href='admin.php'</script>";
        ?>
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
            
  </html>