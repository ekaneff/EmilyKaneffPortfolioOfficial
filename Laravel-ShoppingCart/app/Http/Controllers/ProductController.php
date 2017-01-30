<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
 	public function getIndex() {
 		$products = Products::all();
 		// $total = 0;

 		// foreach($products as $product) {
 		// 	$total += $product['attributes']['price'];
 		// 	//dd($product['attributes']['price']);
 		// }

 		return view('shop.index', ['products' => $products]);
 	}   
}
