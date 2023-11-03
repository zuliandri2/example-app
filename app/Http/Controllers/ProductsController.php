<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateRequest;
use App\Models\Products;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class ProductsController extends Controller
{

    public function index(): View
    {
        return \view('products.index');
    }

    public function create(): View
    {
        $newid = Products::all()->max("id");
        return \view('products.create', ["newid" => $newid + 1]);
    }

    public function postCreate(ProductCreateRequest $request): RedirectResponse
    {
        $validate = $request->validated();
        return redirect('products');
    }

    public function delete($id): RedirectResponse
    {
        $validate = Validator::make(["id" => $id], ['id' => 'required|regex:/[0-9]+$/|digits_between:1,999999999|']);
        if (!$validate->fails()) {
            return redirect('products');
        }
        return redirect('products');
    }

    public function update($id)
    {
        $validate = Validator::make(["id" => $id], ['id' => 'required|regex:/[0-9]+$/|digits_between:1,999999999|exists:products']);
        if ($validate->fails()) redirect("products");
        $products = Products::find($id);
        return \view('products.update', ["model" => $products]);
    }

}
