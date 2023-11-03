<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class ProductsController extends Controller
{

    public function index(): View
    {
        $g = "";
        return \view('products.index');
    }

}
