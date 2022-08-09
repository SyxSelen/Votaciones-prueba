
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="estilos/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body style="min-height: 95vh; background: url(imagenes/img1.jpg); background-size: cover; background-repeat: no-repeat; ">
    <header>
        <h1 class="title_header">SISTEMA DE VOTACION</h1>
    
    </header>
    
    <div class="container">
    <section method_exists="post">
        <button type="button" name="admin" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" >
            Iniciar Sesion
          </button>
    </section>
    </div>
      <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" style="background: transparent; border: none;">
        <!-- <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Inicio de sesion</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div> -->
        <div class="modal-body">
            <form action="" method="post">
                <h2 class="title_login">Login</h2>
                <input type="number"  placeholder="Usuario" name="usuario" required>
                <input type="password"  placeholder="Contraseña" name="clave" required>
                <input type="submit" value="Ingresar" name="boton">
            </form>
        </div>
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> -->
      </div>
    </div>
  </div>
  

    <script>
        window.onload = function(){
          window.location.hash = "no-back-button";
          window.location.hash = "Again-No-back-button";

          window.onhashchange=function(){
            window.location.hash = "no-back-button";
    }
}
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>


<?php
    if(isset($_POST['boton']))
    {
        // recoger los datos
        $usuario=$_POST['usuario'];
        $clave=$_POST['clave'];
        $sql="select * from usuario where usuario=$usuario and clave='$clave'";
        if(include('Administrador/conectar.php'))
        {
            $tabla=mysqli_query($conectar,$sql);
            $fila=mysqli_fetch_array($tabla);
            if($tabla->num_rows==1)
            {
                // crear una session
                session_start();
                $_SESSION['usuario']=$usuario;
                $_SESSION['rol']=$usuario;
                if($fila['rol']==1)
                {
                  header("Location: Administrador/menu_principal.php");
                }
                elseif ($fila['rol']==2) 
                {
                  if($fila['estado']==0)
                  {
                  header("Location: principal.php");
                  }
                  else
                  {
                    print("<script>Swal.fire('Ya usted voto.')</script>");
                  }
                }
            }
            else
            {
                print("<script> Swal.fire({
                    icon: 'error',
                    title: 'Usuario no registrado',
                    text: 'usuario o clave incorrectos.',})
                    </script>");
            }
        }
        else
        {
            print("error al conectar");
        }
    }
?>
<?php
  if (isset($_GET['votar']) && !isset($_POST['boton'])){
    
    print("<script>Swal.fire('voto registrado correctamente.')</script>");

  }
  
?>