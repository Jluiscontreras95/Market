@extends('layouts.admin')
@section('title','Edición de roles')
@section('styles')
@endsection
@section('create')
@endsection
@section('preference')
@endsection
@section('content')

    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Editar rol</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{route('roles.index')}}">Roles</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edición de rol</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Registro de rol</h4>
                        </div>
                        
                        {!! Form::model($role, ['route'=>['roles.update',$role], 'method' => 'PUT']) !!}


                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Nombre del rol. Ejm: Vendedores, Almacenista....." value="{{$role->name}}" required>
                            </div>

                            <h3>Lista de permisos</h3>
                            <div class="form-group">
                                <ul class="list-unstyled">
                                    @foreach ($permissions as $permission)
                                        <li>
                                            <label>
                                                {!! Form::checkbox('permissions[]', $permission->id, null) !!}
                                                {{$permission->action}} / 
                                                <em>{{$permission->description}}</em>
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>    
                            </div>
                            
                            <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                            <a href="{{route('roles.index')}}" class="btn btn-light">Cancelar</a>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')

@endsection