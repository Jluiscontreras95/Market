@extends('layouts.admin')
@section('title','Información del producto')
@section('style')
@endsection
@section('create')

    <li class="nav-item d-none d-lg-flex">
        <a href="{{route('products.create')}}" class="nav-link">
            <span class="btn btn-primary">+ Crear nuevo producto</span>
        </a>
    </li>

@endsection
@section('preference')
@endsection
@section('content')

    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Producto</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{route('products.index')}}">Productos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                @if(isset($product->image))
                                    <div class="border-bottom text-center pb-4">
                                        <img src="{{asset('image/'.$product->image)}}" alt="profile" class="img-lg rounded-circle mb-3">
                                        <h3>{{$product->name}}</h3>
                                    </div>
                                @else
                                    <div class="border-bottom text-center pb-4">
                                        <h3>{{$product->name}}</h3>
                                    </div>
                                @endif
                                <div class="pt-4 pb-2">
                                    <p class="clearfix">
                                        <span class="float-left">Status</span>
                                        <span class="float-right text-muted">{{$product->status}}</span>
                                    </p>
                                </div>
                                <div class="pt-2 pb-2">
                                    <p class="clearfix">
                                        <span class="float-left">Categoría</span>
                                        <span class="float-right text-muted">
                                            <a href="#">{{$product->category->name}}</a>
                                        </span>
                                    </p>
                                </div>                            
                                <div class="pt-2 pb-4">
                                    <p class="clearfix">
                                        <span class="float-left">Proveedor</span>
                                        <span class="float-right">
                                            @foreach ($product->providers as $provider)
                                                <a href="{{route('providers.show', $provider->id)}}">{{$provider->name}}</a>
                                                <br>
                                            @endforeach
                                        </span>
                                    </p>
                                </div>
                                @if ($product->status == "ACTIVE")
                                    <button class="btn btn-success btn-block">{{$product->status}}</button>
                                @else
                                    <button class="btn btn-danger btn-block">{{$product->status}}</button>
                                @endif
                            </div>
                            <div class="col-lg-8 pl-lg-5">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="pt-3 pb-3">Información del producto</h4>
                                    </div>
                                </div>
                                <div class="profile-feed">
                                    <div class="">
                                        <div class="row">
                                            <div class="col">
                                                <strong>
                                                    <i class="fas fa-keyboard mr-1"></i> Código
                                                </strong>
                                                <br>
                                                <h5 class="pl-5 pt-2">{{$product->code}}</h5>
                                                <hr>
                                            </div>
                                            <div class="col">
                                                <strong>
                                                    <i class="fas fa-check-circle mr-1"></i> Stock
                                                </strong>
                                                <h5 class="pl-5 pt-2">{{$product->stock}} {{$product->measure}}</h5>
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <strong>
                                                    <i class="fas fa-shopping-cart mr-1"></i> Precio de venta
                                                </strong>
                                                <h5 class="pl-5 pt-2">Bs. {{$product->sell_price}} // $. {{ number_format($product->sell_price / $exchange->description), 2, '.', ','}}</h5>
                                                <hr>
                                            </div>
                                            <div class="col">
                                                <strong>
                                                    <i class="fas fa-shopping-cart mr-1"></i> Precio de compra
                                                </strong>
                                                <h5 class="pl-5 pt-2">Bs. {{$product->cost_price}}</h5>
                                                <hr>
                                            </div>
                                            <div class="col">
                                                <strong>
                                                    <i class="fas fa-shopping-cart mr-1"></i> Utilidad(%)
                                                </strong>
                                                <h5 class="pl-5 pt-2">{{$product->utility}}</h5>
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <strong>
                                                    <i class="fas fa-barcode mr-1"></i> Código de barras
                                                </strong>
                                                <p class="text-muted">{!! DNS1D::getBarcodeHTML($product->code, 'EAN13'); !!}</p>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <a href="{{route('products.index')}}" class="btn btn-primary float-right">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')

@endsection