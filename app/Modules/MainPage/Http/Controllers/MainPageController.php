<?php

namespace App\Modules\MainPage\Http\Controllers;

use App\Modules\Products\Entities\Product;
use App\Modules\Products\Entities\ProductCategory;
use App\Modules\Products\Transformers\CategoryResource;
use App\Modules\Products\Transformers\PreviewProductResource;
use App\OpenApi\Responses\MainPage\MainPageResponse;
use App\OpenApi\Responses\NotFoundResponse;
use Faker\Generator;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;

#[OpenApi\PathItem]
class MainPageController extends Controller
{

    /**
     * get main page info
     * @param Request
     * @return \Illuminate\Http\JsonResponse
     */
    #[OpenApi\Operation(tags: ['MainPage'], method: 'GET')]
    #[OpenApi\Response(MainPageResponse::class, statusCode: 200)]
    #[OpenApi\Response(NotFoundResponse::class, statusCode: 404)]
    public function index(Request $request)
    {
        /** @var Generator $faker */
        $faker = app(Generator::class);

        $landingImage = $faker->loremFlickr('mainPage/images');

        $subtitle = $faker->realText(30);

        $categories = ProductCategory::all();
        $newProducts = Product::where('is_new', true)
            ->orderBy('id', 'desc')
            ->take(10)
            ->get();

        $saleProducts = Product::where('is_sale', true)
            ->orderBy('id', 'desc')
            ->take(10)
            ->get();

        return response()->json([
            'landing_slide ' =>
                [
                    'landing_image' => $landingImage,
                    'subtitle' => $subtitle,
                ],
            'categories' => CategoryResource::collection($categories),
            'new_products' => PreviewProductResource::collection($newProducts),
            'sale_products' => PreviewProductResource::collection($saleProducts),
        ]);
    }
}
