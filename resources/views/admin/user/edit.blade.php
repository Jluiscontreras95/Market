@extends('layouts.admin')
@section('title','Edición de usuarios')
@section('styles')
@endsection
@section('create')
@endsection
@section('preference')
@endsection
@section('content')

    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Editar usuario</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{route('users.index')}}">Usuarios</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edición de usuario</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Registro de usuario</h4>
                        </div>
                        
                        {!! Form::model($user, ['route'=>['users.update',$user], 'method' => 'PUT']) !!}

                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Nombre del usuario" value="{{$user->name}}"  required>
                            </div>
                            <div class="form-group">
                                <label for="email">Correo electrónico</label>
                                <input name="email" id="email" class="form-control" placeholder="Correo, ejem. a@gmail.com " rows="3" value="{{$user->email}}" required>
                            </div>
                            <!-- <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input name="password" id="password" class="form-control" placeholder="" rows="3" >
                                <small id="helpId" class="text-muted">Rellenar solo si desea cambiar la contraseña</small>
                            </div> -->

                            <h3>Listado de roles</h3>
                            <div class="form-group">
                                <ul class="list-unstyled">
                                    @foreach ($roles as $role)
                                        <li>
                                            <label>
                                                {!! Form::checkbox('roles[]', $role->id, null) !!}
                                                {{$role->name}}
                                                <em>({{$role->description}})</em>
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        
                            <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                            <a href="{{route('users.index')}}" class="btn btn-light">Cancelar</a>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')

@endsection