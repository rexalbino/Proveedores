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
 <!DOCTYPE html>
<html>
    <head>
        <title>Proveedores Digitales</title>
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
        
          
        <nav class="#0277bd light-blue darken-3">
              
    <div class="nav-wrapper">
      <a href="admin.php" class="brand-logo">Proveedores digitales</a>
        
      
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
  </ul>
          <div class="fixed-action-btn">
 <a href="#" data-activates="slide-out" class="btn-floating btn-large waves-effect waves-light button-collapse red"><i class="material-icons">menu</i></a>
        </div>
      <div class="parallax-container" style = "height:auto;">
      <div class="parallax"><img src="img/carrito.jpg"></div>
          
 <?php
      $id=$_GET['id'];
      $sql="SELECT `id_proveedor`,`prob_nombre`,`id_monedau`,`prob_clabe`,`prob_cuenta`,`prob_sucursal`,`prob_swift`,`prob_abba`,`prob_ref`,`des_moneda` FROM `proveedores` INNER JOIN moneda ON moneda.id_moneda=proveedores.id_monedau WHERE id_proveedor='$id' ";
			  
        $resultado1 = mysqli_query($link,$sql) or die(mysql_error());
        $row2 = mysqli_fetch_array($resultado1);
            
        $sqlmoneda = "SELECT * FROM moneda";
        $resultadomoneda=mysqli_query($link,$sqlmoneda) or die (mysqli_error($link));
      ?>
        <br>
        <br>
        <div class="container">
            <h2 class="white-text">Ingresar objeto</h2>
            <p class="white-text">Bienvenido <b><?php echo $row['nombre_user'].' '.$row['apellido_p'].' '.$row['apellido_m']  ?></b> al menu para actualizar contrato </p>

        <br>
        <p></p>
          
            <form id="datacontrac" action="updatecontrato.php?id=<?php echo $row2['id_proveedor']?>" method="post" enctype="multipart/form-data">
            <div class="container">
            <div class="row">
                <div class="input-field col s12">
                    <label for="text">Nombre proveedor</label>
                    <br>
                    <input id="nombre" name="nombre" type="text" class="white-text" value="<?php echo $row2['prob_nombre']; ?>" required>
                </div>
            </div>
                
            <div class="row">
                <div class="input-field col s12">
                    <select class="browser-default black-text" name="moneda" id="moneda">
                        <br>
                        <label>Tipo Moneda</label>
                        <option value="<?php echo $row2['id_monedau']; ?>"  selected><?php echo $row2['des_moneda']; ?></option>
                        <?php
			                 while($rowmoney = mysqli_fetch_array($resultadomoneda)):
		                  ?>
                        <option value="<?php echo $rowmoney['id_moneda']; ?>"> <?php echo $rowmoney['des_moneda']; ?></option>
                        <?php
				            endwhile;
                        ?>
                    </select>
                </div>
            </div> 
                <br>
                <br>
                <br>
                <br>
                <br>
            <div class="row">
                <div class="input-field col s12">
                    <br>
                    <label for="tel">Clabe proveedor</label>
                    <input id="clabe" name="clabe" type="text" class="white-text" value="<?php echo $row2['prob_clabe']; ?>" required>
                </div>
            </div>
                
            <div class="row">
                <div class="input-field col s12">
                    <br>
                    <label for="tel">Cuenta Proveedor</label>
                    <input id="cuenta" name="cuenta" type="text" class="white-text" value="<?php echo $row2['prob_cuenta']; ?>" required>
                </div>
            </div>    
                
            <div class="row">
                <div class="input-field col s12">
                    <br>
                    <label for="text">Sucursal proveedor</label>
                    <input id="sucursal" name="sucursal" type="text" class="white-text" value="<?php echo $row2['prob_sucursal']; ?>" required>
                </div>
            </div>  
            <div class="row">
                <div class="input-field col s12">
                    <br>
                    <label for="text">SWFT</label>
                    <input id="swift" name="swift" type="text" class="white-text" value="<?php echo $row2['prob_swift']; ?>" required>
                </div>
            </div> 
            <div class="row">
                <div class="input-field col s12">
                    <br>
                    <label for="text">ABBA</label>
                    <input id="abba" name="abba" type="text" class="white-text" value="<?php echo $row2['prob_abba']; ?>" required>
                </div>
            </div> 
            <div class="row">
                <div class="input-field col s12">
                    <br>
                    <label for="text">Referencia proveedor</label>
                    <input id="referencia" name="referencia" type="text" class="white-text" value="<?php echo $row2['prob_ref']; ?>" required>
                </div>
            </div> 
              </form> 
                <div>
              <button type="submit" form="datacontrac" class="btn waves-effect waves-light">Actualizar</button>  
                </div>
            </div>
            
        </div>

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