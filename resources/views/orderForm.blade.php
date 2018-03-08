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
            </div>
        </div>
    </div>
    </body>
</html>
