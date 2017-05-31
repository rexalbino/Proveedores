 <!DOCTYPE html>
<?php
require("connection.php");

session_start();
$user=$_SESSION['user'];
$sql="SELECT status from usuario WHERE Nombre='$user'";
$resultado = mysqli_query($link,$sql) or die(mysql_error());
$row = mysqli_fetch_array($resultado);
if (@!$_SESSION['user']) {
	header("Location:login.php");
}elseif($row['status']==0){
    echo "<script language=javaScript>alert('Usted no puede entar aqui');</script>";
    header("Location:login.php");
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
      
    <body>
      <!--Import jQuery before materialize.js-->
      
      <script type="text/javascript" src="js/materialize.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>
        <nav class="#263238 blue-grey darken-4">
              
    <div class="nav-wrapper">
      <a href="admin.php" class="brand-logo">Bitacora digital</a>
        
      
    </div>
              
  </nav>
          <nav class="#263238 blue-grey darken-4">
              
    <div class="nav-wrapper">
      
        
      <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="newuser.php"><i class="material-icons left">assignment_ind</i>Crear nuevo usuario</a></li>
        <li><a href="insertarticulo.php"><i class="material-icons left">commentt</i>insertar producto</a></li>
        <li><a href="close.php"><i class="material-icons left">person_pin</i>Cerrar sesion</a></li>
      </ul>
    </div>
              
  </nav>
        
        <!--
         <div class="carousel">
    
    <a class="carousel-item" href="#two!"><img src="IMG/Desert.jpg"></a>
    <a class="carousel-item" href="#two!"><img src="IMG/Chrysanthemum.jpg"></a>
    <a class="carousel-item" href="#two!"><img src="IMG/Hydrangeas.jpg"></a>
    <a class="carousel-item" href="#two!"><img src="IMG/Tulips.jpg"></a>
  </div>
        </div>
        <div align="center">
     <img class="responsive-img"  src="IMG/eabcf2439373ba0cc98247bc12a266a2.jpg" height="" width="600" >     
          -->
        <?php
      require("connection.php");
        
        $sql="SELECT * FROM `usuario`";
			  
        $resultado = mysqli_query($link,$sql) or die(mysql_error());
        
      ?>
        <br>
        <br>
        <h2>Bienvenido a usuarios</h2>
        <div class="container">
        <br>
        <p></p>
            <table class="responsive-table bordered">
        <thead>
          <tr class="black-text">
              
              <th data-field="id">Usuario</th>
              <th data-field="name">Correo</th>
              <th data-field="cel">Estatus</th>
              <th data-field="cel">Actualizar</th>
              <th data-field="cel">Eliminar</th>
              
              
          </tr>
        </thead>

        <tbody class="black-text">
            <?php
			while($row = mysqli_fetch_array($resultado)):
			
		?>
          <tr>
            <td><?php  echo $row['Nombre']?></td>
            <td><?php  echo $row['email']; ?></td>
            <td><?php  if($row['status']==1){
                            echo 'administrador';
                        }else{
                            echo 'usuario';
                        } ?></td>
            <td><?php  echo "<a href=actualizaruser.php?id={$row['id_usuario']}><i class='material-icons'>mode_edit</i></a>";?></td>
            <td><?php  echo "<a href=beforeeliuser.php?id={$row['id_usuario']}><i class='material-icons'>delete</i></a>";?></td>
            
            
            
            
          </tr>
          <?php
				endwhile;
            ?>
        </tbody>
      </table>
        </div>
    </body>
              <footer class="page-footer,#263238 blue-grey darken-4">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Footer Content</h5>
                <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2014 Copyright Text
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
          </div>
        </footer>
            
  </html>
        