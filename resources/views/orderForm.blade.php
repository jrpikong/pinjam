<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
    <div class="container">
        <div class="card-deck mb-3">
            <div class="card mb-md-1 box-shadow">
                <div class="card-header">Order Form</div>
                <div class="card-body">
                    @foreach (['danger', 'warning', 'success', 'info'] as $key)
                        @if(Session::has($key))
                            <p class="alert alert-{{ $key }}">{{ Session::get($key) }}</p>
                        @endif
                    @endforeach
                    <form action="orderPost" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="product">Product Name </label>
                            </div>
                            <div class="col-sm-8">
                                <select name="product" class="form-group">
                                    @if(!empty($products))
                                        @foreach($products as $product)
                                            <option value="{{$product->id}}">{{$product->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="qty">QTY</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="qty" placeholder="1" class="form-group" value="1" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-block btn-outline-primary"> Order</button>
                        </div>

                    </form>
                </div>
                @if($transactions)
                <div class="card-header">List Order</div>
                <div class="card-body">
                    <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Qty</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($transactions as $i =>$transaction)
                        <tr>
                            <th scope="row">{{$i + 1}}</th>
                            <td>{{$transaction->products->name}}</td>
                            <td>{{$transaction->qty}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
                @endif

                @if($listProducts)
                    <div class="card-header">List Producs</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Stock</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($listProducts as $i =>$listProduct)
                                <tr>
                                    <th scope="row">{{$i + 1}}</th>
                                    <td>{{$listProduct->name}}</td>
                                    <td>Rp {{number_format($listProduct->price)}}</td>
                                    <td>{{$listProduct->stock}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $listProducts->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    </body>
</html>
