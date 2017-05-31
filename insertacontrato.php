 <!DOCTYPE html>
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
 <!DOCTYPE html>
<html>
    <head>
        <title>Contratos</title>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="shortcut icon" href="img/man.ico" type="image/x-icon" > 
    </head>

    <body>
      <!--Import jQuery before materialize.js-->
      
      <script type="text/javascript" src="js/materialize.js"></script>
        <script src="js/jquery.js"></script>
        
          
        <nav class="#263238 blue-grey darken-4">
              
    <div class="nav-wrapper">
      <a href="admin.php" class="brand-logo">Contratos digitales</a>
        
      
    </div>
              
  </nav>
    <ul id="slide-out" class="side-nav">
    <li><div class="userView">
      <div class="background">
        <img src="img/realback.jpg">
      </div>
      <a href="#!user"><img class="circle" src="img/user.png"></a>
      <a href="#!name"><span class="white-text name"><?php echo $row['nombre_usuario'].' '.$row['apellido_p'].' '.$row['apellido_m']  ?></span></a>
      <a href="#!email"><span class="white-text email"><?php echo $row['correo'] ?></span></a>
    </div></li>
    <li><a href="insertacontrato.php"><i class="material-icons left">open_in_browser</i>insertar contrato</a></li>
    <li><a href="check.php"><i class="material-icons left">email</i>Checar contratos</a></li>
    <li><div class="divider"></div></li>
    <li><a href="showusers.php"><i class="material-icons left">recent_actors</i>mostrar ususarios</a></li>
    <li><a href="addnewuser.php"><i class="material-icons left">assignment_ind</i>Crear nuevo usuario</a></li>
    <li><div class="divider"></div></li>
    <li><a href="close.php"><i class="material-icons left">person_pin</i>Cerrar sesion</a></li>
  </ul>
          <div class="fixed-action-btn">
 <a href="#" data-activates="slide-out" class="btn-floating btn-large waves-effect waves-light button-collapse red"><i class="material-icons">menu</i></a>
        </div>
      
          
 <?php
      require("connection.php");
      ?>
        <br>
        <br>
        <div class="container">
            <h2>Ingresar objeto</h2>
            <p>Bienvenido <b><?php echo $row['nombre_usuario'].' '.$row['apellido_p'].' '.$row['apellido_m']  ?></b> al menu para insertar contrato </p>
        <br>
        <p></p>
          
            <form id="datacontrac" action="altacontrato.php" method="post" enctype="multipart/form-data">
            <div class="container">
            <div class="row">
                <div class="input-field col s12">
                    <label for="text">Numero de contrato</label>
                    <input id="nombre" name="nombre" type="text" class="black-text" required>
                </div>
            </div>
                
            <div class="row">
                <div class="input-field col s12">
                    <label for="email">Fecha de inicio</label>
                    <br>
                    <input id="lastca" name="inicio" type="date"  required>
                </div>
            </div> 
                
            <div class="row">
                <div class="input-field col s12">
                    <label for="email">Fecha de fin</label>
                    <br>
                    <input id="lastca" name="fin" type="date"  required>
                </div>
            </div> 
                
            <div class="row">
                <div class="input-field col s12">
                    <label for="tel">Area</label>
                    <input id="status" name="area" type="text" class="black-text" required>
                </div>
            </div>    
                
            <div class="row">
                <div class="input-field col s12">
                    <label for="text">Tipo de contrato</label>
                    <input id="nombre" name="contratype" type="text" class="black-text" required>
                </div>
            </div>  
            <div class="row">
                <div class="input-field col s12">
                    <label for="text">Tercero del contrato</label>
                    <input id="nombre" name="tparty" type="text" class="black-text" required>
                </div>
            </div> 
            <div class="row">
                <div class="input-field col s12">
                    <label for="email">Contrato en PDF</label>
                    <br>
                    <br>
                    <input id="flie" name="flie" type="file" class="black-text" required>
                </div>
            </div>
              </form> 
                <div>
              <button type="submit" form="datacontrac" class="btn waves-effect waves-light">Ingresar</button>  
                </div>
            </div>
            
        </div>


  
    

      

   <footer class="page-footer teal">
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
    $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
    $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $(".button-collapse").sideNav();
  });
            </script>

  </body>
</html>