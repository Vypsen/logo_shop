<?php

namespace App\Admin\Controllers;

use App\Modules\Products\Entities\Color;
use App\Modules\Products\Entities\Product;
use App\Modules\Products\Entities\ProductCategory;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProductController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Product';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('category.name');
        $grid->column('article_number', __('Article number'));
        $grid->column('is_show', __('Is show'));
        $grid->colors()->display(function ($colors) {

            $colors = array_map(function ($color) {
                return "<span class='label label-success'>{$color['color_name']}</span>";
            }, $colors);

            return join('&nbsp;', $colors);
        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Product::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('category.name');
        $show->field('name', __('Name'));
        $show->field('name_on_site', __('Name on site'));
        $show->field('article_number', __('Article number'));
        $show->field('price', __('Price'));
        $show->field('discount_price', __('Discount price'));
        $show->field('description', __('Description'));

        $show->colors('Colors', function ($colors) {
            $colors->resource('/admin/colors');
            $colors->id();
            $colors->color_name();
            $colors->hex_color();
        });
        $show->field('is_fitting', __('Is fitting'));
        $show->field('is_show', __('Is show'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Product());

        $form->select('category','Category')->options(ProductCategory::all()->pluck('name','id'));
        $form->text('name', __('Name'));
        $form->text('name_on_site', __('Name on site'));
        $form->text('article_number', __('Article number'));
        $form->decimal('price', __('Price'));
        $form->decimal('discount_price', __('Discount price'));
        $form->text('description', __('Description'));
        $form->switch('is_sale', __('Is sale'));
        $form->switch('is_new', __('Is new'));
        $form->checkbox('colors','Colors')->options(Color::all()->pluck('color_name','id'));
        $form->switch('is_show', __('Is show'));

        return $form;
    }
}
