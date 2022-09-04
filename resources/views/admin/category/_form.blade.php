
<div class="row">
    <div class="col-5">
        <div class="form-group">
            <label for="name">Nombre de la categoría</label>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">
                    <i class="fa fa-sitemap menu-icon"></i>
                </span>
                <input type="text" class="form-control" name="name" id="name" placeholder="Nombre de la categoría." aria-describedby="addon-wrapping" required>
            </div>
            <small id="helpId" class="text-muted">Campo obligatorio.</small>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea name="description" id="maxlength-textarea" class="form-control" placeholder="Breve descripción sobre la categoría." rows="5" maxlength="100"></textarea>
            <small id="helpId" class="text-muted">Campo obligatorio.</small>
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary mr-2">Registrar</button>
<a href="{{route('categories.index')}}" class="btn btn-light">Cancelar</a>