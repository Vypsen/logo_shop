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
     * @return \Illuminate\Http\JsonResponse
     */

    public function show(Request $request)
    {
        $productSlug = $request['product_slug'];

        $productQuery = Product::query()
            ->where('slug', $productSlug)
            ->first();


        if($productQuery === null){
            abort(404);
        }

        $product = Product::createResponse($productQuery);

        return response()->json([
            'data' => $product,
        ]);

    }

}
