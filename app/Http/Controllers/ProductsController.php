<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateRequest;
use App\Models\Products;
use App\services\Products\CreateProductService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use function Termwind\renderUsing;

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
        $crateProduct = new CreateProductService($request);
        if ($crateProduct->save()) {
            return redirect('products');
        }

        return redirect('products.create');
    }

    public function delete($id): RedirectResponse
    {
        $validate = Validator::make(["id" => $id], ['id' => 'required|regex:/[0-9]+$/|digits_between:1,999999999|']);
        if ($validate->fails()) {
            return redirect('products');
        }

        $product = Products::find($id);
        $fileName = $product->image;
        $path = storage_path('app/public/') . $fileName;
        if ($product->delete()) {
            if (File::exists($path)) {
                Storage::disk('public')->delete($fileName);
            }
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

    public function show(): View
    {
        return \view('products.show');
    }

    public function showDetail($id): View
    {
        $validate = Validator::make(["id" => $id], ['id' => 'required|regex:/[0-9]+$/|digits_between:1,999999999']);
        if ($validate->fails()) {
            return redirect('products.show');
        }
        $products = Products::find($id);
        return \view('products.showdetail', ["model" => $products]);
    }

}
