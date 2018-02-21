<?php
namespace App\Repositories;


use App\Product;
class ProductRepository implements ProductInterface{
      function getAll(){
          return Product::all();

      }
      public function insert(Product $product){
          return $product->save();
      }
}
?>
