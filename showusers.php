 <!DOCTYPE html>
<?php
require("connection.php");

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
}
?>
  <html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title>Proveedores</title>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="shortcut icon" href="img/man.ico" type="image/x-icon" > 
    </head>
      <?php
      $sql="SELECT * FROM `usuario` ";
			  
        $resultado1 = mysqli_query($link,$sql) or die(mysqli_error($link));
      
      
      ?>
    <body>
      <!--Import jQuery before materialize.js-->
      
      <script type="text/javascript" src="js/materialize.js"></script>
        <script src="js/jquery.js"></script>
        <script type="text/javascript" src="js/init.js"></script>
        <nav class="#263238 #0277bd light-blue darken-3">
              
    <div class="nav-wrapper">
      <a href="admin.php" class="brand-logo">Proveedores</a>
        
      
    </div>
              
  </nav>
        <ul id="slide-out" class="side-nav">
    <li><div class="userView">
      <div class="background">
        <img src="img/realback.jpg">
      </div>
      <a href="#!user"><img class="circle" src="img/user.png"></a>
      <a href="#!name"><span class="white-text name"><?php echo $row['nombre_user'].' '.$row['apellido_p'].' '.$row['apellido_m']  ?></span></a>
      <a href="#!email"><span class="white-text email"><?php echo $row['correo'] ?></span></a>
    </div></li>
    <li><a href="showusers.php"><i class="material-icons left">recent_actors</i>Mostrar ususarios</a></li>
    <li><a href="addnewuser.php"><i class="material-icons left">assignment_ind</i>Crear nuevo usuario</a></li>
    <li><div class="divider"></div></li>
    <li><a href="moneda.php"><i class="material-icons left">credit_card</i>Tipo Moneda</a></li>
    <li><div class="divider"></div></li>
    <li><a href="close.php"><i class="material-icons left">person_pin</i>Cerrar sesion</a></li>
  </ul>
          <div class="fixed-action-btn">
 <a href="#" data-activates="slide-out" class="btn-floating btn-large waves-effect waves-light button-collapse red"><i class="material-icons">menu</i></a>
        </div>
  
    
    <div class="parallax-container" style = "height:auto;">
      <div class="parallax"><img src="img/carrito.jpg"></div>
        <div class="container"> 
            <h3 class="white-text">Bienvenido Administrador</h3>
            <div class="section white">
             <table class="black-text responsive-table">
        <thead>
          <tr>
              <th data-field="id">Nombre</th>
              <th data-field="name">Correo</th>
              <th data-field="price">administrador</th>
              <th data-field="price">Editar</th>
              <th data-field="price">Eliminar</th>
          </tr>
            
        </thead>

        
            <tbody class="black-text">
            <?php
			while($row2 = mysqli_fetch_array($resultado1)):
			
		?>
            <tr >
            <td><?php  echo $row2['nombre_user'].' '.$row2['apellido_p'].' '.$row2['apellido_m']?></td>
            <td><?php  echo $row2['correo']; ?></td>
                <?php if($row2['roll']==1){ ?>
                    <td><?php  echo 'Administrador' ?></td>
                <?php }else{?>
                    <td><?php  echo 'Usuario' ?></td>
                <?php } ?>
            <td><?php  echo "<a href=actualizaruser.php?id={$row2['id_usuario']}><i class='material-icons'>mode_edit</i></a>";?></td>
            <td><?php  echo "<a href=beforeerraseuser.php?id={$row2['id_usuario']}><i class='material-icons'>delete</i></a>";?></td>
            
            
          </tr>
                <?php
				endwhile;
            ?>
             </tbody>
      </table>
            </div>  
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        </div>
 
              <footer class="page-footer #0277bd light-blue darken-3">
    <div >
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Company Bio</h5>
          <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Settings</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Ver 0.0.1 Beta  <i class="material-icons">stars</i> Designed by Abraham Duarte
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
       <script id="source" language="javascript" type="text/javascript">
    $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $(".button-collapse").sideNav();
  });
            </script>

  </body>
</html>
        