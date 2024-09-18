<?php

function Bienvenida()
{
    echo '
            <div class="alert alert-success alert-dismissible" role="alert">
                <div>¡Bienvenid@: ' .$_SESSION['usuario']. '!</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
}

function ErrorCredenciales()
{
    if(isset($_COOKIE['UserError'])){
        echo '
            <div class="alert alert-'.$_COOKIE['UserError'].' alert-dismissible" role="alert">
                <div>¡Credenciales incorrectas!</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
    }

    setcookie("UserError", '', time() - 3600, '/'); // Expirarla en el pasado
}
