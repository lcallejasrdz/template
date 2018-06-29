<div class="table-responsive">
    <table class="table table-inverse table-hover table-striped table-bordered" id="datatables">
        <thead>
            <tr>
                @foreach($columns as $column)
                    <th>{{ $column }}</th>
                @endforeach
            </tr>
        </thead>
        @php
            $i = 1;
            $len = count($select);
        @endphp
        <tbody data-active="{{ $active }}" data-model="{{ $model }}" data-view="{{ $view }}" data-actions="{{ $actions }}" data-rows="@php
              foreach($select as $sel) {
                if($i!=$len) echo $sel.','; else echo $sel; $i++;
              }
          @endphp">
        </tbody>
    </table>
</div>
