<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index() {

        $categories = Category::all();
        return view('all.category', compact('categories'));
    }

    public function create() {
        return view('all.createcategory');
    }

    public function store(Request $request) {

        $request->validate([
            'category' => 'required',
            'remarks' => 'required',
        ]);

        Category::create([
            'category' => request('category'),
            'remarks' => request('remarks')
        ]);

        return redirect('/createcategory')->with('Message', 'You Have Been Create Category.');

    }
}
