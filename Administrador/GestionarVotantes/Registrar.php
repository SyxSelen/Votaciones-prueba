<?php
   session_start();
   if(isset($_SESSION['usuario']))
    {
        // recuperando la session
        $usuario=$_SESSION['usuario'];
        // print("Bienvenido: ".$usuario[1]." ".$usuario[2]);
    }
    else
    {
        // redireccionar para el login
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    <link rel="stylesheet" href="styleRe.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

      <?php
        include('../menu.php');
      ?>

<main class="contenedor"  style="background: url(../imagenes/img1.jpg); background-repeat:no-repeat; background-size: cover;" >
    <form action="" method="post">
        <h2>Registro de votantes</h2>
        <div class="row">
            <div class="col">
            <select name="td" id="td" class="form-control" required>
                    <option value="0" disabled selected hidden>Tipo de documento</option>
                    <?php
                    if(include('../conectar.php'))
                    {
                        $sql="select * from tipo_documento";
                        $tabla=mysqli_query($conectar,$sql);
                        while($fila=mysqli_fetch_array($tabla))
                        {
                            print("<option value='$fila[0]'>");
                            print($fila[1]);
                            print("</option>");
                        }
                    }
                    else
                    {
                        print("error al conectarse a la base de datos");
                    }
                ?>
                </select>
            </div>
            <div class="col">
                <input type="number" class="form-control" name="nd" placeholder="Numero de documento" requerid>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <input type="text" class="form-control" name="nombres" placeholder="Nombres" required>
            </div>
            <div class="col">
                <input type="text" class="form-control" name="apellidos" placeholder="Apellidos" required>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <select name="formacion" id="formacion" class="form-control" required>
                <option value="0" disabled selected hidden>Formacion</option>
                <?php
                    if(include('../conectar.php'))
                    {
                        $sql="select * from formacion";
                        $tabla=mysqli_query($conectar,$sql);
                        while($fila=mysqli_fetch_array($tabla))
                        {
                            print("<option value='$fila[0]'>");
                            print($fila[1]);
                            print("</option>");
                        }
                    }
                    else
                    {
                        print("error al conectarse a la base de datos");
                    }
                ?>
                </select>
            </div>
            <div class="col">
                <select name="sede" id="sede" class="form-control" required>
                <option value="0" disabled selected hidden>Sede</option>
                <?php
                    if(include('../conectar.php'))
                    {
                        $sql="select * from sede";
                        $tabla=mysqli_query($conectar,$sql);
                        while($fila=mysqli_fetch_array($tabla))
                        {
                            print("<option value='$fila[0]'>");
                            print($fila[1]);
                            print("</option>");
                        }
                    }
                    else
                    {
                        print("error al conectarse a la base de datos");
                    }
                ?>
                </select>
            </div>
        </div>
        <div class="row">
                
                    <br>
                <div class="col button"><button class="btn btn-primary" type="submit" name="boton">Guardar</button></div>
             
            </div>
   
    </form>
    </main>
    <footer >
            <div >
                <p>© Copyright 2022 - SENA</p>
                <p>PROGRAMMERS - Ronald Millan e Isaac Canchano</p>
            </div>
        </footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>

<?php
    if(isset($_POST['boton']))
    {
        $nd=$_POST['nd'];
        $td=$_POST['td'];
        $nombres=$_POST['nombres'];
        $apellidos=$_POST['apellidos'];
        $formacion=$_POST['formacion'];
        $sede=$_POST['sede'];

        $sql="insert into gestionar_votantes value($nd,$td,'$nombres','$apellidos',$formacion,$sede)";
        if(include('../conectar.php'))
        {
            if(mysqli_query($conectar,$sql))
            {
                $sql="insert into usuario value($nd,'$nd','$nombres $apellidos',2,0)";
                mysqli_query($conectar,$sql);
                print("<script>Swal.fire('Registro guardado correctamente')</script>");
            }
            else
            {
                print("<script>Swal.fire('Error al guardar los datos')</script>");
            }
        }
    else
    {
        print("error al conectar");
    }
    }
?>