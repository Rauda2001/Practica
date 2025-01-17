<?php 

//Guard
require_once '_guards.php';
Guard::guestOnly();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Punto de venta</title>
    <link rel="stylesheet" type="text/css" href="./css/main.css">
    <link rel="stylesheet" type="text/css" href="./css/login.css">
    <link rel="stylesheet" type="text/css" href="./css/util.css">
</head>
<body>


    <div class="login card">

        <div class="card-header">
            <div class="card-title"><h2>Gamero-Tech</h2>  Venta de productos informaticos </div>
        </div>

        <div class="card-content">
            <form method="POST" action="api/login_controller.php">

                <?php displayFlashMessage('login') ?>

                <div class="form-control">
                    <label>Correo</label>
                    <input 
                        type="text" 
                        name="email" 
                        placeholder="Ingrese el correo" 
                        required="true" 
                    />
                </div>

                <div class="form-control mt-16">
                    <label>Contraseña</label>
                    <input 
                        type="password" 
                        name="password" 
                        placeholder="Ingrese la contraseña" 
                        required="true" 
                    />
                </div>

                <div class="mt-16 flex justify-end">
                    <button class="btn btn-primary" type="submit">Ingresar</button>
                </div>

            </form>
        </div>
    </div>


</body>
</html>