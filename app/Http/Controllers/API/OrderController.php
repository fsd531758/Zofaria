<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\CartRequest;
use App\Http\Requests\API\OrderRequest;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\ProductQualitySize;
use App\Models\TemporaryCart;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    private $order;

    public function create_order(OrderRequest $request)
    {
        try {
            DB::beginTransaction();
            $total = 0;
            $user = $this->check_user_exist($request->userId);
            if ($user["user"] == null) {
                return $user["message"];
            }
            $items = TemporaryCart::where("user_id", $request->userId)->get();
            $prices = [];
            foreach ($items as $item) {
                $record = $this->check_product_exist($item->product_id);
                if ($record["product"] == null) {
                    return $record["message"];
                }
                // add server validation  to quantity and apply discount
                $product_quality_size = ($record["product"] !== null) ? $record["product"] : json_decode('{}');
                $prices[$item->product_id] = $product_quality_size->price_two;
                $total += $item->quantity * $product_quality_size->price_two;
            }
            $shipping_price = 100;
            $order = Order::create(["total_price" => $total, "address" => $request->address, "city" => $request->city, "postal_code" => $request->postal_code, "shipping_price" => $shipping_price, "country" => $request->country, "user_id" => $request->userId]);
            foreach ($items as $item) {
                OrderProduct::create(['order_id' => $order->id, "product_quality_size_id" => $item->product_id, "price" => $prices[$item->product_id], "quantity" => $item->quantity]);
            }
            DB::commit();
            return successResponse(["order" => $order], "success", 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return failureResponse([], __("message.something_wrong"), 400);
        }
    }
    public function check_product_exist($product_id)
    {
        $product = $this->getProductData($product_id);
        if ($product == null) {
            return ["product" => $product, "message" => failureResponse([], __("message.product_doesn't_exist"), 400)];
        }
        return ["product" => $product];
    }
    public function check_user_exist($user_id)
    {
        $user = $this->getUserData($user_id);
        if ($user == null) {
            return ["user" => $user, "message" => failureResponse([], __("message.user_doesn't_exist"), 400)];
        }
        return ["user" => $user];
    }

    public function get_cart_items($userId)
    {
        try {
            $user = $this->check_user_exist($userId);
            if ($user["user"] == null) {
                return $user["message"];
            }
            $items = TemporaryCart::where("user_id", $userId)->get();
            return $items;

        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add_to_cart(CartRequest $request)
    {
        try {

            $product = $this->check_product_exist($request->item);
            if ($product["product"] == null) {
                return $product["message"];
            }
            $product = $product["product"];
            $user = $this->check_user_exist($request->userId);
            if ($user["user"] == null) {
                return $user["message"];
            }
            $cart = TemporaryCart::create(['user_id' => $user["user"]->id, "product_id" => $product->id, 'quantity' => $request->quantity]);
            return successResponse(["cart" => $cart], "success", 200);
        } catch (\Exception $e) {
            return failureResponse([], __("message.something_wrong"), 400);
        }
    }
    public function remove_from_cart(CartRequest $request)
    {
        try {
            $product = $this->check_product_exist($request->item);
            if ($product["product"] == null) {
                return $product["message"];
            }
            $product = $product["product"];
            $user = $this->check_user_exist($request->userId);
            if ($user["user"] == null) {
                return $user["message"];
            }
            $cart = TemporaryCart::where('user_id', $user['user']->id)->where('product_id', $product->id)->delete();
            return successResponse(["cart" => $cart], "success", 200);
        } catch (\Exception $e) {
            return failureResponse([], __("message.something_wrong"), 400);
        }
    }

    public function getProductData($productID)
    {
        $product = ProductQualitySize::where("id", $productID)
            ->first();
        return $product;
    }
    public function getUserData($userID)
    {
        $user = User::where("id", $userID)
            ->first();

        return $user;
    }
}