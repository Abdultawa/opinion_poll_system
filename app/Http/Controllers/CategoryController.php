<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show()
    {
        return view('admin.category');
    }

    public function store(Category $category)
    {
        request()->validate([
            'category' => 'required',
            'description' => 'required',
        ]);
    
        $category->create([
            'category' => request('category'),
            'description' => request('description'),
        ]);
    
        return back()->with('success', 'Category added successfully!');
    }
}
