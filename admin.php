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
        
        
        <meta http-equiv="Content-type" content="text/html"; charset="utf-8 "/>
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
      $sql="SELECT `id_proveedor`,`prob_nombre`,`id_monedau`,`prob_clabe`,`prob_cuenta`,`prob_sucursal`,`prob_swift`,`prob_abba`,`prob_ref`,`des_moneda` FROM `proveedores` INNER JOIN moneda ON moneda.id_moneda=proveedores.id_monedau";
			  
        $resultado1 = mysqli_query($link,$sql) or die(mysql_error());
      
      $sqlmoneda = "SELECT * FROM moneda";
        $resultadomoneda=mysqli_query($link,$sqlmoneda) or die (mysqli_error($link));
      ?>
    <body>
      <!--Import jQuery before materialize.js-->
      
      <script type="text/javascript" src="js/materialize.js"></script>
        <script src="js/jquery.js"></script>
        <script type="text/javascript" src="js/init.js"></script>
        <nav class="nav-extended #0277bd light-blue darken-3">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">Proveedores</a>
      
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li class="tab"><a href="admin.php"> </a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li class="tab"><a href="admin.php"> </a></li>
      </ul>
    </div>
    <div class="nav-content">
      <ul class="tabs tabs-transparent">
        <li class="tab"><a href="#des">Actuales</a></li>
        <li class="tab"><a href="#insert">Añadir</a></li>
      </ul>
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
    
        
        <div id="des" class="col s12 m9 l12">
            <nav>
    <div class="nav-wrapper #0277bd light-blue darken-3">
      <form action="showsearchadin.php" method="post">
        <div class="input-field">
          <input id="search" name="search" type="search" required>
          <label for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
    </div>
  </nav>
        <div class="container"> 
            <h3 class="white-text">Bienvenido Administrador</h3>
            <p class="white-text">Hola administrador en este menu puedes ver los contratos que se han ingresado</p>
             <div class="section white">
             <table class="black-text responsive-table" id="tablajson">
        <thead>
          <tr>
              <th data-field="id">Nombre</th>
              <th data-field="name">Moneda</th>
              <th data-field="price">Clabe</th>
              <th data-field="price">Cuenta</th>
              <th data-field="price">Sucursal</th>
              <th data-field="price">Swft</th>
              <th data-field="price">Abba</th>
              <th data-field="price">Referencia</th>
              <th data-field="price">Editar</th>
              <th data-field="price">Eliminar</th>
          </tr>
            
        </thead>

        
            <tbody class="black-text">
            <?php
			while($row = mysqli_fetch_array($resultado1)):
			
		?>
            <tr >
            <td><?php  echo $row['prob_nombre'];?></td>
            <td><?php  echo $row['des_moneda']; ?></td>
            <td><?php  echo $row['prob_clabe']; ?></td>
            <td><?php  echo $row['prob_cuenta']; ?></td>
            <td><?php  echo $row['prob_sucursal']; ?></td>
            <td><?php  echo $row['prob_swift']; ?></td>
            <td><?php  echo $row['prob_abba']; ?></td>
            <td><?php  echo $row['prob_ref']; ?></td>
            <td><?php  echo "<a href=actualizar.php?id={$row['id_proveedor']}><i class='material-icons'>mode_edit</i></a>";?></td>
            <td><?php  echo "<a href=beforeerrase.php?id={$row['id_proveedor']}><i class='material-icons'>delete</i></a>";?></td>
            
            
          </tr>
                <?php
				endwhile;
            ?>
             </tbody>
      </table>
                 
                 </div>
                 <br>
                 <br>
                 <br>
        </div>
        </div>
        <div id="insert" class="col s12 m9 l12">
        <div class="container"> 
            <div class="container">
            <h2 class="white-text">Ingresar objeto</h2>
            <p class="white-text">Bienvenido <b><?php echo $row['nombre_user'].' '.$row['apellido_p'].' '.$row['apellido_m']  ?></b> al menu para actualizar contrato </p>

        <br>
        <p></p>
          
            <form id="datacontrac" action="insert.php" method="post" enctype="multipart/form-data">
            <div class="container">
            <div class="row">
                <div class="input-field col s12">
                    <label for="text">Nombre proveedor</label>
                    <input id="nombre" name="nombre" type="text" class="white-text"  required>
                </div>
            </div>
                
            <div class="row">
                <div class="input-field col s12">
                    <select class="browser-default black-text" name="moneda" id="moneda">
                        <br>
                        <label>Tipo Moneda</label>
                        <option value="" disabled selected>Seleccionar moneda</option>
                        <?php
			                 while($rowmoney = mysqli_fetch_array($resultadomoneda)):
		                  ?>
                        <option value="<?php echo $rowmoney['id_moneda'] ?>"> <?php echo $rowmoney['des_moneda'] ?></option>
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
            <div class="row">
                
                <div class="input-field col s12">
                    <label for="tel">Clabe proveedor</label>      
                    <input id="clabe" name="clabe" type="text" class="white-text"  required>
                        </div>
                
            </div>
                
            <div class="row">
                <div class="input-field col s12">
                    <label for="tel">Cuenta proveedor</label>
                    <input id="cuenta" name="cuenta" type="text" class="white-text"  required>
                </div>
            </div>    
                
            <div class="row">
                <div class="input-field col s12">
                    <label for="text">Sucursal Proveedor</label>
                    <input id="sucursal" name="sucursal" type="text" class="white-text"  required>
                </div>
            </div>  
            <div class="row">
                <div class="input-field col s12">
                    <label for="text">SWFT</label>
                    <input id="swift" name="swift" type="text" class="white-text"  required>
                </div>
            </div> 
            <div class="row">
                <div class="input-field col s12">
                    <label for="text">ABBA</label>
                    <input id="abba" name="abba" type="text" class="white-text"  required>
                </div>
            </div> 
            <div class="row">
                <div class="input-field col s12">
                    <label for="text">Referencia proveedor</label>
                    <input id="referencia" name="referencia" type="text" class="white-text"  required>
                </div>
            </div> 
              </form> 
                <div>
              <button type="submit" form="datacontrac" class="btn waves-effect waves-light">Ingresar</button>  
                </div>
            </div>
            
        </div>

        </div>
        </div>
        </div>
        
        
        

      </body>
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
              <script id="source" language="javascript" type="text/javascript">
               document.querySelector("#search").onkeyup = function(){
        $TableFilter("#tablajson", this.value);
    }
    
    $TableFilter = function(id, value){
        var rows = document.querySelectorAll(id + ' tbody tr');
        
        for(var i = 0; i < rows.length; i++){
            var showRow = false;
            
            var row = rows[i];
            row.style.display = 'none';
            
            for(var x = 0; x < row.childElementCount; x++){
                if(row.children[x].textContent.toLowerCase().indexOf(value.toLowerCase().trim()) > -1){
                    showRow = true;
                    break;
                }
            }
            
            if(showRow){
                row.style.display = null;
            }
        }
    } 


  </script>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
       <script id="source" language="javascript" type="text/javascript">
    $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $(".button-collapse").sideNav();
  });
               $(document).ready(function(){
      $('.parallax').parallax();
    });
            </script>

  </body>
</html>
        