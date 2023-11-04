<?php

namespace App\services\Products;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Storage;

class CreateProductService
{

    /**
     * @var Products
     */
    public $product;

    /**
     * @var Request
     */
    public $request;

    public function __construct(Request $request)
    {
        $this->product = new Products();
        $this->request = $request;
    }

    public function save(): bool
    {
        $this->product->fill($this->request->validated());
        $result = $this->product->save();
        if ($result) {
            $this->request->storeFile();
        }

        return $result;
    }

}
