<?php
$id = $_GET["id"];
include 'conexion.php';
        try{
                $resultado = $conn->query("SELECT * FROM estudiantes WHERE id=$id");                                
                foreach($resultado as $estudiante){                    
                    $nombres = $estudiante["nombres"];
                    $apellidos = $estudiante["apellidos"];
                    $sexo = $estudiante["sexo"];
                }
        }
        catch (Exception $e){
            echo $e->getMessage();
        }
?>

<form method="post" action="#">
    <input type="text" name="apellidos" placeholder="Ingrese sus apellidos" value="<?=$apellidos?>"><br>   
            <input type="text" name="nombres" placeholder="Ingrese sus nombres" value="<?=$nombres?>"><br>
            <select name="sexo">                
                <option value="M" <?php if($sexo=="M"){ echo "selected";} ?>>Masculino</option>
                <option value="F" <?php if($sexo=="F"){ echo "selected";} ?>>Femenino</option>                        
            </select><br>
            <input type="submit" name="submit" value="Guardar">
</form>

<?php
        if(isset($_POST["submit"])){
                    $nombres = $_POST["nombres"];
                    $apellidos = $_POST["apellidos"];
                    $sexo = $_POST["sexo"];
                    $id = $_GET["id"];
            try{
                $sql="UPDATE estudiantes SET apellidos='$apellidos' , nombres='$nombres', sexo='$sexo' WHERE id=$id";
                $rows = $conn->exec($sql);
                header("location: index.php");
            }catch (Exception $e){
                echo $e->getMessage();
            }
        }