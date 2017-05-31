<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>contratos</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
    <body>
        <?php
		session_start();
			require("connection.php");
            

            $user=$_POST['email'];
            $pass=$_POST['pass'];
        
            $sql="SELECT * FROM `usuario` WHERE `correo`='$user' AND `password`='$pass'";
        
            $resultado = mysqli_query($link,$sql) or die(mysql_error());
            $row = mysqli_fetch_array($resultado);
            
                
            if($row['roll'] == 1)
                {
                    $_SESSION['user']=$row['nombre_user'];
                    $_SESSION['pass']=$row['password'];
                    $_SESSION['id']=$row['id_usuario'];
                    
				    echo "<script language=javaScript>window.location='admin.php'</script>";
			        
                }
            elseif($row['roll'] == 0){
                    $_SESSION['user']=$row['nombre_user'];
                    $_SESSION['pass']=$row['password'];
                    $_SESSION['id']=$row['id_usuario'];
                   
                    echo "<script language=javaScript>window.location='index.php'</script>";
            }else{
                echo "<script language=javaScript>alert('Usuario no valido!');</script>";
                echo "<script language=javaScript>window.location='index.php'</script>";
            }
        ?>
    </body>
</html>