@extends('layouts.admin')
@section('title','Gestión de usuarios del sistema')
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
        <a class="nav-link" href="{{route('users.create')}}">
            <span class="btn btn-primary">+ nuevo usuario</span>
        </a>
    </li>
@endsection
@section('preference')
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Usuarios del sistema</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Usuarios</h4>
                            <div class="btn-group">
                                <a  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{route('users.create')}}" class="dropdown-item">Agregar</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Correo electrónico</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>
                                                <a href="#">{{ $user->name }}</a>
                                            </td>
                                            <td>{{ $user->email }}</td>
                                            <td style="width: 50px;">
                                                {!! Form::open( ['route'=>['users.destroy', $user], 'method'=>'DELETE'] ) !!} 

                                                    <a class="jsgrid-button jsgrid-edit-button" href="{{ route('users.edit', $user) }}" title="Editar">
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