<div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" name="name" id="name" class="form-control" placeholder="Nombre del rol. Ejm: Vendedores, Almacenista....."  required>
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

<button type="submit" class="btn btn-primary mr-2">Registrar</button>
<a href="{{route('roles.index')}}" class="btn btn-light">Cancelar</a>