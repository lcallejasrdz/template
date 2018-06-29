@extends('admin.layout.principal')

@section('title', '| '.trans('strings.crud.edit').' '.$word)

@section('styles')
@endsection

@section('page-header', trans('strings.crud.edit').' '.$word)

@section('panel-heading')
	<i class="fa fa-pencil fa-fw"></i> {{ trans('strings.crud.edit') }} {{ $word }}
@endsection

@section('content')
	<div class="row">
		<div class="col-sm-12">
			{!! Form::model($item, ['route' => [$active.'.update', $item], 'method' => 'put', 'id' => 'formValidation', 'class' => 'form-horizontal', 'files' => true]) !!}
				<div id="rootwizard">
					<ul>
						@if($active == 'sales' && Sentinel::getUser()->role_id == 4)
							@include('admin.modules.'.$active.'.tabs-status')
						@else
							@include('admin.modules.'.$active.'.tabs')
						@endif
				    </ul>
				    <br>
				    <div class="tab-content">
						@if($active == 'sales' && Sentinel::getUser()->role_id == 4)
							@include('admin.modules.'.$active.'.panels-status')
						@else
							@include('admin.modules.'.$active.'.panels')
						@endif

				        <ul class="pager wizard">
				            <li class="previous">
				                {!! link_to('#', trans('strings.wizard.previous')) !!}
				            </li>
				            <li class="next">
				                {!! link_to('#', trans('strings.wizard.next')) !!}
				            </li>
				            <li class="next finish" style="display:none;">
				                {!! link_to('#', trans('strings.wizard.finish')) !!}
				            </li>
				        </ul>
				    </div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection

@section('scripts')
	@include('admin.modules.'.$active.'.formvalidation.edit')
	{{ Html::script('assets/plugins/bootstrap-wizard/wizard.call.js') }}

    {{-- Dynamic Select --}}
    {{ Html::script("js/dynamic_select.js") }}
    {{-- Dynamic Checkbox --}}
    {{ Html::script("js/dynamic_checkbox.js") }}
@endsection