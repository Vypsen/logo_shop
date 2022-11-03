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
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $query = Product::query();

        $products = $query->orderBy('products.id')->paginate(10);

        return PreviewProductResource::collection(
            $products
        );
    }

    /**
     * Show the specified resource.
     *  @param string $slug
     * @return FullInfoProductResource
     */

    public function show(string $slug)
    {

        $productQuery = Product::query()
            ->where('slug', $slug)
            ->first();


        if($productQuery === null){
            abort(404);
        }


        return new FullInfoProductResource(
            $productQuery
        );
    }

}
