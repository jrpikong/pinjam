<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function processOrder ($productId, $qty)
    {
        $response = new \stdClass();
        $response->errorMsg = null;
        $response->isSuccess = false;

        $transaction =  new self();
        $transaction->product_id = $productId;
        $transaction->qty = $qty;
        $transaction->save();

        if (!$transaction) {
            return $response->errorMsg = "Order Gagal";
        }
        /*Update Stock*/
        if (!$this->updateStok($productId, $qty)) {
            return $response->errorMsg = "Order Gagal";
        }

        $response->isSuccess = true;
        return $response;
    }

    private function updateStok ($productId, $qty)
    {
        $product = Product::find($productId);
        $product->stock = $product->stock - $qty;
        $product->save();
        if (!$product) {
            return false;
        }
        return true;
    }


    /*RELATIONS*/

    public function products ()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
