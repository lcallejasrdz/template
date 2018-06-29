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