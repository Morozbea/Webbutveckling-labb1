<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{

  public function index(){
    $product = json_decode(file_get_contents('../resources/produkter.json'));
    return response()->json($product);
  }

  public function show($id) {
    $product = json_decode(file_get_contents('../resources/produkter.json'));

    foreach ($product->products as $product) {
      if ($id == $product->id) {
        return response()->json($product);
      }
    }

    return "No products found";
  }

  public function create(Request $request){

      $id = $request->input("id");
      $title = $request->input("title");
      $price = $request->input("price");


      if ($id == NULL or $title == NULL or $price == NULL) {
        return "Missing id, title or price";
      }

      $product = json_decode(file_get_contents('../resources/movies.json'), true);

      $products = [];
      $product["title"] = $title;
      $product["genre"] = $genre;
      $product["price"] = $price;

      $product["products"][] = $movie;

      file_put_contents('../resources/produkter.json', json_encode($product));

      return "Product saved";
  }

}
