@extends('products.layouts.main')
@section('contenido')
    <div class="container"></br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Editar Productos
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                            <div class="form-group">
                                <label for="">Usuario</label>
                                <input type="number"  name="user_id" value="{{ $product->user_id}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Descripción</label>
                                <input type="text" name="description" value="{{$product->description}}" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="">Precio</label>
                                <input type="number" name="price" value="{{$product->price}}" class="form-control" >
                            </div>
                            
                            </br>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="{{route ('products.index')}}" class="btn btn-danger">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection