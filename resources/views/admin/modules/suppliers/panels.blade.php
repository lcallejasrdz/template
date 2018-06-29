<div class="tab-pane" id="tab1">
    <h2 class="hidden">&nbsp;</h2>
    <div class="form-group {{ $errors->first('first_name') ? 'has-error' : '' }}">
        {!! Form::label('first_name', trans('validation.attributes.first_name').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('first_name', old('first_name'), ['id' => 'first_name', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.first_name')]) !!}
            <span class="help-block">{{ $errors->first('first_name', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->first('last_name') ? 'has-error' : '' }}">
        {!! Form::label('last_name', trans('validation.attributes.last_name').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('last_name', old('last_name'), ['id' => 'last_name', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.last_name')]) !!}
            <span class="help-block">{{ $errors->first('last_name', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->first('email') ? 'has-error' : '' }}">
        {!! Form::label('email', trans('validation.attributes.email').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('email', old('email'), ['id' => 'email', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.email')]) !!}
            <span class="help-block">{{ $errors->first('email', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->first('password') ? 'has-error' : '' }}">
        {!! Form::label('password', trans('validation.attributes.password').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::password('password', ['id' => 'password', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.password')]) !!}
            @if(isset($item))
                <p class="help-block">{{ trans('strings.help.password') }}</p>
            @endif
            <span class="help-block">{{ $errors->first('password', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->first('password_confirm') ? 'has-error' : '' }}">
        {!! Form::label('password_confirm', trans('validation.attributes.password_confirm').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::password('password_confirm', ['id' => 'password_confirm', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.password_confirm')]) !!}
            @if(isset($item))
                <p class="help-block">{{ trans('strings.help.password') }}</p>
            @endif
            <span class="help-block">{{ $errors->first('password_confirm', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->first('phone') ? 'has-error' : '' }}">
        {!! Form::label('phone', trans('validation.attributes.phone').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('phone', old('phone'), ['id' => 'phone', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.phone')]) !!}
            <span class="help-block">{{ $errors->first('phone', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->first('cellphone') ? 'has-error' : '' }}">
        {!! Form::label('cellphone', trans('validation.attributes.cellphone').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('cellphone', old('cellphone'), ['id' => 'cellphone', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.cellphone')]) !!}
            <span class="help-block">{{ $errors->first('cellphone', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->first('web_site') ? 'has-error' : '' }}">
        {!! Form::label('web_site', trans('validation.attributes.web_site'), ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('web_site', old('web_site'), ['id' => 'web_site', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.web_site')]) !!}
            <span class="help-block">{{ $errors->first('web_site', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->first('logo') ? 'has-error' : '' }}">
        {!! Form::label('logo', trans('validation.attributes.logo').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::file('logo', ['id' => 'logo']) !!}
            @if(isset($itme) && $item->logo != '' && $item->logo != null)
                <p class="help-block">{!! link_to('uploads/suppliers/logos/'.$item->logo, trans('strings.help.file'), ['target' => '_blank']) !!}</p>
                <p class="help-block">{{ trans('strings.help.logo') }}</p>
            @endif
            <span class="help-block">{{ $errors->first('logo', ':message') }}</span>
        </div>
    </div>
</div>

<div class="tab-pane" id="tab2">
    <h2 class="hidden">&nbsp;</h2>
    <div class="row">
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>{{ trans('validation.attributes.contact_first_name') }}</th>
                            <th>{{ trans('validation.attributes.contact_last_name') }}</th>
                            <th>{{ trans('validation.attributes.contact_job') }}</th>
                            <th>{{ trans('validation.attributes.contact_email') }}</th>
                            <th>{{ trans('validation.attributes.contact_phone') }}</th>
                            <th>{{ trans('validation.attributes.contact_cellphone') }}</th>
                            <th>{{ trans('validation.attributes.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody id="contact_table_body">
                        @if(isset($catalog_contacts) && count($catalog_contacts) > 0)
                            @php
                                $i = 0;
                            @endphp
                            @foreach($catalog_contacts as $contact)
                                @if($i == 0)
                                    <tr id="formContactSupplier" class="formContactSupplier">
                                @else
                                    <tr class="formContactSupplier" data-book-index="{{ $i }}">
                                @endif
                                    <td>
                                        <div class="form-group {{ $errors->first('contact_first_name') ? 'has-error' : '' }}">
                                            <div class="col-sm-12">
                                                {!! Form::text('contact_first_name[]', old('contact_first_name[]', $contact->first_name), ['id' => 'contact_first_name', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.contact_first_name').' *']) !!}
                                                <span class="help-block">{{ $errors->first('contact_first_name', ':message') }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group {{ $errors->first('contact_last_name') ? 'has-error' : '' }}">
                                            <div class="col-sm-10">
                                                {!! Form::text('contact_last_name[]', old('contact_last_name[]', $contact->last_name), ['id' => 'contact_last_name', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.contact_last_name').' *']) !!}
                                                <span class="help-block">{{ $errors->first('contact_last_name', ':message') }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group {{ $errors->first('contact_job') ? 'has-error' : '' }}">
                                            <div class="col-sm-10">
                                                {!! Form::text('contact_job[]', old('contact_job[]', $contact->job), ['id' => 'contact_job', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.contact_job').' *']) !!}
                                                <span class="help-block">{{ $errors->first('contact_job', ':message') }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group {{ $errors->first('contact_email') ? 'has-error' : '' }}">
                                            <div class="col-sm-10">
                                                {!! Form::text('contact_email[]', old('contact_email[]', $contact->email), ['id' => 'contact_email', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.contact_email').' *']) !!}
                                                <span class="help-block">{{ $errors->first('contact_email', ':message') }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group {{ $errors->first('contact_phone') ? 'has-error' : '' }}">
                                            <div class="col-sm-10">
                                                {!! Form::text('contact_phone[]', old('contact_phone[]', $contact->phone), ['id' => 'contact_phone', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.contact_phone').' *']) !!}
                                                <span class="help-block">{{ $errors->first('contact_phone', ':message') }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group {{ $errors->first('contact_cellphone') ? 'has-error' : '' }}">
                                            <div class="col-sm-10">
                                                {!! Form::text('contact_cellphone[]', old('contact_cellphone[]', $contact->cellphone), ['id' => 'contact_cellphone', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.contact_cellphone')]) !!}
                                                <span class="help-block">{{ $errors->first('contact_cellphone', ':message') }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if($i == 0)
                                            <div class="form-group hidden" id="divBtnDelete">
                                        @else
                                            <div class="form-group" id="divBtnDelete">
                                        @endif
                                            <div class="col-sm-12 text-right">
                                                {!! Form::button(trans('strings.crud.delete'), ['class' => 'btn btn-danger delete_contact', 'onclick' => 'deleteContact(this);']) !!}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        @else
                            <tr id="formContactSupplier" class="formContactSupplier">
                                <td>
                                    <div class="form-group {{ $errors->first('contact_first_name') ? 'has-error' : '' }}">
                                        <div class="col-sm-12">
                                            {!! Form::text('contact_first_name[]', old('contact_first_name[]'), ['id' => 'contact_first_name', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.contact_first_name').' *']) !!}
                                            <span class="help-block">{{ $errors->first('contact_first_name', ':message') }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group {{ $errors->first('contact_last_name') ? 'has-error' : '' }}">
                                        <div class="col-sm-10">
                                            {!! Form::text('contact_last_name[]', old('contact_last_name[]'), ['id' => 'contact_last_name', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.contact_last_name').' *']) !!}
                                            <span class="help-block">{{ $errors->first('contact_last_name', ':message') }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group {{ $errors->first('contact_job') ? 'has-error' : '' }}">
                                        <div class="col-sm-10">
                                            {!! Form::text('contact_job[]', old('contact_job[]'), ['id' => 'contact_job', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.contact_job').' *']) !!}
                                            <span class="help-block">{{ $errors->first('contact_job', ':message') }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group {{ $errors->first('contact_email') ? 'has-error' : '' }}">
                                        <div class="col-sm-10">
                                            {!! Form::text('contact_email[]', old('contact_email[]'), ['id' => 'contact_email', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.contact_email').' *']) !!}
                                            <span class="help-block">{{ $errors->first('contact_email', ':message') }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group {{ $errors->first('contact_phone') ? 'has-error' : '' }}">
                                        <div class="col-sm-10">
                                            {!! Form::text('contact_phone[]', old('contact_phone[]'), ['id' => 'contact_phone', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.contact_phone').' *']) !!}
                                            <span class="help-block">{{ $errors->first('contact_phone', ':message') }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group {{ $errors->first('contact_cellphone') ? 'has-error' : '' }}">
                                        <div class="col-sm-10">
                                            {!! Form::text('contact_cellphone[]', old('contact_cellphone[]'), ['id' => 'contact_cellphone', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.contact_cellphone')]) !!}
                                            <span class="help-block">{{ $errors->first('contact_cellphone', ':message') }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group hidden" id="divBtnDelete">
                                        <div class="col-sm-12 text-right">
                                            {!! Form::button(trans('strings.crud.delete'), ['class' => 'btn btn-danger delete_contact', 'onclick' => 'deleteContact(this);']) !!}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12 text-right">
            {!! Form::button(trans('validation.attributes.add_contact'), ['id' => 'add_contact', 'class' => 'btn btn-success']) !!}
        </div>
    </div>
</div>

<div class="tab-pane" id="tab3">
    <h2 class="hidden">&nbsp;</h2>
    <div class="form-group {{ $errors->first('country_id') ? 'has-error' : '' }}">
        {!! Form::label('country_id', trans('validation.attributes.country_id').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('country_id', $catalog_country_id, null, ['id' => 'country_id', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.country_id')]) !!}
            <span class="help-block">{{ $errors->first('country_id', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->first('state_id') ? 'has-error' : '' }}">
        {!! Form::label('state_id', trans('validation.attributes.state_id').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('state_id', $catalog_state_id, null, ['id' => 'state_id', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.state_id')]) !!}
            <span class="help-block">{{ $errors->first('state_id', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->first('city_id') ? 'has-error' : '' }}">
        {!! Form::label('city_id', trans('validation.attributes.city_id').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('city_id', $catalog_city_id, null, ['id' => 'city_id', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.city_id')]) !!}
            <span class="help-block">{{ $errors->first('city_id', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->first('municipality') ? 'has-error' : '' }}">
        {!! Form::label('municipality', trans('validation.attributes.municipality').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('municipality', old('municipality'), ['id' => 'municipality', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.municipality')]) !!}
            <span class="help-block">{{ $errors->first('municipality', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->first('colony') ? 'has-error' : '' }}">
        {!! Form::label('colony', trans('validation.attributes.colony').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('colony', old('colony'), ['id' => 'colony', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.colony')]) !!}
            <span class="help-block">{{ $errors->first('colony', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->first('street') ? 'has-error' : '' }}">
        {!! Form::label('street', trans('validation.attributes.street').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('street', old('street'), ['id' => 'street', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.street')]) !!}
            <span class="help-block">{{ $errors->first('street', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->first('no_ext') ? 'has-error' : '' }}">
        {!! Form::label('no_ext', trans('validation.attributes.no_ext').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('no_ext', old('no_ext'), ['id' => 'no_ext', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.no_ext')]) !!}
            <span class="help-block">{{ $errors->first('no_ext', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->first('no_int') ? 'has-error' : '' }}">
        {!! Form::label('no_int', trans('validation.attributes.no_int'), ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('no_int', old('no_int'), ['id' => 'no_int', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.no_int')]) !!}
            <span class="help-block">{{ $errors->first('no_int', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->first('postal_code') ? 'has-error' : '' }}">
        {!! Form::label('postal_code', trans('validation.attributes.postal_code').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('postal_code', old('postal_code'), ['id' => 'postal_code', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.postal_code')]) !!}
            <span class="help-block">{{ $errors->first('postal_code', ':message') }}</span>
        </div>
    </div>
</div>

<div class="tab-pane" id="tab4">
    <h2 class="hidden">&nbsp;</h2>
    <div class="form-group {{ $errors->first('rfc') ? 'has-error' : '' }}">
        {!! Form::label('rfc', trans('validation.attributes.rfc').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('rfc', old('rfc'), ['id' => 'rfc', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.rfc')]) !!}
            <span class="help-block">{{ $errors->first('rfc', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->first('social_reason') ? 'has-error' : '' }}">
        {!! Form::label('social_reason', trans('validation.attributes.social_reason').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('social_reason', old('social_reason'), ['id' => 'social_reason', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.social_reason')]) !!}
            <span class="help-block">{{ $errors->first('social_reason', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->first('commercial_name') ? 'has-error' : '' }}">
        {!! Form::label('commercial_name', trans('validation.attributes.commercial_name').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('commercial_name', old('commercial_name'), ['id' => 'commercial_name', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.commercial_name')]) !!}
            <span class="help-block">{{ $errors->first('commercial_name', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->first('person_type_id') ? 'has-error' : '' }}">
        {!! Form::label('person_type_id', trans('validation.attributes.person_type_id').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::select('person_type_id', $catalog_person_type_id, old('person_type_id'), ['id' => 'person_type_id', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.person_type_id')]) !!}
            <span class="help-block">{{ $errors->first('person_type_id', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->first('legal_representant') ? 'has-error' : '' }}">
        {!! Form::label('legal_representant', trans('validation.attributes.legal_representant').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('legal_representant', old('legal_representant'), ['id' => 'legal_representant', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.legal_representant')]) !!}
            <span class="help-block">{{ $errors->first('legal_representant', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->first('date_public_writing') ? 'has-error' : '' }}">
        {!! Form::label('date_public_writing', trans('validation.attributes.date_public_writing').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('date_public_writing', old('date_public_writing'), ['id' => 'date_public_writing', 'class' => 'form-control datepicker', 'placeholder' => trans('validation.attributes.date_public_writing'), 'readonly']) !!}
            <span class="help-block">{{ $errors->first('date_public_writing', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->first('no_public_notary') ? 'has-error' : '' }}">
        {!! Form::label('no_public_notary', trans('validation.attributes.no_public_notary').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('no_public_notary', old('no_public_notary'), ['id' => 'no_public_notary', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.no_public_notary')]) !!}
            <span class="help-block">{{ $errors->first('no_public_notary', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->first('entity_public_notary') ? 'has-error' : '' }}">
        {!! Form::label('entity_public_notary', trans('validation.attributes.entity_public_notary').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('entity_public_notary', old('entity_public_notary'), ['id' => 'entity_public_notary', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.entity_public_notary')]) !!}
            <span class="help-block">{{ $errors->first('entity_public_notary', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->first('inscription_folio') ? 'has-error' : '' }}">
        {!! Form::label('inscription_folio', trans('validation.attributes.inscription_folio').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('inscription_folio', old('inscription_folio'), ['id' => 'inscription_folio', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.inscription_folio')]) !!}
            <span class="help-block">{{ $errors->first('inscription_folio', ':message') }}</span>
        </div>
    </div>
</div>

<div class="tab-pane" id="tab5">
    <h2 class="hidden">&nbsp;</h2>
    <div class="form-group {{ $errors->first('constitutive_act') ? 'has-error' : '' }}">
        {!! Form::label('constitutive_act', trans('validation.attributes.constitutive_act').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::file('constitutive_act', ['id' => 'constitutive_act']) !!}
            @if(isset($item->constitutive_act) && $item->constitutive_act != '' && $item->constitutive_act != null)
                <p class="help-block">{!! link_to('uploads/suppliers/documents/'.$item->constitutive_act, trans('strings.help.file'), ['target' => '_blank']) !!}</p>
                <p class="help-block">{{ trans('strings.help.constitutive_act') }}</p>
            @endif
            <span class="help-block">{{ $errors->first('constitutive_act', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->first('hacienda_register') ? 'has-error' : '' }}">
        {!! Form::label('hacienda_register', trans('validation.attributes.hacienda_register').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::file('hacienda_register', ['id' => 'hacienda_register']) !!}
            @if(isset($item->hacienda_register) && $item->hacienda_register != '' && $item->hacienda_register != null)
                <p class="help-block">{!! link_to('uploads/suppliers/documents/'.$item->hacienda_register, trans('strings.help.file'), ['target' => '_blank']) !!}</p>
                <p class="help-block">{{ trans('strings.help.hacienda_register') }}</p>
            @endif
            <span class="help-block">{{ $errors->first('hacienda_register', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->first('legal_representative_identification') ? 'has-error' : '' }}">
        {!! Form::label('legal_representative_identification', trans('validation.attributes.legal_representative_identification').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::file('legal_representative_identification', ['id' => 'legal_representative_identification']) !!}
            @if(isset($item->legal_representative_identification) && $item->legal_representative_identification != '' && $item->legal_representative_identification != null)
                <p class="help-block">{!! link_to('uploads/suppliers/documents/'.$item->legal_representative_identification, trans('strings.help.file'), ['target' => '_blank']) !!}</p>
                <p class="help-block">{{ trans('strings.help.legal_representative_identification') }}</p>
            @endif
            <span class="help-block">{{ $errors->first('legal_representative_identification', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->first('address_proof') ? 'has-error' : '' }}">
        {!! Form::label('address_proof', trans('validation.attributes.address_proof').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::file('address_proof', ['id' => 'address_proof']) !!}
            @if(isset($item->address_proof) && $item->address_proof != '' && $item->address_proof != null)
                <p class="help-block">{!! link_to('uploads/suppliers/documents/'.$item->address_proof, trans('strings.help.file'), ['target' => '_blank']) !!}</p>
                <p class="help-block">{{ trans('strings.help.address_proof') }}</p>
            @endif
            <span class="help-block">{{ $errors->first('address_proof', ':message') }}</span>
        </div>
    </div>
</div>

<div class="tab-pane" id="tab6">
    <h2 class="hidden">&nbsp;</h2>
    <div class="form-group {{ $errors->first('email_paypal') ? 'has-error' : '' }}">
        {!! Form::label('email_paypal', trans('validation.attributes.email_paypal').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('email_paypal', old('email_paypal'), ['id' => 'email_paypal', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.email_paypal')]) !!}
            <span class="help-block">{{ $errors->first('email_paypal', ':message') }}</span>
        </div>
    </div>

    <div class="form-group {{ $errors->first('policies') ? 'has-error' : '' }}">
        {!! Form::label('policies', trans('validation.attributes.policies').' *', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::file('policies', ['id' => 'policies']) !!}
            @if(isset($item->policies) && $item->policies != '' && $item->policies != null)
                <p class="help-block">{!! link_to('uploads/suppliers/documents/'.$item->policies, trans('strings.help.file'), ['target' => '_blank']) !!}</p>
                <p class="help-block">{{ trans('strings.help.policies') }}</p>
            @endif
            <span class="help-block">{{ $errors->first('policies', ':message') }}</span>
        </div>
    </div>

    @if(Sentinel::guest() || Sentinel::getUser()->role_id == 4)
        {!! Form::hidden('status_id', 3) !!}
    @else
        <div class="form-group {{ $errors->first('status_id') ? 'has-error' : '' }}">
            {!! Form::label('status_id', trans('validation.attributes.status_id').' *', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                {!! Form::select('status_id', $catalog_status_id, null, ['id' => 'status_id', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.status_id')]) !!}
                <span class="help-block">{{ $errors->first('status_id', ':message') }}</span>
            </div>
        </div>
    @endif

    {!! Form::hidden('role_id', 4) !!}
</div>