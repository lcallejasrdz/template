@extends('admin.layout.principal')

@section('title', '| '.trans('strings.crud.restore').' '.$word)

@section('styles')
@endsection

@section('page-header', trans('strings.crud.restore').' '.$word)

@section('panel-heading')
	<i class="fa fa-list fa-fw"></i> {{ trans('strings.crud.restore') }} {{ $word }}
@endsection

@section('content')
	@include('admin.modules.datatable')
	@include('admin.restore_modal')
@endsection

@section('scripts')
	{{-- DataTables --}}
	@include('plugins.datatables.dataTables')
@endsection