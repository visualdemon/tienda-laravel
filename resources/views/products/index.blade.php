@extends('products.layouts.main')
@section('contenido')
    <div class="container"></br>
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
                                <th>Acción</th>
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
                                    <td>
                                        <a href="{{ route('products.edit', $product->id)}}" class="btn btn-warning"><i class="fa-solid fa-pen"></i></a>
                                        <a href="javascript: document.getElementById('delete-{{$product->id}}').submit()" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                        <form id="delete-{{$product->id}}" action="{{ route('products.destroy', $product->id) }}" method="POST">
                                            @method('delete')
                                            @csrf
                                        </form>
                                    </td>  
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
