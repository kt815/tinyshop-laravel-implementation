<?php 
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller {

	public function index()
	{
		$products = Product::orderBy('name', 'asc')->get();
		return view('product.index', compact('products'));
	}

	public function show($id)
	{
		$product = Product::findOrFail($id);
		return view('product.show', compact('product'));
	}

}
