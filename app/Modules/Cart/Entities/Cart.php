<?php

namespace App\Modules\Cart\Entities;

use App\Modules\Products\Entities\Product;
use App\Modules\Users\Entities\User;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Modules\Cart\Entities\Cart
 *
 * @property int $id
 * @property string|null $session_id
 * @property int|null $user_id
 * @property float $price_total
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Modules\Cart\Entities\CartItem[] $items
 * @property-read int|null $items_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Modules\Cart\Entities\CartItem[] $orderedItems
 * @property-read int|null $ordered_items_count
 * @method static \Illuminate\Database\Eloquent\Builder|Cart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart wherePriceTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereSessionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereUserId($value)
 * @mixin \Eloquent
 */
class Cart extends Model
{
    use HasFactory;

    /** @var CartItem[] */
    private $itemsByProductId;

    protected $fillable = [
        'session_id',
        'user_id',
        'price_total'
    ];

    public function items(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    public function orderedItems(): HasMany
    {
        return $this->items()->orderBy('id');
    }

    public static function getCart(?User $user, ?string $sessionId)
    {
        if ($user === null && $sessionId === null) {
            throw new Exception('User or session id is null');
        }

        $query = self::query();
        if ($user !== null) {
            $query->where('user_id', $user->id);
        }

        if ($sessionId !== null) {
            $query->where('session_id', $sessionId);
        }

        return $query->first();
    }

    public static function createEmptyCart(?User $user, ?string $sessionId): Cart
    {
        $cart = new self();
        $cart->user_id = $user->id ?? null;
        $cart->session_id = $sessionId;
        $cart->price_total = 0;
        return $cart;
    }

    public static function getOrCreateCart(?User $user, ?string $sessionId)
    {
        return self::getCart($user, $sessionId) ?? self::createEmptyCart($user, $sessionId);
    }

    private function fillItemsByProductId(): void
    {
        if ($this->itemsByProductId === null) {
            $this->load('items.product');
            $this->itemsByProductId = [];
            foreach ($this->items as $cartItem) {
                $this->itemsByProductId[$cartItem->product_id] = $cartItem;
            }
        }
    }

    public function setProductQuantity(Product $product, int $quantity): void
    {
        $this->fillItemsByProductId();

        $cartItem = $this->itemsByProductId[$product->id] ?? null;
        if ($cartItem === null) {
            $cartItem = new CartItem();
            $cartItem->product_id = $product->id;
        }
        $cartItem->price_item = $product->price;
        $cartItem->quantity = $quantity;
        $cartItem->price_total = $cartItem->quantity * $cartItem->price_item;

        $this->itemsByProductId[$product->id] = $cartItem;
    }

    public function recalculateCart(): void
    {
        $this->fillItemsByProductId();
        $this->price_total = 0;
        foreach ($this->itemsByProductId as $productId => $cartItem) {
            $cartItem->price_item = $cartItem->product->price;
            $cartItem->price_total = $cartItem->quantity * $cartItem->price_item;
            $this->price_total += $cartItem->price_total;
        }
    }

    public function save(array $options = []): void
    {
        parent::save($options);
        if ($this->itemsByProductId !== null) {
            foreach ($this->itemsByProductId as $productId => $cartItem) {
                $cartItem->cart_id = $this->id;
                $cartItem->save();

                if ($cartItem->quantity === 0) {
                    $cartItem->delete();
                    unset($this->itemsByProductId[$productId]);
                }
            }
        }
    }
}
