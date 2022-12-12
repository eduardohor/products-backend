<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    private $product;
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function store(StoreUpdateProductRequest $request)
    {
        $data = $request->all();
        $data['amount'] = str_replace(',', '.', $data['amount']);
        $product = $this->product->create($data);

        return response()->json($product, 201);
    }

    public function index()
    {
        $products = $this->product->all();
        return response()->json($products, 200);
    }

    public function show($id)
    {
        $product = $this->product->find($id);
        if ($product == null) {
            return response()->json(['erro' => 'Recurso solicitado não existe'], '404');
        }

        return response()->json($product, 200);
    }

    public function update(StoreUpdateProductRequest $request, $id)
    {
        $product = $this->product->find($id);
        if ($product == null) {
            return response()->json(['erro' => 'Impossível realizar a atualização. O recurso solicitado não existe'], '404');
        }

        $data = $request->all();

        $product->update($data);

        return response()->json($product, 200);
    }

    public function destroy($id)
    {
        $product = $this->product->find($id);

        if ($product == null) {
            return response()->json(['erro' => 'Impossível realizar a exclusão. O recurso solicitado não existe'], '404');
        }

        $product->delete();
        return response()->json(['message: ' => 'Removido com sucesso!'], 200);
    }
}
