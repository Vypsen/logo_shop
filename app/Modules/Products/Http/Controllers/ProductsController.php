<?php

namespace App\Modules\Products\Http\Controllers;

use App\Modules\Products\Entities\Product;
use App\Modules\Products\Transformers\FullInfoProductResource;
use App\Modules\Products\Transformers\PreviewProductResource;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Responsable;use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Responsable
     */
    public function index()
    {
        $query = Product::query();

        return PreviewProductResource::collection(
            $query->orderBy('products.id')->paginate(10),
        );
    }

    /**
     * Show the specified resource.
     *  @param string $slug
     * @return Responsable
     */

    public function show(Request $request)
    {
        $productSlug = $request['product_slug'];

        $product = Product::query()
            ->where('slug', $productSlug)
            ->first();

        if($product === null){
            abort(404);
        }

        return new FullInfoProductResource(
            $product
        );
    }

}
