@extends('layout.principal')

@section('title', '| '.trans($active.'.title'))

@section('styles')
@endsection

@section('content')
	<div class="row">
		<div class="col-sm-12">
            <h1>{{ trans($active.'.title') }}</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<section class="content">
		        <div class="row">
		            <div class="col-lg-12">
		                <ul class="nav  nav-tabs ">
		                    <li class="active">
							    {!! link_to('#tab1', trans($active.'.tabs.general'), ['data-toggle' => 'tab', 'aria-expanded' => 'true']) !!}
							</li>
		                </ul>
		                <div  class="tab-content mar-top">
		                	<div id="tab1" class="tab-pane fade active in">
							    <div class="row">
							        <div class="col-lg-12">
							            <div class="panel">
							                <div class="panel-body">
							                    <div class="col-md-12">
							                        <div class="panel-body">
							                            <div class="table-responsive">
							                                <table class="table table-bordered table-striped">
							                                    <tr>
							                                        <th>
							                                            {{ trans('validation.attributes.first_name') }}
							                                        </th>
							                                        <td>
							                                            {{ $item->first_name }}
							                                        </td>
							                                    </tr>
							                                    <tr>
							                                        <th>
							                                            {{ trans('validation.attributes.last_name') }}
							                                        </th>
							                                        <td>
							                                            {{ $item->last_name }}
							                                        </td>
							                                    </tr>
							                                    <tr>
							                                        <th>
							                                            {{ trans('validation.attributes.gender_id') }}
							                                        </th>
							                                        <td>
							                                            {{ $item->gender_id }}
							                                        </td>
							                                    </tr>
							                                    <tr>
							                                        <th>
							                                            {{ trans('validation.attributes.birthdate') }}
							                                        </th>
							                                        <td>
							                                            {{ $item->birthdate }}
							                                        </td>
							                                    </tr>
							                                    <tr>
							                                        <th>
							                                            {{ trans('validation.attributes.phone') }}
							                                        </th>
							                                        <td>
							                                            {{ $item->phone }}
							                                        </td>
							                                    </tr>
							                                    <tr>
							                                        <th>
							                                            {{ trans('validation.attributes.cellphone') }}
							                                        </th>
							                                        <td>
							                                            {{ $item->cellphone }}
							                                        </td>
							                                    </tr>
							                                    <tr>
							                                        <th>
							                                            {{ trans('validation.attributes.email') }}
							                                        </th>
							                                        <td>
							                                            {{ $item->email }}
							                                        </td>
							                                    </tr>
							                                    <tr>
							                                        <th>
							                                            {{ trans('validation.attributes.status_id') }}
							                                        </th>
							                                        <td>
							                                            {{ $item->status_id }}
							                                        </td>
							                                    </tr>
							                                </table>
							                            </div>
							                        </div>
							                    </div>
							                </div>
							            </div>
							        </div>
							    </div>
							</div>
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