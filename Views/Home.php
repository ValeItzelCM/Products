<?php
include("../Includes/Header.php");
include("../Includes/NavBar.php");
include("../Scripts/Alertas.php");

include("../Scripts/OperacionesProductos.php");

if($_SESSION['Bienvenida'] == 1){
    Bienvenida();
    $_SESSION['Bienvenida'] = 0;
}

if(isset($_COOKIE['ResultAddProduct'])){
    ResultadoAgregarProducto();
}
?>

<div class="container">

    <section class="py-3 row">
        <button type="button" class="btn btn-primary col-4" data-bs-toggle="modal" data-bs-target="#ModalProducto">
            Agregar Producto
        </button>
        <div class="col-1"></div>
        <form method="post" class="row col-7">
            <div class="col-2">
                <button name="BuscarProducto" type="submit" class="btn btn-success w-100" data-bs-dismiss="modal">Buscar</button>
            </div>
            <div class="col-10">
                <input name="Codigo" type="text" class="form-control" id="searchProduct" 
                       aria-describedby="emailHelp" placeholder="Consulta un producto por su código de identificación" required>
            </div>
        </form>
    </section>

    <section>
        <table class="table">
            <thead>
                <tr>
                    <th>Código de identificación</th>
                    <th>Nombre del Producto</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if (isset($_POST["BuscarProducto"])) {
                        ObtenerProductoPorCodigo($_POST["Codigo"]);
                    }else{
                        ObtenerProducto();
                    }
                 ?>
            </tbody>
        </table>
    </section>

    <!-- - - - - - - - - - - - - - - - - - - - - - Modal - - - - - - - - - - - - - - - - - - - - - -->
    <div class="modal fade" id="ModalProducto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="post" action="../Controllers/Producto.php" class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Agrega los campos de tu producto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="addProduct" class="form-label">Nombre del Producto</label>
                        <input name="NombreProducto" type="text" class="form-control" id="addProduct" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="Code" class="form-label">Código de identificación</label>
                        <input name="Codigo" type="text" class="form-control" id="Code" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="Brand" class="form-label">Marca</label>
                        <input name="Marca" type="text" class="form-control" id="Brand" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="Model" class="form-label">Modelo</label>
                        <input name="Modelo" type="text" class="form-control" id="Model" aria-describedby="emailHelp" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" name="agregarProducto" class="btn btn-primary">Agregar Producto</button>
                </div>
            </form>
        </div>
    </div>
    <!-- - - - - - - - - - - - - - - - - - - - - - Modal - - - - - - - - - - - - - - - - - - - - - -->

</div>

<?php
include("../Includes/Footer.php");
?>