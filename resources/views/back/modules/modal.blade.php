<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Actualizar PIN</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                <input type="hidden" id="id">
                <div class="form-group">
                    {!! Form::label('pin', 'PIN:', ['class' => 'control-label']) !!}
                    {!! Form::text('pin', null, ['class' => 'form-control', 'placeholder' => 'Ingresar PIN', 'required' => 'required', 'autofocus' => 'autofocus']) !!}
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" id="actualizar" class="btn btn-primary">Actualizar PIN</a>
            </div>
        </div>
    </div>
</div>