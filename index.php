<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="post" action="#">
            <input type="text" name="apellidos" placeholder="Ingrese sus apellidos"><br>   
            <input type="text" name="nombres" placeholder="Ingrese sus nombres"><br>
            <select name="sexo">
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
            </select><br>
            <input type="submit" name="submit" value="Guardar">
        </form><p>
        <?php
        include 'ConexionDB.php';
        $conexionDB = new ConexionDB();
        $conn = $conexionDB->abrirConexion();
        
        if(isset($_POST["submit"])){
                    $nombres = $_POST["nombres"];
                    $apellidos = $_POST["apellidos"];
                    $sexo = $_POST["sexo"];
            try{
                $sql="INSERT INTO estudiantes(codigo, apellidos, nombres, sexo) VALUES(2012454545, '$apellidos','$nombres','$sexo')";
                $rows = $conn->exec($sql);
                $conexionDB->cerrarConexion();
                echo "ok";
            }catch (Exception $e){
                echo $e->getMessage();
            }
        }
        // comentario agregado
        try{
                $resultado = $conn->query("SELECT * FROM estudiantes");                                
                echo "<table border='1'>".
                        "<tr>".
                            "<th>Codigo</th>".
                            "<th>Estudiante</th>".
                            "<th>Sexo</th>".
                            "<th>&nbsp</th>".
                            "<th>&nbsp</th>".
                        "</tr>";
                foreach($resultado as $key=>$estudiante){
                    echo "<tr>".
                            "<td>".$estudiante["codigo"]."</td>".
                            "<td>".$estudiante["apellidos"].", ".$estudiante["nombres"]."</td>".
                            "<td>".$estudiante["sexo"]."</td>".
                            "<td><a href='actualizar.php?id=".$estudiante["id"]."'>Actualizar</a></td>".
                            "<td><a href='eliminar.php?id=".$estudiante["id"]."'>Eliminar</a></td>".
                         "</tr>";
                }
                echo "</table>";
                $conexionDB->cerrarConexion();

        }
        catch (Exception $e){
            echo $e->getMessage();
        }
        ?>
    </body>
</html>
