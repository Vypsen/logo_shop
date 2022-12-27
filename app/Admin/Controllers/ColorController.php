<?php

namespace App\Admin\Controllers;

use App\Modules\Products\Entities\Color;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ColorController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Color';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Color());

        $grid->column('id', __('Id'));
        $grid->column('color_name', __('Color name'));
        $grid->column('hex_color', __('Hex color'));

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
        $show = new Show(Color::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('color_name', __('Color name'));
        $show->field('hex_color', __('Hex color'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Color());

        $form->text('color_name', __('Color name'));
        $form->color('hex_color')->default('#ccc');

        return $form;
    }
}
