<div class="modal fade" id="model-trash" tabindex="-1" role="dialog" aria-hidden="true"> 
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title"><i class="ion ion-trash-a"></i> <span>{{ trans('app.confirm_title') }}</span></h4> 
            </div> 
            <form role="form">
            <input type="hidden" id="model_name" name="model_name" />
            <input type="hidden" id="model_id" name="id" />
            <div class="modal-body">{{ trans('app.confirm_text') }}</div> 
            <div class="modal-footer"> 
                <button type="button" class="btn btn-danger btn-delete">{{ trans('app.confirm') }}</button> 
            </div> 
            </form>
        </div><!-- /.modal-content --> 
    </div><!-- /.modal-dialog --> 
</div> 