<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de votantes</title>
    <link rel="stylesheet" href="listar2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<?php
        include('../menu.php');
      ?>
    <main class="contenedor" style="background: url(../imagenes/img1.jpg); background-repeat:no-repeat; background-size: cover;">
    <div class="cont">
        <table>
            <caption>Listado de Votantes</caption>
            <thead>
                <tr>
                    <th>Numero de documento</th>
                    <th>Tipo de documento</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Formacion</th>
                    <th>Sede</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <?php
                $sql="SELECT gestionar_votantes.numero_documento,tipo_documento.nombre,gestionar_votantes.nombres,gestionar_votantes.apellidos,
                formacion.nombre,sede.nombre from gestionar_votantes,tipo_documento,formacion,sede
                where gestionar_votantes.cod_tipo_documento=tipo_documento.codigo and gestionar_votantes.cod_formacion=formacion.codigo 
                and gestionar_votantes.cod_sede=sede.codigo";
                if($conectar=mysqli_connect("localhost","root","","dbvotaciones")) 
                {
                    // consulta la tabla
                    $tabla=mysqli_query($conectar,$sql);
                    while($fila=mysqli_fetch_array($tabla))
                    {
                        print("<tbody>");
                        print("<tr>");
                        print("<td data-label='Numero de documento'>$fila[0]</td>");
                        print("<td data-label='Tipo de documento'>$fila[1]</td>");
                        print("<td data-label='Nombres'>$fila[2]</td>");
                        print("<td data-label='Apellidos'>$fila[3]</td>");
                        print("<td data-label='Formacion'>$fila[4]</td>");
                        print("<td data-label='Sede'>$fila[5]</td>");
                        if($fila[6]==1){
                            print("<td data-label='Estado'>Ya voto</td>");
                        }
                        else{
                            print("<td data-label='Estado'>No ha votado</td>");
                        }
                        print("</tr>");
                        print("</tbody>");
                    }
                }
                else
                {
                    print("error al conectar");
                }
            ?> 
           
        </table>
    </div>
    </main>
    <footer id="contacto">
            <div>
                <p>© Copyright 2022 - SENA</p>
                <p>PROGRAMMERS - Ronald Millan e Isaac Canchano</p>
            </div>
        </footer>






      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>