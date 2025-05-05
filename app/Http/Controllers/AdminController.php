<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function show($id)
    {
        // Example logic: Pass data to the view
        return view('admin.index');  // You can change this to whatever view you want to show.
    }
}
