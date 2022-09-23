@extends('layouts.admin')
@section('title','Gestión de productos')
@section('styles')

    <style type="text/css">
        .unstyled-button
        {
            border:none;
            padding: 0;
            background: none;
        }

    </style>

@endsection
@section('create')
    <li class="nav-item d-none d-lg-flex">
        <a class="nav-link" href="{{route('products.create')}}">
            <span class="btn btn-primary">+ Crear nuevo producto</span>
        </a>
    </li>
    <li class="nav-item d-none d-lg-flex">
        <a class="nav-link" href="{{route('products.pdf')}}">
            <span class="btn btn-primary">* Imprimir inventario PDF</span>
        </a>
    </li>
    <li class="nav-item d-none d-lg-flex">
        <a class="nav-link" href="{{route('product.export')}}">
            <span class="btn btn-primary">* Imprimir inventario EXCEL</span>
        </a>
    </li>
@endsection
@section('preference')
@endsection
@section('content')

<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Productos</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Productos</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Productos</h4>
                        <div class="btn-group">
                            <a  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{route('products.create')}}" class="dropdown-item">Agregar</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Stock</th>
                                    <th>Precio de costo</th>
                                    <th>Utilidad(%) al detal</th>
                                    <th>Precio de venta al detal</th>
                                    <th>Utilidad(%) al mayor</th>
                                    <th>Precio de venta al mayor</th>
                                    <th>Categoría</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>
                                            <a href="{{ route('products.show', $product) }}">{{ $product->name }}</a>
                                        </td>
                                        @empty($product->measure_alter_cant)
                                            <td>{{ $product->stock }} {{ $product->measure }}</td>
                                        @else
                                            <td>{{ $product->stock }} {{ $product->measure }} ó {{ number_format($product->stock / $product->measure_alter_cant , 2) }} {{ $product->measure_alter }}</td>
                                        @endempty
                                        <td>Bs. {{ $product->cost_price }}</td>
                                        <td>{{ $product->utility }}</td>
                                        <td>Bs. {{ $product->sell_price }}</td>
                                        @empty($product->cost_price_may && $product->utility_may && $product->sell_price_may)
                                            <td>0.00</td>
                                            <td>Bs. 0.00</td>
                                        @else
                                            <td>{{ $product->utility_may }}</td>
                                            <td>Bs. {{ $product->sell_price_may }}</td>
                                        @endempty
                                        <td>{{ $product->category->name }}</td>
                                        @if ($product->status == 'ACTIVE')
                                            <td>
                                                <a class="jsgrid-button btn btn-success" href="{{route('change.status.products', $product)}}" title="Editar">
                                                    Activo <i class="fas fa-check"></i>
                                                </a>
                                            </td>
                                        @else
                                            <td>
                                                <a class="jsgrid-button btn btn-danger" href="{{route('change.status.products', $product)}}" title="Editar">
                                                    Desactivado <i class="fas fa-times"></i>
                                                </a>
                                            </td>
                                        @endif
                                        <td style="width: 50px;">
                                            {!! Form::open( ['route'=>['products.destroy', $product], 'method'=>'DELETE'] ) !!} 
                                                <a class="jsgrid-button jsgrid-edit-button" href="{{ route('products.edit', $product) }}" title="Editar">
                                                    <li class="far fa-edit"></li>
                                                </a>
                                                <button type="submit" class="jsgrid-button jsgrid-delete-button unstyled-button" title="Eliminar">
                                                    <li class="far fa-trash-alt"></li>
                                                </button>
                                            {!! Form::close() !!}
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
</div>

@endsection
@section('scripts')

@endsection