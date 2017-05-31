<!DOCTYPE html>
<html>
    <head>
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
    require("connection.php");
      $sql="SELECT `id_proveedor`,`prob_nombre`,`id_monedau`,`prob_clabe`,`prob_cuenta`,`prob_sucursal`,`prob_swift`,`prob_abba`,`prob_ref`,`des_moneda` FROM `proveedores` INNER JOIN moneda ON moneda.id_moneda=proveedores.id_monedau";
			  
        $resultado1 = mysqli_query($link,$sql) or die(mysql_error($link));
      ?>
    <body>
      <!--Import jQuery before materialize.js-->
      
      <script type="text/javascript" src="js/materialize.js"></script>
        <script src="js/jquery.js"></script>
        <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
          <form action="analysis.php" method="POST" id="formId"><!--aqui se redigira a un php para validar  la secion de ususario o de administrador -->
      
      <div class="row">
        <div class="input-field col s12">
          <input id="email" name="email" type="email" required>
          <label for="email">Email</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="pass" name="pass" type="password" required>
          <label for="password">Contraseña</label>
        </div>
      </div>
        </form>
    </div>
    <div class="modal-footer">
      <button type="submit" form="formId" class="modal-action modal-close waves-effect waves-green btn-flat">Ingresar</button>
        
    </div>
  </div>
          
        <nav class="#0277bd light-blue darken-3">
              
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">Proveedores</a>
        
      
    </div>
              
  </nav>
          <nav class="#0277bd light-blue darken-3">
              
    <div class="nav-wrapper">
      
        
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="#modal1"><i class="material-icons left">person_pin</i>Iniciar secion</a></li>
      </ul>
    </div>
              
  </nav>
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
        <div class="parallax-container">
      <div class="parallax"><img src="img/carrito.jpg"></div>
    
    <div class="section no-pad-bot">
      <div class="container">
          <h3 class="black-text  center-align white-text">Bienvenido a proveedores </h3>
        <div class="#ffffff white">
            
          
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

            
            
          </tr>
                <?php
				endwhile;
            ?>
             </tbody>
      </table>
          </div>
        </div>
          </div>
        </div>

   <!-- Modal Trigger -->
  

  <!-- Modal Structure -->
  


   <?php
   //     $sql4="SELECT * FROM `footer`";
			  
     //   $resultado4 = mysqli_query($link,$sql4) or die(mysql_error());
    
       // $row4 = mysqli_fetch_array($resultado4);
?>
    

      

     <footer class="page-footer  #0277bd light-blue darken-3">
    <div >
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">MAN Truck & Bus</h5>
          <p class="grey-text text-lighten-4"><?php //echo $row4['des_footer']; ?></p>
            

        </div>
       
        <div class="col l6 s12">
          <h5 class="white-text">Otros sitios</h5>
          <ul>
            <li><a class="white-text" href="http://192.168.2.90/tickets/" target="_blank">Sistema Tickets</a></li>
            <li><a class="white-text" href="http://directorio.mantruckandbus-servicio.com.mx/" target="_blank">Directorio MAN</a></li>
            
          </ul>
        </div>
      </div>
    </div>
      <div class="footer-copyright">
            <div class="container">
                <?php// echo $row4['author']; ?>
                
            <a class="grey-text text-lighten-4 right" href="#!"></a>
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
  
       <script id="source" language="javascript" type="text/javascript">
     $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });
            $(document).ready(function(){
      $('.parallax').parallax();
    });
            </script>

  </body>
</html>