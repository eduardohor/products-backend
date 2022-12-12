<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product;
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function store(Request $request){
        $data = $request->all();
        $data['amount'] = str_replace(',', '.', $data['amount']);
        
       return $product = $this->product->create($data);
       
    }

    public function index(){
        return $products = $this->product->all();
    }

    public function show($id){
        return $product = $this->product->find($id);
    }

    public function update(Request $request, $id){
        $product = $this->product->find($id);
        $data = $request->all();
        
        $product->update($data);

        return $product;
    }

    public function destroy($id){
        $product = $this->product->find($id);
        $product->delete();


    }
}
