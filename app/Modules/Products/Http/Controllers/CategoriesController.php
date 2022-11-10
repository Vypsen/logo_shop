<?php

namespace App\Modules\Products\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Modules\Products\Entities\ProductCategory;
use App\Modules\Products\Transformers\CategoryResource;
use App\OpenApi\Parameters\CategoryParameters;
use App\OpenApi\Responses\ListCategoriesResponse;
use App\OpenApi\Responses\NotFoundResponse;
use App\OpenApi\Responses\SingleCategoryResponse;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;

#[OpenApi\PathItem]
class CategoriesController extends Controller
{

    /**
     * Display categories.
     *
     * @return Responsable
     *
     */
    #[OpenApi\Operation(tags: ['Categories'], method: 'GET')]
    #[OpenApi\Response(factory: ListCategoriesResponse::class, statusCode: 200)]
    #[OpenApi\Response(factory: NotFoundResponse::class, statusCode: 404)]
    public function index(){
        return CategoryResource::collection(
            ProductCategory::all()
        );
    }


    /**
     * Display Categories through slug.
     *
     * @param string $slug
     * @return Responsable
     */
    #[OpenApi\Operation(tags: ['Categories'], method: 'GET')]
    #[OpenApi\Parameters(factory: CategoryParameters::class)]
    #[OpenApi\Response(factory: SingleCategoryResponse::class, statusCode: 200)]
    #[OpenApi\Response(factory: NotFoundResponse::class, statusCode: 404)]
    public function show(Request $request)
    {
        $slug = $request['slug'];

        return new CategoryResource(
            ProductCategory::query()->where('slug', $slug)->firstOrFail()
        );
    }
}
