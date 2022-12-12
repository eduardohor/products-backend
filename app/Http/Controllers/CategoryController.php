<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function store(Request $request){
        return $category = $this->category->create($request->all());
    }

    public function index(){
        return $category = $this->category->all();
    }
}
