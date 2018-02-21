<?php
namespace App\Repositories;
use App\Product;
interface ProductInterface{
    function getAll();
    function insert(Product $product);
}

?>