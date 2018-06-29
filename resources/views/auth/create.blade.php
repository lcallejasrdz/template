@extends('layout.principal')

@section('title', '| '.trans('strings.crud.register_of').' '.trans('module_'.$active.'.module_title_s'))

@section('styles')
@endsection

@section('content')
    <div class="row">
		<div class="col-sm-12">
			{!! Form::open(['route' => 'front.'.$active.'.store', 'method' => 'post', 'id' => 'formValidation', 'class' => 'form-horizontal', 'files' => true]) !!}
				<div id="rootwizard">
					<ul>
				        @include('admin.modules.'.$active.'.tabs')
				    </ul>
				    <br>
				    <div class="tab-content">
				        @include('admin.modules.'.$active.'.panels')

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
	@include('admin.modules.'.$active.'.formvalidation.create')
	{{ Html::script('assets/plugins/bootstrap-wizard/wizard.call.js') }}

    {{-- Dynamic Select --}}
    {{ Html::script("js/dynamic_select.js") }}
    {{-- Dynamic Checkbox --}}
    {{ Html::script("js/dynamic_checkbox.js") }}
@endsection