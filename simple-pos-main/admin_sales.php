<?php
//Guard
require_once '_guards.php';
Guard::adminOnly();

$todaySales = Sales::getTodaySales();
$totalSales = Sales::getTotalSales();
$transactions = OrderItem::all();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Point of Sale System :: Sales</title>
    <link rel="stylesheet" type="text/css" href="./css/main.css">
    <link rel="stylesheet" type="text/css" href="./css/admin.css">
    <link rel="stylesheet" type="text/css" href="./css/util.css">
    
    <!-- Datatables  Library -->
    <link rel="stylesheet" type="text/css" href="./css/datatable.css">
    <script src="./js/datatable.js"></script>
    <script src="./js/main.js"></script>

</head>
<body>
    <?php require 'templates/admin_header.php' ?>

    <div class="flex">
        <?php require 'templates/admin_navbar.php' ?>
        <main>

            <div class="flex">
                <div style="flex: 2; padding: 16px;">
                    <div class="subtitle">Informacion de las ventas</div>
                    <hr/>

                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Ventas de hoy</div>
                        </div>
                        <div class="card-content">
                            $<?= $todaySales ?>
                        </div>
                    </div>

                    <div class="card mt-16">
                        <div class="card-header">
                            <div class="card-title">Ventas totales</div>
                        </div>
                        <div class="card-content">
                            $<?= $totalSales ?>
                        </div>
                    </div>

                </div>
                <div style="flex: 5; padding: 16px">
                    <div class="subtitle">Transactions</div>
                    <hr/>

                    <table id="transactionsTable">
                        <thead>
                            <tr>
                                <td>Producto</td>
                                <td>Categoria</td>
                                <td>Cantidad</td>
                                <td>Fecha</td>
                                <td>Precio</td>
                                <td>Total</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($transactions as $transaction) : ?>
                                <tr>
                                    <td><?= $transaction->product_name ?></td>
                                    <td><?= $transaction->product_category ?></td>
                                    <td><?= $transaction->quantity ?></td>
                                    <td><?= $transaction->purchase_date ?></td>
                                    <td><?= $transaction->price ?></td>
                                    <td><?= $transaction->quantity * $transaction->price ?></td>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    
                    <a href="excel.php" class="btn">Exportar a excel</a>
                    
                    

                </div>
            </div>

        </main>
    </div>

<script type="text/javascript">
var dataTable = new simpleDatatables.DataTable("#transactionsTable")
</script>

</body>
</html>