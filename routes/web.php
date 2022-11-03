<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Product;

Route::get('/', function () {
    return view('welcome');
});

Route::get('products', function () {
    $products = Product::orderby('created_at', 'asc')->get();
    return view('products.index', compact('products'));
})->name('products.index');

Route::get('products/create', function(){
    return view('products.create');
})->name('products.create');

Route::post('products', function(Request $request){
    $newProduct = new Product;
    $newProduct->description = $request->input('description');
    $newProduct->price = $request->input('price');
    $newProduct->user_id = $request->input('user_id');
    $newProduct->save();

    return redirect()->route('products.index')->with('info', 'Producto creado exitosamente');
})->name('products.store');