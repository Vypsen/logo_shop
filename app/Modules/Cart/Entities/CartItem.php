<?php

namespace App\Modules\Cart\Entities;

use App\Modules\Products\Entities\Color;
use App\Modules\Products\Entities\Product;
use App\Modules\Products\Entities\Size;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Modules\Cart\Entities\CartItem
 *
 * @property int $id
 * @property int $cart_id
 * @property int $product_id
 * @property float $price_total
 * @property float $price_item
 * @property int $quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Modules\Cart\Entities\Cart $cart
 * @property-read Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem whereCartId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem wherePriceItem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem wherePriceTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $color_id
 * @property int $size_id
 * @property float $item_sale
 * @property float $total_sale
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem whereColorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem whereItemSale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem whereSizeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem whereTotalSale($value)
 */
class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'product_id',
        'price_total',
        'price_item',
        'quantity'
    ];

    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }

    public function size(): BelongsTo
    {
        return $this->belongsTo(Size::class);
    }
}
