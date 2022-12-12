<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function store(StoreCategoryRequest $request)
    {
        $category = $this->category->create($request->all());
        return response()->json($category, 201);
    }

    public function index()
    {
        $category = $this->category->all();
        return response()->json($category, 200);
    }
}
