<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Votacion</title>
    <link rel="stylesheet" href="agendar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

      <?php
        include('menu2.php');
      ?>

<main class="contenedor"  >
    <form action="" method="post">
        <h2>Registrar agenda de votacion</h2>
        <br>
        <div class="row">
            <div class="col">
                <label for="" class="form-label">Fecha de inicio de la votacion</label>
                <input type="date" class="form-control" name="fi" required>
            </div>
            <div class="col">
                <label for="" class="form-label">Fecha final de la votacion</label>
                <input type="date" class="form-control" name="ff" required>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="" class="form-label">Hora de inicio de la votacion</label>
                <input type="time" class="form-control" name="hi" required>
            </div>
            <div class="col">
                <label for="" class="form-label">Hora final de la votacion</label>
                <input type="time" class="form-control" name="hf" required>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <textarea name="descripcion" id="descripcion" cols="30" rows="10" class="form-control" placeholder="Descripcion de la votacion" style="height:100px;" required></textarea>
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
        $descripcion=$_POST['descripcion'];
        $fi=$_POST['fi'];
        $ff=$_POST['ff'];
        $hi=$_POST['hi'];
        $hf=$_POST['hf'];

        $sql="insert into agendar_votaciones value('$descripcion','$fi','$ff','$hi','$hf')";
        if(include('conectar.php'))
        {
            if(mysqli_query($conectar,$sql))
            {
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