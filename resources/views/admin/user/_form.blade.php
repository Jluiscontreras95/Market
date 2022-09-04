<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Nombre del usuario"  required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Correo, ejem. a@gmail.com" rows="3" required>
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="" rows="3" required >
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
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
    </div>
</div>

<button type="submit" class="btn btn-primary mr-2">Registrar</button>
<a href="{{route('users.index')}}" class="btn btn-light">Cancelar</a>