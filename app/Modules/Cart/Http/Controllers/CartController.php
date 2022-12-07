<?php

namespace App\Modules\Cart\Http\Controllers;


use App\Modules\Cart\Entities\Cart;
use App\Modules\Cart\Http\Requests\CartModificationRequest;
use App\Modules\Cart\Transformers\CartResource;
use App\Modules\Products\Entities\Product;
use Illuminate\Support\Facades\Auth;
use Vyuldashev\LaravelOpenApi\Attributes as OpenApi;

#[OpenApi\PathItem]
class CartController
{
    /**
     * Add/delete products to/from cart or set quantity
     *
     * @param CartModificationRequest $request
     * @return CartResource
     */
    public function setQuantity(CartModificationRequest $request): CartResource
    {

        $data = $request->validated('modifications');
        $user = Auth::user();

        $sessionId = session()->getId();
        $cart = Cart::getOrCreateCart($user, $sessionId);

        $productIds = array_column($data, 'product_id');
        $productsById = Product::whereIn('id', $productIds)
            ->get()
            ->keyBy('id');

        foreach ($data as $modification) {
            $cart->setProductQuantity($productsById[$modification['product_id']], $modification['quantity']);
        }
        $cart->recalculateCart();
        $cart->save();

        return CartResource::make($cart);
    }

    /**
     * Get cart by user or session id
     *
     * @return CartResource
     */
    #[OpenApi\Operation(tags: ['cart'], method: 'GET')]
    #[OpenApi\Response(factory: ShowCartResponse::class, statusCode: 200)]
    public function show(): CartResource
    {
        return CartResource::make(Cart::getOrCreateCart(Auth::user(), session()->getId()));
    }
}
