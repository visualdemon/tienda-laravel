<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Listado de Productos
                        <a href="{{ route ('products.create') }}" class="btn btn-success btn-sm float-right">Nuevo Producto</a>
                    </div>
                    <div class="card-body">
                        @if (session('info'))
                           <div class="alert alert-success">
                                {{ session('info')}}
                           </div> 
                        @endif
                        <table class="table table-hover table-sm">
                            <thead>
                                <th>id</th>
                                <th>description</th>
                                <th>price</th>
                                <th>user_id</th>
                                <th>created</th>
                                <th>Total</th>
                            </thead>
                            <tbody>
                                @php
                                    $total=0;
                                @endphp
                                @foreach ($products as $product)
                                @php
                                    $precios=$product->price;
                                    $total= $precios + $total;
                                @endphp                                

                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->user_id}}</td>
                                    <td>{{$product->created_at}}</td>
                                    <td class="text-right">$ {{$total}}</td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>