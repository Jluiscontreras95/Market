@extends('layouts.admin')
@section('title','libro contable')
@section('styles')
<style type="text/css">
    .unstyled-button {
        border: none;
        padding: 0;
        background: none;
      }
</style>

@endsection
@section('create')
<li class="nav-item d-none d-lg-flex">
    <a class="nav-link" href="{{route('contabilities.create')}}">
      <span class="btn btn-primary">+ Registrar</span>
    </a>
  </li>
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Libro contable
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Libro contable</li>
            </ol>
        </nav>
    </div>




    <div class="row">
                <div class="col-md-6 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-0">Statistics</h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-inline-block pt-3">
                                    <div class="d-md-flex">
                                        <h2 class="mb-0">$10,200</h2>
                                        <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                            <i class="far fa-clock text-muted"></i>
                                            <small class=" ml-1 mb-0">Updated: 9:10am</small>
                                        </div>
                                    </div>
                                    <small class="text-gray">Raised from 89 orders.</small>
                                </div>
                                <div class="d-inline-block">
                                    <i class="fas fa-chart-pie text-info icon-lg"></i>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @foreach ($totales as $total)
                
                <div class="col-md-6 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-0">Fondos Disponibles</h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-inline-block pt-3">
                                    <div class="d-md-flex">
                                        <h2 class="mb-0">{{$total->total}}</h2>
                                    </div>
                                    <small class="text-gray">hey, let’s have lunch together</small>
                                </div>
                                <div class="d-inline-block">
                                    <i class="fas fa-shopping-cart text-danger icon-lg"></i>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>




















    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Libro contable</h4>
                        {{--  <i class="fas fa-ellipsis-v"></i>  --}}
                        <div class="btn-group">
                            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a href="{{route('contabilities.create')}}" class="dropdown-item">Registrar</a>
                              {{--  <button class="dropdown-item" type="button">Another action</button>
                              <button class="dropdown-item" type="button">Something else here</button>  --}}
                            </div>
                          </div>
                    </div>

                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Fecha</th>
                                    <th>Descripcion</th>
                                    <th>Debe</th>
                                    <th>Haber</th>
                                    <th style="width:50px;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contabilities as $contability)
                                <tr>
                                    <td scope="row">
                                        <a href="{{route('contabilities.show', $contability)}}">{{$contability->id}}</a>
                                    </td>
                                    <td>
                                        {{\Carbon\Carbon::parse($contability->contability_date)->format('d M y h:i a')}}
                                    </td>
                                    <td>{{$contability->description}}</td>
                                    <td>{{$contability->must}}</td>
                                    <td>{{$contability->have}}</td>

                                    <td style="width: 50px;">

                                        <a href="#" class="jsgrid-button jsgrid-edit-button"><i class="far fa-file-pdf"></i></a>
                                        <a href="#" class="jsgrid-button jsgrid-edit-button"><i class="fas fa-print"></i></a>
                                        <a href="{{route('contabilities.show', $contability)}}" class="jsgrid-button jsgrid-edit-button"><i class="far fa-eye"></i></a>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{--  <div class="card-footer text-muted">
                    {{$contabilities->render()}}
                </div>  --}}
            </div>
        </div>
    </div>
</div>
@endsection