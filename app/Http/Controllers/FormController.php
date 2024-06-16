<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    //

    public function show()
    {
        return view('form');
    }
    public function post(Request $request)
    { return back()->withInput(
        $request->only('username')
    );
    }
public function store(Request $request)
{
    dd($request->input('products'));
    $request->input('products.0.name');
}
}