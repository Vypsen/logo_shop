<?php

namespace App\Modules\Products\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Modules\Products\Entities\ProductCategory;
use App\Modules\Products\Transformers\CategoryResource;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;


class CategoriesController extends Controller
{

    /**
     * Display categories.
     *
     * @return Responsable
     *
     */
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
    public function show(Request $request)
    {
        $slug = $request['slug'];

        return new CategoryResource(
            ProductCategory::query()->where('slug', $slug)->firstOrFail()
        );
    }
}
