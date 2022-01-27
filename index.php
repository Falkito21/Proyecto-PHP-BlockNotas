<?php include("db.php"); ?>
<?php include("includes/header.php"); ?>

<div class="container p-4">

    <div class="row">

        <div class="col-md-4">

            <?php 

            // SI ME LLEGA EL VALOR DE mensaje por $_SESSION...
            if(isset($_SESSION['mensaje'])){ ?>

                <!-- PINTO EL MESAJE DE ALERTA CO EL COLOR QUE LE INDICO EN tipo_mensaje -->
                <div class="alert alert-<?= $_SESSION['tipo_mensaje']?> alert-dismissible fade show" role="alert">

                    <!-- IMPRIME EL MESAJE QUE GUARDE EN mensaje -->
                    <?= $_SESSION['mensaje']?>
                    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            
                <!-- BORRO/ELIMINO LA SESSION INICIADA PARA QUE EL MENSAJE NO SE MUEESTRE TODO EL TIEMPO -->
           <?php session_unset(); }
            ?>

            <div class="card card-body">
                <form action="guardar_tarea.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="titulo" class="form-control" placeholder="Task Title" autofocus>
                    </div>
                    <div class="form-group">
                        <textarea name="descripcion"  rows="2" class="form-control" placeholder="Descripcion"></textarea>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="guardar_tarea" value="GUARDAR TAREA">
                </form>
            </div>
        </div>
        <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Descripcion</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 

                            // GUARDO EN $consulta LA CONSULTA QUE LE HAGO A LA BASE DE DATOS 
                            $consulta = "SELECT * FROM tareas";

                            // GUARDO EN $resultado_tareas EL ENVIO DE DATOS A LA BASE DE DATOS 
                            $resultado_tareas = mysqli_query($conect ,$consulta);

                            // MIETRAS TENGA DATOS: RECORRE LA LISTA DE LA BASE DE DATOS
                            while ($row = mysqli_fetch_array($resultado_tareas)) { ?>
                                <tr>
                                    <!-- IMPRIMO LOS DATOS DE titulo, descripcion y fecha  -->
                                    <td><?php echo $row['titulo']?></td>
                                    <td><?php echo $row['descripcion']?></td>
                                    <td><?php echo $row['fecha_creacion']?></td>
                                    <td>
                                        <!-- GUARDO EN id= EL VALOR DEL ID QUE RECOJE DE LA BASE DE DATOS-->
                                        <a href="editar.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                            <i class="fas fa-marker"></i>
                                        </a>
                                        <!-- GUARDO EN id= EL VALOR DEL ID QUE RECOJE DE LA BASE DE DATOS-->
                                        <a href="eliminar_tarea.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>


                            <?php }

                        ?>
                    </tbody>
                </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>