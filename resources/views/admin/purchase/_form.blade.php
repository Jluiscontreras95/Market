<div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="provider_id">Seleccione el proveedor</label>
                <select class="form-control selectpicker" name="provider_id" id="provider_id" data-live-search="true">
                   <option value="" disabled selected>Seleccione Proveedor</option>
                        @foreach ($providers as $provider)   
                            <option value="{{$provider->id}}">{{$provider->name}}</option>
                        @endforeach
                </select>
                <small id="helpId" class="text-muted">Campo obligatorio.</small>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="product">Seleccione el producto</label>
                <select class="form-control selectpicker" name="product" id="product" autocomplete="off" data-live-search="true" title="seleccione uno de los siguientes...">
                    <option value="" disabled selected>Seleccione producto</option>
                </select>
                <small id="helpId" class="text-muted">Campo obligatorio.</small>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="quantity">Cantidad a comprar</label>
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="measure_tag"></span>
                    <input type="hidden" class="form-control" name="measure" id="measure" placeholder="Medida" aria-describedby="addon-wrapping" >
                    <input type="number" class="form-control" name="quantity" id="quantity" placeholder="cantidad a adquirir" aria-describedby="addon-wrapping" >
                </div>
                <small id="helpId" class="text-muted">Campo obligatorio.</small>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="price">Precio de la comprar al DETAL (Bs.)</label>
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">
                        <i class="far far fa-handshake menu-icon"></i>
                    </span>
                    <input type="number" class="form-control" name="price" id="price" placeholder="Precio de la compra (detal)" aria-describedby="addon-wrapping" >
                </div>
                <small id="helpId" class="text-muted">Campo obligatorio.</small>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="tax_product">Impuesto agregado (IVA)</label>
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">
                    <i class="fa fa-tag menu-icon"></i>
                    </span>
                    <input type="number" class="form-control" name="tax_product" id="tax_product" placeholder="Impuesto en %" aria-describedby="addon-wrapping" >
                </div>
                <small id="helpId" class="text-muted">Campo obligatorio.</small>
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <button type="button" id="agregar" name="agregar" class="btn btn-primary float-right">Agregar producto</button>
</div>
<div class="form-group">
    <h4 class="card-tittle">Detalles de compra</h4>
    <div class="table-responsive col-md12">
        <table id="detalles" class="table table-striped">
            <thead>
                <tr>
                    <th>Eliminar</th>
                    <th>Producto</th>
                    <th>Precio(Bs.)</th>
                    <th>Cantidad</th>
                    <th>Escala</th>
                    <th>SubTotal(Bs.)</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th colspan="6">
                        <p align="right">TOTAL:</p>
                    </th>
                    <th>
                        <p align="right"><span id="total">Bs. 0.00</span></p>
                    </th>
                </tr>
                <tr id="dvOcultar">
                    <th colspan="6">
                        <p align="right">TOTAL IMPUESTO:</p>
                    </th>
                    <th>
                        <p align="right"><span id="total_impuesto">Bs. 0.00</span></p>
                        <input type="hidden" name="total_tax" id="total_tax">
                    </th>
                </tr>
                <tr>
                    <th colspan="6">
                        <p align="right">TOTAL PAGAR:</p>
                    </th>
                    <th>
                        <p align="right">
                            <span align="right" id="total_pagar_html">Bs. 0.00</span>
                            <input type="hidden" name="total" id="total_pagar">
                        </p>
                        <p align="right">
                            <span align="right" id="total_pagar_divisas_html">$. 0.00</span>
                            <input type="hidden" name="total_pagar_divisas" id="total_pagar_divisas">
                        </p>
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<div class="card-footer text-muted">
    <button type="submit" id="guardar" class="btn btn-primary float-right">Registrar</button>
    <a href="{{route('purchases.index')}}" class="btn btn-light">Cancelar</a>
</div>










