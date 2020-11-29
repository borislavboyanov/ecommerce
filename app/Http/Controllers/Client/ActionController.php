<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ClientCart;
use Validator;
use Auth;

class ActionController extends Controller
{
    public function addCartItem(Request $request) {
        $validator = Validator::make($request->all(), [
            'product_id'    => ['bail', 'required', 'integer'],
            'quantity'      => ['bail', 'required', 'integer', 'min:0']
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $product = Product::find($request->product_id);
        if(empty($product)) {
            return response()->json(['response' => 'Error. That product doesn\'t exist']);
        }
        if($request->quantity > $product->quantity) {
            return response()->json(['response' => 'The requested quantity isn\'t available.']);
        }
        $item = Auth::user()->items()->where('product_id', $request->product_id)->first();
        if(!empty($item)) {
            $item->update(['quantity' => $request->quantity]);
        } else {
            Auth::user()->items()->create([
                'product_id'    => $product->id,
                'quantity'      => $request->quantity,
                'price'         => $request->quantity * $product->price
            ]);
        }
        $product->update(['quantity' => $product->quantity - $request->quantity]);
        return response()->json(['response' => 'Successfully added a cart item.']);
    }

    public function editCartItem(Request $request) {
        $validator = Validator::make($request->all(), [
            'id'       => ['bail', 'required', 'integer'],
            'quantity' => ['bail', 'required', 'integer', 'min:0']
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $item = Auth::user()->items()->find($request->id);
        if(empty($item)) {
            return response()->json(['response' => 'Error. That item doesn\'t exist']);
        }
        if($request->quantity > 0) {
            $item->product->update(['quantity' => $item->product->quantity + $item->quantity - $request->quantity]);
            $item->update([
                'quantity' => $request->quantity
            ]);
            return response()->json(['response' => 'Item successfully edited.']);
        } else {
            $item->product->update(['quantity' => $item->product->quantity + $item->quantity]);
            $item->delete();
            return response()->json(['response' => 'Item successfully deleted.']);
        }
    }

    public function deleteCartItem(Request $request) {
        $validator = Validator::make($request->all(), [
            'id'    => ['bail', 'required', 'integer']
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $item = Auth::user()->items()->find($request->id);
        if(empty($item)) {
            return response()->json(['response' => 'Error. That item doesn\'t exist']);
        }
        $item->delete();
        return response()->json(['response' => 'Item successfully deleted.']);
    }

    public function addWishlistItem(Request $request) {
        $validator = Validator::make($request->all(), [
            'product_id'    => ['bail', 'required', 'integer']
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $product = Product::find($request->product_id);
        if(empty($product)) {
            return response()->json(['response' => 'Error. That product doesn\'t exist']);
        }
        $item = Auth::user()->wishlist()->where('product_id', $request->product_id)->first();
        if(empty($item)) {
          Auth::user()->wishlist()->create([
              'product_id'    => $product->id
          ]);
        return response()->json(['response' => 'Successfully added a cart item.']);
    }

    public function deleteWishlistItem(Request $request) {
        $validator = Validator::make($request->all(), [
            'id'    => ['bail', 'required', 'integer']
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $item = Auth::user()->wishlist()->find($request->id);
        if(empty($item)) {
            return response()->json(['response' => 'Error. That item doesn\'t exist']);
        }
        $item->delete();
        return response()->json(['response' => 'Item successfully deleted.']);
    }
}
