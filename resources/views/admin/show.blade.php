@extends('admin.layout.principal')

@section('title', '| '.$word)

@section('styles')
@endsection

@section('page-header', $word)

@section('panel-heading')
	<i class="fa fa-info fa-fw"></i> {{ $word }}
@endsection

@section('content')
	<div class="row">
		<div class="col-sm-12">
			<section class="content">
		        <div class="row">
		            <div class="col-lg-12">
		                <ul class="nav  nav-tabs ">
		                    @include('admin.modules.'.$active.'.tabs-show')
		                </ul>
		                <div  class="tab-content mar-top">
		                	@include('admin.modules.'.$active.'.panels-show')
		                </div>
		            </div>
		        </div>
		    </section>
		</div>
	</div>
@endsection

@section('scripts')
	{{ Html::script('assets/plugins/bootstrap-wizard/wizard.call.js') }}
@endsection