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
                                            {{ trans('validation.attributes.user_id') }}
                                        </th>
                                        <td>
                                            {{ $item->user_id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('validation.attributes.category_id') }}
                                        </th>
                                        <td>
                                            {{ $item->category_id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('validation.attributes.subcategory_id') }}
                                        </th>
                                        <td>
                                            {{ $item->subcategory_id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('validation.attributes.name') }}
                                        </th>
                                        <td>
                                            {{ $item->name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('validation.attributes.description') }}
                                        </th>
                                        <td>
                                            {!! $item->description !!}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('validation.attributes.price') }}
                                        </th>
                                        <td>
                                            ${{ number_format($item->price, 2) }}
                                        </td>
                                    </tr>
                                    @if($item->percent_buy_id != '' && $item->percent_buy_id != null)
                                        <tr>
                                            <th>
                                                {{ trans('validation.attributes.percent_buy_id') }}
                                            </th>
                                            <td>
                                                {{ $item->percent_buy_id }}
                                            </td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <th>
                                            {{ trans('validation.attributes.product_unity_id') }}
                                        </th>
                                        <td>
                                            {{ $item->product_unity_id }}
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

<div id="tab2" class="tab-pane fade">
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
                                            {{ trans('validation.attributes.event_type_id') }}
                                        </th>
                                        <td>
                                            <ul>
                                                @foreach($product_event_type as $event_type)
                                                    <li>{{ $event_type->event_type_id }}</li>
                                                @endforeach
                                            </ul>
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

<div id="tab3" class="tab-pane fade">
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
                                            {{ trans('validation.attributes.img_1') }}
                                        </th>
                                        <td>
                                            <a href="{{ URL::to('uploads/suppliers/products/'.$item->img_1) }}" target="_blank">
                                                <img src="{{ URL::to('uploads/suppliers/products/'.$item->img_1) }}" alt="Imágen 1" class="img-preview">
                                            </a>
                                        </td>
                                    </tr>
                                    @if($item->img_2 != '' && $item->img_2 != null)
                                        <tr>
                                            <th>
                                                {{ trans('validation.attributes.img_2') }}
                                            </th>
                                            <td>
                                                <a href="{{ URL::to('uploads/suppliers/products/'.$item->img_2) }}" target="_blank">
                                                    <img src="{{ URL::to('uploads/suppliers/products/'.$item->img_2) }}" alt="Imágen 2" class="img-preview">
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
                                    @if($item->img_3 != '' && $item->img_3 != null)
                                        <tr>
                                            <th>
                                                {{ trans('validation.attributes.img_3') }}
                                            </th>
                                            <td>
                                                <a href="{{ URL::to('uploads/suppliers/products/'.$item->img_3) }}" target="_blank">
                                                    <img src="{{ URL::to('uploads/suppliers/products/'.$item->img_3) }}" alt="Imágen 3" class="img-preview">
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
                                    @if($item->img_4 != '' && $item->img_4 != null)
                                        <tr>
                                            <th>
                                                {{ trans('validation.attributes.img_4') }}
                                            </th>
                                            <td>
                                                <a href="{{ URL::to('uploads/suppliers/products/'.$item->img_4) }}" target="_blank">
                                                    <img src="{{ URL::to('uploads/suppliers/products/'.$item->img_4) }}" alt="Imágen 3" class="img-preview">
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
                                    @if($item->img_5 != '' && $item->img_5 != null)
                                        <tr>
                                            <th>
                                                {{ trans('validation.attributes.img_5') }}
                                            </th>
                                            <td>
                                                <a href="{{ URL::to('uploads/suppliers/products/'.$item->img_5) }}" target="_blank">
                                                    <img src="{{ URL::to('uploads/suppliers/products/'.$item->img_5) }}" alt="Imágen 5" class="img-preview">
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="tab4" class="tab-pane fade">
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
                                            {{ trans('validation.attributes.product_type_id') }}
                                        </th>
                                        <td>
                                            {{ $item->product_type_id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('validation.attributes.inventory') }}
                                        </th>
                                        <td>
                                            {{ $item->inventory }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('validation.attributes.min_buy') }}
                                        </th>
                                        <td>
                                            {{ $item->min_buy }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('validation.attributes.preparation_time_id') }}
                                        </th>
                                        <td>
                                            {{ $item->preparation_time_id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('validation.attributes.restocked_time_id') }}
                                        </th>
                                        <td>
                                            {{ $item->restocked_time_id }}
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

<div id="tab5" class="tab-pane fade">
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
                                            {{ trans('validation.attributes.country_id') }}
                                        </th>
                                        <td>
                                            <ul>
                                                @foreach($product_country as $country)
                                                    <li>{{ $country->country_id }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('validation.attributes.state_id') }}
                                        </th>
                                        <td>
                                            <ul>
                                                @foreach($product_state as $state)
                                                    <li>{{ $state->state_id }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('validation.attributes.city_id') }}
                                        </th>
                                        <td>
                                            <ul>
                                                @foreach($product_city as $city)
                                                    <li>{{ $city->city_id }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('validation.attributes.schedules') }}
                                        </th>
                                        <td>
                                            <ul>
                                                @if($item->monday_init != '' && $item->monday_init != null)
                                                    <li>{{ trans('validation.attributes.monday').' '.trans('validation.attributes.from').' '.$item->monday_init.' '.trans('validation.attributes.to').' '.$item->monday_finish.' '.trans('validation.attributes.hrs') }}</li>
                                                @endif
                                                @if($item->tuesday_init != '' && $item->tuesday_init != null)
                                                    <li>{{ trans('validation.attributes.tuesday').' '.trans('validation.attributes.from').' '.$item->tuesday_init.' '.trans('validation.attributes.to').' '.$item->tuesday_finish.' '.trans('validation.attributes.hrs') }}</li>
                                                @endif
                                                @if($item->wednesday_init != '' && $item->wednesday_init != null)
                                                    <li>{{ trans('validation.attributes.wednesday').' '.trans('validation.attributes.from').' '.$item->wednesday_init.' '.trans('validation.attributes.to').' '.$item->wednesday_finish.' '.trans('validation.attributes.hrs') }}</li>
                                                @endif
                                                @if($item->thursday_init != '' && $item->thursday_init != null)
                                                    <li>{{ trans('validation.attributes.thursday').' '.trans('validation.attributes.from').' '.$item->thursday_init.' '.trans('validation.attributes.to').' '.$item->thursday_finish.' '.trans('validation.attributes.hrs') }}</li>
                                                @endif
                                                @if($item->friday_init != '' && $item->friday_init != null)
                                                    <li>{{ trans('validation.attributes.friday').' '.trans('validation.attributes.from').' '.$item->friday_init.' '.trans('validation.attributes.to').' '.$item->friday_finish.' '.trans('validation.attributes.hrs') }}</li>
                                                @endif
                                                @if($item->saturday_init != '' && $item->saturday_init != null)
                                                    <li>{{ trans('validation.attributes.saturday').' '.trans('validation.attributes.from').' '.$item->saturday_init.' '.trans('validation.attributes.to').' '.$item->saturday_finish.' '.trans('validation.attributes.hrs') }}</li>
                                                @endif
                                                @if($item->sunday_init != '' && $item->sunday_init != null)
                                                    <li>{{ trans('validation.attributes.sunday').' '.trans('validation.attributes.from').' '.$item->sunday_init.' '.trans('validation.attributes.to').' '.$item->sunday_finish.' '.trans('validation.attributes.hrs') }}</li>
                                                @endif
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('validation.attributes.days_without_service') }}
                                        </th>
                                        <td>
                                            <ul>
                                                @foreach($days_without_service as $day)
                                                    <li>{{ trans('validation.attributes.from').' '.$day->dates_without_service_from.' '.trans('validation.attributes.to').' '.$day->dates_without_service_to }}</li>
                                                @endforeach
                                            </ul>
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
