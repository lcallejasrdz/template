<div class="tab-pane" id="tab1">
    <h2 class="hidden">&nbsp;</h2>
    {!! Form::hidden('product_module_id', 1) !!}
    
    <div class="form-group {{ $errors->first('user_id') ? 'has-error' : '' }}">
        {!! Form::label('user_id', trans('validation.attributes.user_id').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('user_id', $catalog_user_id, null, ['id' => 'user_id', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.user_id')]) !!}
            <span class="help-block">{{ $errors->first('user_id', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->first('category_id') ? 'has-error' : '' }}">
        {!! Form::label('category_id', trans('validation.attributes.category_id').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('category_id', $catalog_category_id, null, ['id' => 'category_id', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.category_id')]) !!}
            <span class="help-block">{{ $errors->first('category_id', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->first('subcategory_id') ? 'has-error' : '' }}">
        {!! Form::label('subcategory_id', trans('validation.attributes.subcategory_id').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('subcategory_id', $catalog_subcategory_id, null, ['id' => 'subcategory_id', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.subcategory_id')]) !!}
            <span class="help-block">{{ $errors->first('subcategory_id', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->first('name') ? 'has-error' : '' }}">
        {!! Form::label('name', trans('validation.attributes.name').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('name', old('name'), ['id' => 'name', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.name')]) !!}
            <span class="help-block">{{ $errors->first('name', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->first('description') ? 'has-error' : '' }}">
        {!! Form::label('description', trans('validation.attributes.description').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::textarea('description_content', old('description'), ['id' => 'description_content', 'class' => 'form-control ckeditorcontent', 'placeholder' => trans('validation.attributes.description')]) !!}
            {!! Form::hidden('description', old('description'), ['id' => 'description']) !!}
            <span class="help-block">{{ $errors->first('description', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->first('price') ? 'has-error' : '' }}">
        {!! Form::label('price', trans('validation.attributes.price').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('price', old('price'), ['id' => 'price', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.price')]) !!}
            <span class="help-block">{{ $errors->first('price', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->first('percent_buy_id') ? 'has-error' : '' }}">
        {!! Form::label('percent_buy_id', trans('validation.attributes.percent_buy_id'), ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('percent_buy_id', $catalog_percent_buy_id, null, ['id' => 'percent_buy_id', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.percent_buy_id')]) !!}
            <span class="help-block">{{ $errors->first('percent_buy_id', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->first('product_unity_id') ? 'has-error' : '' }}">
        {!! Form::label('product_unity_id', trans('validation.attributes.product_unity_id').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('product_unity_id', $catalog_product_unity_id, null, ['id' => 'product_unity_id', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.product_unity_id')]) !!}
            <span class="help-block">{{ $errors->first('product_unity_id', ':message') }}</span>
        </div>
    </div>
</div>

<div class="tab-pane" id="tab2">
    <h2 class="hidden">&nbsp;</h2>
    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            {!! Form::button(trans('validation.attributes.check_events'), ['id' => 'check_event_types', 'class' => 'btn btn-success']) !!}
            {!! Form::button(trans('validation.attributes.uncheck_events'), ['id' => 'uncheck_event_types', 'class' => 'btn btn-warning']) !!}
        </div>
    </div>

    <div class="form-group {{ $errors->first('event_type_id') ? 'has-error' : '' }}">
        {!! Form::label('event_type_id', trans('validation.attributes.event_type_id').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10" id="checkbox_evnet_type_container">
            @foreach($catalog_event_type_id as $event_type)
                <div class="checkbox">
                    <label>
                        {!! Form::checkbox('event_type_id[]', $event_type->id, true) !!} {{ $event_type->name }}
                    </label>
                </div>
            @endforeach
            <span class="help-block">{{ $errors->first('event_type_id', ':message') }}</span>
        </div>
    </div>
</div>

<div class="tab-pane" id="tab3">
    <h2 class="hidden">&nbsp;</h2>
    <div class="form-group {{ $errors->first('img_1') ? 'has-error' : '' }}">
        {!! Form::label('img_1', trans('validation.attributes.img_1').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::file('img_1', ['id' => 'img_1']) !!}
            @isset($item)
                @if($item->img_1 != '' && $item->img_1 != null)
                    <p class="help-block">{{ trans('strings.help.img_1') }}</p>
                    <p class="help-block">{!! link_to('uploads/suppliers/products/'.$item->img_1, trans('strings.help.file'), ['target' => '_blank']) !!}</p>
                @endif
            @endisset
            <span class="help-block">{{ $errors->first('img_1', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->first('img_2') ? 'has-error' : '' }}">
        {!! Form::label('img_2', trans('validation.attributes.img_2'), ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::file('img_2', ['id' => 'img_2']) !!}
            @isset($item)
                @if($item->img_2 != '' && $item->img_2 != null)
                    <p class="help-block">{{ trans('strings.help.img_2') }}</p>
                    <p class="help-block">{!! link_to('uploads/suppliers/products/'.$item->img_2, trans('strings.help.file'), ['target' => '_blank']) !!}</p>
                @endif
            @endisset
            <span class="help-block">{{ $errors->first('img_2', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->first('img_3') ? 'has-error' : '' }}">
        {!! Form::label('img_3', trans('validation.attributes.img_3'), ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::file('img_3', ['id' => 'img_3']) !!}
            @isset($item)
                @if($item->img_3 != '' && $item->img_3 != null)
                    <p class="help-block">{{ trans('strings.help.img_3') }}</p>
                    <p class="help-block">{!! link_to('uploads/suppliers/products/'.$item->img_3, trans('strings.help.file'), ['target' => '_blank']) !!}</p>
                @endif
            @endisset
            <span class="help-block">{{ $errors->first('img_3', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->first('img_4') ? 'has-error' : '' }}">
        {!! Form::label('img_4', trans('validation.attributes.img_4'), ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::file('img_4', ['id' => 'img_4']) !!}
            @isset($item)
                @if($item->img_4 != '' && $item->img_4 != null)
                    <p class="help-block">{{ trans('strings.help.img_4') }}</p>
                    <p class="help-block">{!! link_to('uploads/suppliers/products/'.$item->img_4, trans('strings.help.file'), ['target' => '_blank']) !!}</p>
                @endif
            @endisset
            <span class="help-block">{{ $errors->first('img_4', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->first('img_5') ? 'has-error' : '' }}">
        {!! Form::label('img_5', trans('validation.attributes.img_5'), ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::file('img_5', ['id' => 'img_5']) !!}
            @isset($item)
                @if($item->img_5 != '' && $item->img_5 != null)
                    <p class="help-block">{{ trans('strings.help.img_5') }}</p>
                    <p class="help-block">{!! link_to('uploads/suppliers/products/'.$item->img_5, trans('strings.help.file'), ['target' => '_blank']) !!}</p>
                @endif
            @endisset
            <span class="help-block">{{ $errors->first('img_5', ':message') }}</span>
        </div>
    </div>
</div>

<div class="tab-pane" id="tab4">
    <h2 class="hidden">&nbsp;</h2>
    <div class="form-group {{ $errors->first('product_type_id') ? 'has-error' : '' }}">
        {!! Form::label('product_type_id', trans('validation.attributes.product_type_id').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('product_type_id', $catalog_product_type_id, null, ['id' => 'product_type_id', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.product_type_id')]) !!}
            <span class="help-block">{{ $errors->first('product_type_id', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->first('inventory') ? 'has-error' : '' }}">
        {!! Form::label('inventory', trans('validation.attributes.inventory').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('inventory', old('inventory'), ['id' => 'inventory', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.inventory')]) !!}
            <span class="help-block">{{ $errors->first('inventory', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->first('min_buy') ? 'has-error' : '' }}">
        {!! Form::label('min_buy', trans('validation.attributes.min_buy').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('min_buy', old('min_buy'), ['id' => 'min_buy', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.min_buy')]) !!}
            <span class="help-block">{{ $errors->first('min_buy', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->first('preparation_time_id') ? 'has-error' : '' }}">
        {!! Form::label('preparation_time_id', trans('validation.attributes.preparation_time_id').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('preparation_time_id', $catalog_preparation_time_id, null, ['id' => 'preparation_time_id', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.preparation_time_id')]) !!}
            <span class="help-block">{{ $errors->first('preparation_time_id', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->first('restocked_time_id') ? 'has-error' : '' }}">
        {!! Form::label('restocked_time_id', trans('validation.attributes.restocked_time_id').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('restocked_time_id', $catalog_restocked_time_id, null, ['id' => 'restocked_time_id', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.restocked_time_id')]) !!}
            <span class="help-block">{{ $errors->first('restocked_time_id', ':message') }}</span>
        </div>
    </div>
</div>

<div class="tab-pane" id="tab5">
    <h2 class="hidden">&nbsp;</h2>
    <div class="form-group {{ $errors->first('country_id') ? 'has-error' : '' }}">
        {!! Form::label('country_id', trans('validation.attributes.country_id').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10" id="checkbox_countries_container">
            @foreach($catalog_country_id as $country)
                <div class="checkbox">
                    <label>
                        @if(isset($item))
                            @if(\App\ProductCountry::where('product_id', $item->id)->where('country_id', $country->id)->count() > 0)
                                {!! Form::checkbox('country_id[]', $country->id, true, ['onChange' => 'getCountriesCheck();']) !!} {{ $country->name }}
                            @else
                                {!! Form::checkbox('country_id[]', $country->id, false, ['onChange' => 'getCountriesCheck();']) !!} {{ $country->name }}
                            @endif
                        @else
                            {!! Form::checkbox('country_id[]', $country->id, false, ['onChange' => 'getCountriesCheck();']) !!} {{ $country->name }}
                        @endif
                    </label>
                </div>
            @endforeach
            <span class="help-block">{{ $errors->first('country_id', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->first('state_id') ? 'has-error' : '' }}">
        {!! Form::label('state_id', trans('validation.attributes.state_id').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10" id="checkbox_states_container">
            @isset($item)
                @foreach($catalog_state_id as $state)
                    <div class="checkbox">
                        <label>
                            @if(\App\ProductState::where('product_id', $item->id)->where('state_id', $state->id)->count() > 0)
                                {!! Form::checkbox('state_id[]', $state->id, true, ['onChange' => 'getStatesCheck();']) !!} {{ $state->name }}
                            @else
                                {!! Form::checkbox('state_id[]', $state->id, false, ['onChange' => 'getStatesCheck();']) !!} {{ $state->name }}
                            @endif
                        </label>
                    </div>
                @endforeach
            @endisset
            {!! Form::hidden('states_res', '', ['id' => 'states_res']) !!}
            <span class="help-block">{{ $errors->first('state_id', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->first('city_id') ? 'has-error' : '' }}">
        {!! Form::label('city_id', trans('validation.attributes.city_id').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10" id="checkbox_cities_container">
            @isset($item)
                @foreach($catalog_city_id as $city)
                    <div class="checkbox">
                        <label>
                            @if(\App\ProductCity::where('product_id', $item->id)->where('city_id', $city->id)->count() > 0)
                                {!! Form::checkbox('city_id[]', $city->id, true, ['onChange' => 'getCitiesCheck();']) !!} {{ $city->name }}
                            @else
                                {!! Form::checkbox('city_id[]', $city->id, false, ['onChange' => 'getCitiesCheck();']) !!} {{ $city->name }}
                            @endif
                        </label>
                    </div>
                @endforeach
            @endisset
            {!! Form::hidden('cities_res', '', ['id' => 'cities_res']) !!}
            <span class="help-block">{{ $errors->first('city_id', ':message') }}</span>
        </div>
    </div>

    <div>
        {!! Form::label('schedules', trans('validation.attributes.schedules').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            <div class="table-responsive">
                <table class="table table-hover table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">{{ trans('validation.attributes.day') }}</th>
                            <th class="text-center">{{ trans('validation.attributes.from') }}</th>
                            <th class="text-center">{{ trans('validation.attributes.to') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="text-center">{{ trans('validation.attributes.monday') }}</th>
                            <td>
                                <div class="form-group {{ $errors->first('monday_init') ? 'has-error' : '' }}">
                                    <div class="col-sm-12">
                                        {!! Form::text('monday_init', old('monday_init'), ['id' => 'monday_init', 'class' => 'form-control timepicker', 'placeholder' => trans('validation.attributes.from'), 'readonly']) !!}
                                        <span class="help-block">{{ $errors->first('monday_init', ':message') }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="form-group {{ $errors->first('monday_finish') ? 'has-error' : '' }}">
                                    <div class="col-sm-12">
                                        {!! Form::text('monday_finish', old('monday_finish'), ['id' => 'monday_finish', 'class' => 'form-control timepicker', 'placeholder' => trans('validation.attributes.to'), 'readonly']) !!}
                                        <span class="help-block">{{ $errors->first('monday_finish', ':message') }}</span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-center">{{ trans('validation.attributes.tuesday') }}</th>
                            <td>
                                <div class="form-group {{ $errors->first('tuesday_init') ? 'has-error' : '' }}">
                                    <div class="col-sm-12">
                                        {!! Form::text('tuesday_init', old('tuesday_init'), ['id' => 'tuesday_init', 'class' => 'form-control timepicker', 'placeholder' => trans('validation.attributes.from'), 'readonly']) !!}
                                        <span class="help-block">{{ $errors->first('tuesday_init', ':message') }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="form-group {{ $errors->first('tuesday_finish') ? 'has-error' : '' }}">
                                    <div class="col-sm-12">
                                        {!! Form::text('tuesday_finish', old('tuesday_finish'), ['id' => 'tuesday_finish', 'class' => 'form-control timepicker', 'placeholder' => trans('validation.attributes.to'), 'readonly']) !!}
                                        <span class="help-block">{{ $errors->first('tuesday_finish', ':message') }}</span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-center">{{ trans('validation.attributes.wednesday') }}</th>
                            <td>
                                <div class="form-group {{ $errors->first('wednesday_init') ? 'has-error' : '' }}">
                                    <div class="col-sm-12">
                                        {!! Form::text('wednesday_init', old('wednesday_init'), ['id' => 'wednesday_init', 'class' => 'form-control timepicker', 'placeholder' => trans('validation.attributes.from'), 'readonly']) !!}
                                        <span class="help-block">{{ $errors->first('wednesday_init', ':message') }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="form-group {{ $errors->first('wednesday_finish') ? 'has-error' : '' }}">
                                    <div class="col-sm-12">
                                        {!! Form::text('wednesday_finish', old('wednesday_finish'), ['id' => 'wednesday_finish', 'class' => 'form-control timepicker', 'placeholder' => trans('validation.attributes.to'), 'readonly']) !!}
                                        <span class="help-block">{{ $errors->first('wednesday_finish', ':message') }}</span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-center">{{ trans('validation.attributes.thursday') }}</th>
                            <td>
                                <div class="form-group {{ $errors->first('thursday_init') ? 'has-error' : '' }}">
                                    <div class="col-sm-12">
                                        {!! Form::text('thursday_init', old('thursday_init'), ['id' => 'thursday_init', 'class' => 'form-control timepicker', 'placeholder' => trans('validation.attributes.from'), 'readonly']) !!}
                                        <span class="help-block">{{ $errors->first('thursday_init', ':message') }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="form-group {{ $errors->first('thursday_finish') ? 'has-error' : '' }}">
                                    <div class="col-sm-12">
                                        {!! Form::text('thursday_finish', old('thursday_finish'), ['id' => 'thursday_finish', 'class' => 'form-control timepicker', 'placeholder' => trans('validation.attributes.to'), 'readonly']) !!}
                                        <span class="help-block">{{ $errors->first('thursday_finish', ':message') }}</span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-center">{{ trans('validation.attributes.friday') }}</th>
                            <td>
                                <div class="form-group {{ $errors->first('friday_init') ? 'has-error' : '' }}">
                                    <div class="col-sm-12">
                                        {!! Form::text('friday_init', old('friday_init'), ['id' => 'friday_init', 'class' => 'form-control timepicker', 'placeholder' => trans('validation.attributes.from'), 'readonly']) !!}
                                        <span class="help-block">{{ $errors->first('friday_init', ':message') }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="form-group {{ $errors->first('friday_finish') ? 'has-error' : '' }}">
                                    <div class="col-sm-12">
                                        {!! Form::text('friday_finish', old('friday_finish'), ['id' => 'friday_finish', 'class' => 'form-control timepicker', 'placeholder' => trans('validation.attributes.to'), 'readonly']) !!}
                                        <span class="help-block">{{ $errors->first('friday_finish', ':message') }}</span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-center">{{ trans('validation.attributes.saturday') }}</th>
                            <td>
                                <div class="form-group {{ $errors->first('saturday_init') ? 'has-error' : '' }}">
                                    <div class="col-sm-12">
                                        {!! Form::text('saturday_init', old('saturday_init'), ['id' => 'saturday_init', 'class' => 'form-control timepicker', 'placeholder' => trans('validation.attributes.from'), 'readonly']) !!}
                                        <span class="help-block">{{ $errors->first('saturday_init', ':message') }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="form-group {{ $errors->first('saturday_finish') ? 'has-error' : '' }}">
                                    <div class="col-sm-12">
                                        {!! Form::text('saturday_finish', old('saturday_finish'), ['id' => 'saturday_finish', 'class' => 'form-control timepicker', 'placeholder' => trans('validation.attributes.to'), 'readonly']) !!}
                                        <span class="help-block">{{ $errors->first('saturday_finish', ':message') }}</span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-center">{{ trans('validation.attributes.sunday') }}</th>
                            <td>
                                <div class="form-group {{ $errors->first('sunday_init') ? 'has-error' : '' }}">
                                    <div class="col-sm-12">
                                        {!! Form::text('sunday_init', old('sunday_init'), ['id' => 'sunday_init', 'class' => 'form-control timepicker', 'placeholder' => trans('validation.attributes.from'), 'readonly']) !!}
                                        <span class="help-block">{{ $errors->first('sunday_init', ':message') }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="form-group {{ $errors->first('sunday_finish') ? 'has-error' : '' }}">
                                    <div class="col-sm-12">
                                        {!! Form::text('sunday_finish', old('sunday_finish'), ['id' => 'sunday_finish', 'class' => 'form-control timepicker', 'placeholder' => trans('validation.attributes.to'), 'readonly']) !!}
                                        <span class="help-block">{{ $errors->first('sunday_finish', ':message') }}</span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="dob" class="col-sm-2 control-label"></label>
        <div class="col-sm-10">
            <!-- Create a hidden field which is combined by 3 fields above -->
            {!! Form::hidden('dob', old('dob'), ['id' => 'dob']) !!}
        </div>
    </div>

    <div>
        {!! Form::label('days_without_service', trans('validation.attributes.days_without_service'), ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            <div class="col-sm-12 col-md-6 form-group {{ $errors->first('days_without_service_from') ? 'has-error' : '' }}">
                <div class="col-sm-12">
                    {!! Form::text('days_without_service_from', old('days_without_service_from'), ['id' => 'days_without_service_from', 'class' => 'form-control datepicker', 'placeholder' => trans('validation.attributes.from'), 'readonly']) !!}
                    <span class="help-block">{{ $errors->first('days_without_service_from', ':message') }}</span>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 form-group {{ $errors->first('days_without_service_to') ? 'has-error' : '' }}">
                <div class="col-sm-12">
                    {!! Form::text('days_without_service_to', old('days_without_service_to'), ['id' => 'days_without_service_to', 'class' => 'form-control datepicker', 'placeholder' => trans('validation.attributes.to'), 'readonly']) !!}
                    <span class="help-block">{{ $errors->first('days_without_service_to', ':message') }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2 text-right">
            {!! Form::button(trans('validation.attributes.add_date_without_service'), ['id' => 'add_date_without_service', 'class' => 'btn btn-success', 'disabled']) !!}
        </div>
    </div>

    <div>
        <div class="col-sm-10 col-sm-offset-2">
            <div class="table-responsive">
                <table class="table table-hover table-striped table-hover table-bordered" id="tableDatesWithoutService">
                    <thead>
                        <tr>
                            <th class="text-center">{{ trans('validation.attributes.from') }}</th>
                            <th class="text-center">{{ trans('validation.attributes.to') }}</th>
                            <th class="text-center">{{ trans('validation.attributes.delete') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($item)
                            @foreach($catalog_date_without_service as $date)
                                <tr>
                                    <td class="text-center">
                                        {!! Form::hidden('dates_without_service_from[]', $date->dates_without_service_from) !!}{{ $date->dates_without_service_from }}
                                    </td>
                                    <td class="text-center">
                                        {!! Form::hidden('dates_without_service_to[]', $date->dates_without_service_to) !!}{{ $date->dates_without_service_to }}
                                    </td>
                                    <td class="text-center">
                                        {!! Form::button(trans('validation.attributes.delete'), ['class' => 'btn btn-danger', 'onclick' => 'deleteDaysWithoutService(this)']) !!}
                                    </td>
                                </tr>
                            @endforeach
                        @endisset
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="form-group {{ $errors->first('status_id') ? 'has-error' : '' }}">
        {!! Form::label('status_id', trans('validation.attributes.status_id').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('status_id', $catalog_status_id, null, ['id' => 'status_id', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.status_id')]) !!}
            <span class="help-block">{{ $errors->first('status_id', ':message') }}</span>
        </div>
    </div>
</div>
