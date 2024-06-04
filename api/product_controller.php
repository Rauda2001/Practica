<?php
require_once __DIR__.'/../_init.php';

if (get('action') === 'add') {
    $name = post('name');
    $category_id = post('category_id');
    $quantity = post('quantity');
    $price = post('price');

    try {
        Product::add($name, $category_id, $quantity, $price);
        flashMessage('add_product', 'Producto agregado exitosamente.', FLASH_SUCCESS);
    } catch (Exception $ex) {
        flashMessage('add_product', 'An error occured', FLASH_ERROR);
    }
    redirect('../admin_add_item.php');
}

if (get('action') === 'delete') {
    $id = get('id');

    Product::find($id)?->delete();

    flashMessage('delete_product', 'Producto eliminado exitosamente.', FLASH_SUCCESS);
    redirect('../admin_home.php');
}

if (get('action') === 'update') {
    $product = Guard::hasModel(Product::class);
    $product->name = post('name');
    $product->category_id = post('category_id');
    $product->price = post('price');
    $product->update();

    flashMessage('update_product', 'Producto actualizado exitosamente', FLASH_SUCCESS);
    redirect('../admin_update_item.php?id='.$product->id);
}

if (get('action') === 'add_stock') {
    $product = Guard::hasModel(Product::class);
    $product->quantity += get('quantity');
    $product->update();

    flashMessage('add_stock', "Cantidad de existencias actualizada con éxito", FLASH_SUCCESS);
    redirect('../admin_home.php');
}