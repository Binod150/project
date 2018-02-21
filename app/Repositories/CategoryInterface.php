<?php
namespace App\Repositories;
use App\Category;
interface CategoryInterface{
    function getAll();
    function insert(Category $category);
}

?>