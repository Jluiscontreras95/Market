@extends('layouts.admin')
@section('title','Edición de categorías')
@section('styles')
@endsection
@section('create')
<!-- <li class="nav-item d-none d-lg-flex">
    <a class="nav-link" href="{{route('categories.create')}}">
        <span class="btn btn-primary">+ Crear nuevo</span>
    </a>
</li> -->
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
        Editar categorías
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categorías</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edición de categorías</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Registro de categorías</h4>
                    </div>
                    <hr>
                    
                    {!! Form::model($category, ['route'=>['categories.update',$category], 'method' => 'PUT']) !!}

                    <div class="row">
                        <div class="col-5">
                            <div class="form-group">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping">
                                        <i class="fa fa-sitemap menu-icon"></i>
                                    </span>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Nombre de la categoría." aria-describedby="addon-wrapping" value="{{$category->name}}" required>
                                </div>
                                <small id="helpId" class="text-muted">Campo obligatorio.</small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <textarea name="description" id="maxlength-textarea" class="form-control" placeholder="Breve descripción sobre la categoría." rows="5" maxlength="100">{{$category->description}}</textarea>
                                <small id="helpId" class="text-muted">Campo obligatorio.</small>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                    <a href="{{route('categories.index')}}" class="btn btn-light">Cancelar</a>
                    
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')

@endsection