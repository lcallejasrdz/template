<div id="tab1" class="tab-pane fade active in">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel">
                <div class="panel-body">
                    <div class="col-md-12">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>
                                                {{ trans('validation.attributes.name') }}
                                            </th>
                                            <th class="text-right">
                                                {{ trans('validation.attributes.price') }}
                                            </th>
                                            <th class="text-right">
                                                {{ trans('validation.attributes.quantity') }}
                                            </th>
                                            <th class="text-right">
                                                {{ trans('validation.attributes.subtotal') }}
                                            </th>
                                            <th class="text-center">
                                                {{ trans('validation.attributes.status_id') }}
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach($products as $product)
                                            <tr>
                                                <td>
                                                    {{ $product->product_id }}
                                                </td>
                                                <td class="text-right">
                                                    ${{ number_format($product->price, 2) }}
                                                </td>
                                                <td class="text-right">
                                                    {{ $product->quantity }}
                                                </td>
                                                <td class="text-right">
                                                    ${{ number_format($product->price * $product->quantity, 2) }}
                                                </td>
                                                <td class="text-center">
                                                    @if(\App\SaleStatus::where('name', $product->sale_status_id)->first()->id < 3)
                                                        {!! link_to_route($active.'.update-status', trans('strings.crud.update').' '.trans('validation.attributes.to_m').' '.\App\SaleStatus::find(\App\SaleStatus::where('name', $product->sale_status_id)->first()->id + 1)->name, [$product->id], ['class' => 'btn btn-default']) !!}
                                                    @else
                                                        {{ $product->sale_status_id }}
                                                    @endif
                                                </td>
                                            </tr>
                                            @php
                                                $total += $product->price * $product->quantity;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="3" class="text-right">
                                                {{ trans('validation.attributes.total') }}:
                                            </th>
                                            <th class="text-right">
                                                ${{ number_format($total, 2) }}
                                            </th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
