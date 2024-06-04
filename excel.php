<?php
header("Content-Type: text/xls");
header("Content-Disposition: attachment; filename = sales.xls");

require_once '_guards.php';
Guard::adminOnly();

$todaySales = Sales::getTodaySales();
$totalSales = Sales::getTotalSales();
$transactions = OrderItem::all();


?>

<table id="transactionsTable">
                        <thead>
                            <tr>
                                <td>Producto</td>
                                <td>Categoria</td>
                                <td>Cantidad</td>
                                <td>Fecha</td>
                                <td>Precio</td>
                                <td>Subtotal</td>
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