<?php

namespace App\Modules\Products\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Products\Entities\Product;
use App\Modules\Products\Http\Requests\CatalogRequest;
use App\Modules\Products\Transformers\CategoryResource;
use App\Modules\Products\Transformers\FullInfoProductResource;
use App\Modules\Products\Transformers\PreviewProductResource;
use App\OpenApi\Parameters\Products\FiltersParameters;
use App\OpenApi\Parameters\Products\ProductParameters;
use App\OpenApi\RequestBodies\CatalogRequestBody;
use App\OpenApi\Responses\NotFoundResponse;
use App\OpenApi\Responses\Products\FullInfoProductResponse;
use App\OpenApi\Responses\Products\ListProductsResponse;
use Illuminate\Http\Request;
use Throwable;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;

#[OpenApi\PathItem]
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return PreviewProductResource|\Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    #[OpenApi\Operation(tags: ['Products'])]
    #[OpenApi\RequestBody(factory: CatalogRequestBody::class)]
    #[OpenApi\Response(factory: ListProductsResponse::class, statusCode: 200)]
    #[OpenApi\Response(factory: NotFoundResponse::class, statusCode: 404)]
    public function index(CatalogRequest $request)
    {
        $requestData = $request->validated();

        try {
            $data = Product::findProducts($requestData);
        } catch (Throwable $e) {
            abort(422, $e->getMessage());
        }

        return PreviewProductResource::collection(
            $data['product_query']->orderBy('products.id')->paginate(10)->appends([
                'category_name' => $data['key_params']['category_name'],
                'article_query' => $data['key_params']['article_query'],
                'search_query' => $data['key_params']['search_query'],
                'filters' => $data['key_params']['filters'],
                'sort_mode' => $data['key_params']['sort_mode']
            ])
        )->additional([
            'countProducts' => $data['countProducts'],
            'filters' => $data['filters'],
            'category' => CategoryResource::collection($data['category'])
        ]);
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
