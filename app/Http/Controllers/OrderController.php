<?php

namespace App\Http\Controllers;

use App\Product;
use App\Transaction;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $products;
    private $transactions;

    public function __construct ()
    {
        $this->products = Product::all();
        $this->transactions = Transaction::with('products')->get();
    }

    public function order (Request $request)
    {
        $products = $this->products;
        $transactions = $this->transactions;
        $listProducts = Product::paginate(15);
        return view('orderForm', compact('products','transactions','listProducts'));
    }

    public function orderPost (Request $request)
    {
        $productId = $request->input('product');
        $qty = $request->input('qty');

        //check stock product
        $product = Product::find($productId);
        if($product->stock < $qty){
            $request->session()->flash('danger', 'Stok Product "'.$product->name.'" Tidak Mencukupi');
            return redirect('/');
        }
        //Process Order
        $transactionModel = new Transaction();
        $transactionDb = $transactionModel->processOrder($productId, $qty);

        if (!$transactionDb->isSuccess) {
            $request->session()->flash('warning', $transactionDb->errorMsg);
            return redirect('/');
        }

        $request->session()->flash('success', 'Order Barang "'.$product->name.'" Sukses');
        return redirect('/');
    }
}
