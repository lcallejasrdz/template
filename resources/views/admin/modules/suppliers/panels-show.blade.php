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
                                            {{ $item->first_name }} {{ $item->last_name }}
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
                                    @if($item->web_site != '' && $item->web_site != null)
                                        <tr>
                                            <th>
                                                {{ trans('validation.attributes.web_site') }}
                                            </th>
                                            <td>
                                                <a href="{{ $item->web_site }}" target="_blank">{{ $item->web_site }}</a>
                                            </td>
                                        </tr>
                                    @endif
                                    @if($item->logo != '' && $item->logo != null)
                                        <tr>
                                            <th>
                                                {{ trans('validation.attributes.logo') }}
                                            </th>
                                            <td>
                                                <img src="{{ URL::to('uploads/suppliers/logos/'.$item->logo) }}" alt="Logo" class="img-preview">
                                            </td>
                                        </tr>
                                    @endif
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

<div id="tab2" class="tab-pane fade">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel">
                <div class="panel-body">
                    <div class="col-md-12">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <th>{{ trans('validation.attributes.contact_first_name') }}</th>
                                        <th>{{ trans('validation.attributes.contact_last_name') }}</th>
                                        <th>{{ trans('validation.attributes.contact_job') }}</th>
                                        <th>{{ trans('validation.attributes.contact_email') }}</th>
                                        <th>{{ trans('validation.attributes.contact_phone') }}</th>
                                        <th>{{ trans('validation.attributes.contact_cellphone') }}</th>
                                    </thead>
                                    <tbody>
                                        @foreach($catalog_contacts as $contact)
                                            <tr>
                                                <td>{{ $contact->first_name }}</td>
                                                <td>{{ $contact->last_name }}</td>
                                                <td>{{ $contact->job }}</td>
                                                <td>{{ $contact->email }}</td>
                                                <td>{{ $contact->phone }}</td>
                                                <td>{{ $contact->cellphone }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
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
                                            {{ trans('validation.attributes.country_id') }}
                                        </th>
                                        <td>
                                            {{ $item->country_id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('validation.attributes.state_id') }}
                                        </th>
                                        <td>
                                            {{ $item->state_id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('validation.attributes.city_id') }}
                                        </th>
                                        <td>
                                            {{ $item->city_id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('validation.attributes.municipality') }}
                                        </th>
                                        <td>
                                            {{ $item->municipality }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('validation.attributes.colony') }}
                                        </th>
                                        <td>
                                            {{ $item->colony }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('validation.attributes.street') }}
                                        </th>
                                        <td>
                                            {{ $item->street }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('validation.attributes.no_ext') }}
                                        </th>
                                        <td>
                                            {{ $item->no_ext }}
                                        </td>
                                    </tr>
                                    @if($item->no_int != '' && $item->no_int != null)
                                        <tr>
                                            <th>
                                                {{ trans('validation.attributes.no_int') }}
                                            </th>
                                            <td>
                                                {{ $item->no_int }}
                                            </td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <th>
                                            {{ trans('validation.attributes.postal_code') }}
                                        </th>
                                        <td>
                                            {{ $item->postal_code }}
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
                                            {{ trans('validation.attributes.rfc') }}
                                        </th>
                                        <td>
                                            {{ $item->rfc }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('validation.attributes.social_reason') }}
                                        </th>
                                        <td>
                                            {{ $item->social_reason }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('validation.attributes.commercial_name') }}
                                        </th>
                                        <td>
                                            {{ $item->commercial_name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('validation.attributes.person_type_id') }}
                                        </th>
                                        <td>
                                            {{ $item->person_type_id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('validation.attributes.legal_representant') }}
                                        </th>
                                        <td>
                                            {{ $item->legal_representant }}
                                        </td>
                                    </tr>
                                    @if($item->date_public_writing != '' && $item->date_public_writing != null)
                                        <tr>
                                            <th>
                                                {{ trans('validation.attributes.date_public_writing') }}
                                            </th>
                                            <td>
                                                {{ $item->date_public_writing }}
                                            </td>
                                        </tr>
                                    @endif
                                    @if($item->no_public_notary != '' && $item->no_public_notary != null)
                                        <tr>
                                            <th>
                                                {{ trans('validation.attributes.no_public_notary') }}
                                            </th>
                                            <td>
                                                {{ $item->no_public_notary }}
                                            </td>
                                        </tr>
                                    @endif
                                    @if($item->entity_public_notary != '' && $item->entity_public_notary != null)
                                        <tr>
                                            <th>
                                                {{ trans('validation.attributes.entity_public_notary') }}
                                            </th>
                                            <td>
                                                {{ $item->entity_public_notary }}
                                            </td>
                                        </tr>
                                    @endif
                                    @if($item->inscription_folio != '' && $item->inscription_folio != null)
                                        <tr>
                                            <th>
                                                {{ trans('validation.attributes.inscription_folio') }}
                                            </th>
                                            <td>
                                                {{ $item->inscription_folio }}
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

<div id="tab5" class="tab-pane fade">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel">
                <div class="panel-body">
                    <div class="col-md-12">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    @if($item->constitutive_act != '' && $item->constitutive_act != null)
                                        <tr>
                                            <th>
                                                {{ trans('validation.attributes.constitutive_act') }}
                                            </th>
                                            <td>
                                                <a href="{{ URL::to('uploads/suppliers/documents/'.$item->constitutive_act) }}" target="_blank">Descargar</a>
                                            </td>
                                        </tr>
                                    @endif
                                    @if($item->hacienda_register != '' && $item->hacienda_register != null)
                                        <tr>
                                            <th>
                                                {{ trans('validation.attributes.hacienda_register') }}
                                            </th>
                                            <td>
                                                <a href="{{ URL::to('uploads/suppliers/documents/'.$item->hacienda_register) }}" target="_blank">Descargar</a>
                                            </td>
                                        </tr>
                                    @endif
                                    @if($item->legal_representative_identification != '' && $item->legal_representative_identification != null)
                                        <tr>
                                            <th>
                                                {{ trans('validation.attributes.legal_representative_identification') }}
                                            </th>
                                            <td>
                                                <a href="{{ URL::to('uploads/suppliers/documents/'.$item->legal_representative_identification) }}" target="_blank">Descargar</a>
                                            </td>
                                        </tr>
                                    @endif
                                    @if($item->address_proof != '' && $item->address_proof != null)
                                        <tr>
                                            <th>
                                                {{ trans('validation.attributes.address_proof') }}
                                            </th>
                                            <td>
                                                <a href="{{ URL::to('uploads/suppliers/documents/'.$item->address_proof) }}" target="_blank">Descargar</a>
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

<div id="tab6" class="tab-pane fade">
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
                                            {{ trans('validation.attributes.email_paypal') }}
                                        </th>
                                        <td>
                                            {{ $item->email_paypal }}
                                        </td>
                                    </tr>
                                    @if($item->policies != '' && $item->policies != null)
                                        <tr>
                                            <th>
                                                {{ trans('validation.attributes.policies') }}
                                            </th>
                                            <td>
                                                <a href="{{ URL::to('uploads/suppliers/documents/'.$item->policies) }}" target="_blank">Descargar</a>
                                            </td>
                                        </tr>
                                    @endif
                                    @if($item->membership_id != '' && $item->membership_id != null)
                                        <tr>
                                            <th>
                                                {{ trans('validation.attributes.membership_id') }}
                                            </th>
                                            <td>
                                                {{ $item->membership_id }}
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
