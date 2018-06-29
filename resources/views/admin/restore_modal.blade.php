<div class="modal fade" id="restore_modal" tabindex="-1" role="dialog" aria-labelledby="restore_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="user_restore_confirm_title">{{ trans('strings.crud.restore') }} {{ $word }}</h4>
            </div>
            <div class="modal-body">
                {{ trans('strings.crud.restore_question') }}
            </div>
            <div class="modal-footer">
                {!! Form::open(['route' => $active.'.restore', 'method' => 'patch']) !!}
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('strings.crud.cancel') }}</button>
                    {!! Form::hidden('id', null, ['id' => 'id_restore']) !!}
                    {!! Form::submit(trans('strings.crud.restore'), ['class' => 'btn btn-warning']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<script>
    function restoreModal(id){
        $('#id_restore').val(id);
    }
</script>