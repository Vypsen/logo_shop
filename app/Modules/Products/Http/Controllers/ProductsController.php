<?php

namespace App\Modules\Products\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Products\Entities\Product;
use App\Modules\Products\Transformers\FullInfoProductResource;
use App\Modules\Products\Transformers\PreviewProductResource;
use App\OpenApi\Parameters\FiltersParameters;
use App\OpenApi\Parameters\ProductParameters;
use App\OpenApi\Responses\NotFoundResponse;
use App\OpenApi\Responses\Products\FullInfoProductResponse;
use App\OpenApi\Responses\Products\ListProductsResponse;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;

#[OpenApi\PathItem]
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Responsable
     */
    #[OpenApi\Operation(tags: ['Products'])]
    #[OpenApi\Parameters(factory: FiltersParameters::class)]
    #[OpenApi\Response(factory: ListProductsResponse::class, statusCode: 200)]
    #[OpenApi\Response(factory: NotFoundResponse::class, statusCode: 404)]
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
     * @param Request $request
     * @return FullInfoProductResource
     */
    #[OpenApi\Operation(tags: ['Products'])]
    #[OpenApi\Parameters(factory: ProductParameters::class)]
    #[OpenApi\Response(factory: FullInfoProductResponse::class, statusCode: 200)]
    #[OpenApi\Response(factory: NotFoundResponse::class, statusCode: 404)]
    public function show(Request $request)
    {
        $slug = $request['slug'];

        $productQuery = Product::query()
            ->with('category', 'sortedAttributeValues.attribute')
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
