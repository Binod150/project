<?php
namespace App\Repositories;
use App\Category;
class CategoryRepository implements CategoryInterface{
      function getAll(){
          return Category::all();

      }
      public function insert(Category $category){
          return $category->save();
      }
}
?>
