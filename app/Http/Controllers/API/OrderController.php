<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\OrderRequest;
use App\Models\Order;
use App\Models\Product;
use App\Models\TemporaryCart;
use App\Models\User;

class OrderController extends Controller
{
    private $order;

    public function create_order(OrderRequest $request)
    {
        try {

            $total = 0;
            $items = TemporaryCart::where("user_id", $request->userId)->get();
            foreach ($items as $item) {
                return $this->check_product_existance($item->product_id);
            }
            $order = Order::create(["total" => $total, "user_id" => $request->userId]);
            $product = $this->getProductData($request->item);
            $order->products()->attach($product->id, []);

            return successResponse(["order" => $order], "success", 200);
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function check_product_existance($product_id)
    {
        $product = $this->getProductData($product_id);
        if ($product == null) {
            return failureResponse([], __("message.doesnt_exist", "table Product"), 400);
        }
    }
    public function add_to_cart(OrderRequest $request)
    {
        try {

            $product = $this->getProductData($request->item);
            if ($product == null) {
                return failureResponse([], __("message.doesnt_exist", "table product"), 400);
            }
            $product = $this->getProductData($request->item);
            $user = $this->getUserData($request->userId);
            if ($user == null) {
                return failureResponse([], __("message.doesnt_exist", "table user"), 400);
            }
            $cart = TemporaryCart::create(['user_id' => $user->id, "product_id" => $product->id, 'quantity' => $request->quantity]);
            return successResponse(["cart" => $cart], "success", 200);
        } catch (\Exception $e) {
            return failureResponse([], __("message.something_wrong"), 400);
        }
    }
    public function remove_from_cart(OrderRequest $request)
    {
        try {

            $product = $this->getProductData($request->item);
            if ($product == null) {
                return failureResponse([], __("message.doesnt_exist", "table product"), 400);
            }
            $product = $this->getProductData($request->item);
            $user = $this->getUserData($request->userId);
            if ($user == null) {
                return failureResponse([], __("message.doesnt_exist", "table user"), 400);
            }
            $cart = TemporaryCart::where('user_id', $user->id)->where('product_id', $product->id)->delete();
            return successResponse(["cart" => $cart], "success", 200);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function getProductData($productID)
    {
        $product = Product::where("id", $productID)
            ->first();

        return $product;
    }
    public function getUserData($productID)
    {
        $product = User::where("id", $productID)
            ->first();

        return $product;
    }
}
