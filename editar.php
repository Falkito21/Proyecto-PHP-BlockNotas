<?php
    
    // CONECTO A LA BASE DE DATOS
    include("db.php");
    
    // SI RESIVO POR GET EL id...
    if (isset($_GET['id'])) {
        
        //GUARDO EN $id EL VALOR QUE VIENE POR GET 
        $id = $_GET['id'];

        // GUARDO EN $consulta LA CONSULTA QUE LE HAGO A LA BASE DE DATOS 
        $consulta = "SELECT * FROM tareas WHERE id = $id";

        // GUARDO EN $resultado EL ENVIO DE DATOS A LA BASE DE DATOS 
        $resultado = mysqli_query($conect, $consulta);
        if (mysqli_num_rows($resultado) == 1) {
            $row = mysqli_fetch_array($resultado);
            $titulo = $row['titulo'];
            $descripcion = $row['descripcion'];
        }
    }

    if (isset($_POST['actualizar'])){
        $id = $_GET['id'];
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];

        $consulta = "UPDATE tareas set titulo = '$titulo', descripcion = '$descripcion' WHERE id = $id;";
        mysqli_query($conect, $consulta);

        $_SESSION['mensaje'] = 'Tarea actualizada correctamente';
        $_SESSION['tipo_mensaje'] = 'warning';
        header("Location: index.php");
    }
?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="titulo" value="<?php echo $titulo; ?>" class="form-control" placeholder="Actualiza el titulo">
                    </div>
                    <div class="form-group">
                        <textarea name="descripcion" rows="2" class="form-control" placeholder="Actualiza la descipcion"><?php echo $descripcion; ?> </textarea>
                    </div>
                    <button class="btn btn-success" name="actualizar">
                        Actualizar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>