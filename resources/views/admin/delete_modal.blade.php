<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="delete_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="user_delete_confirm_title">{{ trans('strings.crud.delete') }} {{ $word }}</h4>
            </div>
            <div class="modal-body">
                {{ trans('strings.crud.delete_question') }}
            </div>
            <div class="modal-footer">
                {!! Form::open(['route' => $active.'.delete', 'method' => 'delete']) !!}
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('strings.crud.cancel') }}</button>
                    {!! Form::hidden('id', null, ['id' => 'id_delete']) !!}
                    {!! Form::submit(trans('strings.crud.delete'), ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<script>
    function deleteModal(id){
        $('#id_delete').val(id);
    }
</script>