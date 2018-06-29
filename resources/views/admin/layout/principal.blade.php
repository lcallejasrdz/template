<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>{{ env('APP_NAME') }} @yield('title')</title>

        {{-- Bootstrap Core CSS --}}
        {{ Html::style('assets/plugins/sb-admin/vendor/bootstrap/css/bootstrap.min.css') }}

        {{-- MetisMenu CSS --}}
        {{ Html::style('assets/plugins/sb-admin/vendor/bootstrap/css/bootstrap.min.css') }}

        {{-- Custom CSS --}}
        {{ Html::style('assets/plugins/sb-admin/dist/css/sb-admin-2.css') }}

        {{-- Morris Charts CSS --}}
        {{ Html::style('assets/plugins/sb-admin/vendor/morrisjs/morris.css') }}

        {{-- Custom Fonts --}}
        {{ Html::style('assets/plugins/sb-admin/vendor/font-awesome/css/font-awesome.min.css') }}

        {{-- DataTables --}}
        {{ Html::style('https://cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css') }}

        {{-- FormValidation CSS file --}}
        {{ Html::style('assets/plugins/formvalidation/dist/css/formValidation.min.css') }}

        {{-- DateTimePicker CSS file --}}
        {{ Html::style('https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css') }}

        {{-- TimePicker CSS file --}}
        {{ Html::style('https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css') }}

        {{-- NavBar --}}
        {{ Html::style('assets/css/admin/navbar.css') }}

        {{-- Custom --}}
        {{ Html::style('assets/css/admin/custom.css') }}

        <script>
            var direction = "{{ env('APP_URL') }}";
        </script>

        @yield('styles')
    </head>

    <body>
        <div id="wrapper">

            {{-- Navigation --}}
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    @include('admin.layout.menus.logo')
                </div>
                {{-- /.navbar-header --}}

                @include('admin.layout.menus.top')
                {{-- /.navbar-top-links --}}

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        @include('admin.layout.menus.principal')
                    </div>
                    {{-- /.sidebar-collapse --}}
                </div>
                {{-- /.navbar-static-side --}}
            </nav>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">@yield('page-header')</h1>
                    </div>
                    {{-- /.col-lg-12 --}}
                </div>
                {{-- /.row --}}
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                @yield('panel-heading')
                            </div>
                            {{-- /.panel-heading --}}
                            <div class="panel-body">
                                @yield('content')
                            </div>
                            {{-- /.panel-body --}}
                        </div>
                        {{-- /.panel --}}
                    </div>
                    {{-- /.col-sm-12 --}}
                </div>
                {{-- /.row --}}
            </div>
            {{-- /#page-wrapper --}}

        </div>
        
        {{-- /#wrapper --}}

        {{-- jQuery --}}
        {{ Html::script('assets/plugins/sb-admin/vendor/jquery/jquery.min.js') }}
        {{ Html::script('https://code.jquery.com/ui/1.12.1/jquery-ui.js') }}

        {{-- Bootstrap Core JavaScript --}}
        {{ Html::script('assets/plugins/sb-admin/vendor/bootstrap/js/bootstrap.min.js') }}

        {{-- Metis Menu Plugin JavaScript --}}
        {{ Html::script('assets/plugins/sb-admin/vendor/metisMenu/metisMenu.min.js') }}

        {{-- Morris Charts JavaScript --}}
        {{ Html::script('assets/plugins/sb-admin/vendor/raphael/raphael.min.js') }}
        {{ Html::script('assets/plugins/sb-admin/vendor/morrisjs/morris.min.js') }}
        {{ Html::script('assets/plugins/sb-admin/data/morris-data.js') }}

        {{-- Custom Theme JavaScript --}}
        {{ Html::script('assets/plugins/sb-admin/dist/js/sb-admin-2.js') }}

        {{-- Bootstrap Wizard --}}
        {{ Html::script('assets/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}
        
        {{-- DataTables --}}
        {{ Html::script('https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js') }}

        {{-- FormValidation plugin and the class supports validating Bootstrap form --}}
        {{ Html::script("assets/plugins/formvalidation/dist/js/formValidation.min.js") }}
        {{ Html::script("assets/plugins/formvalidation/dist/js/framework/bootstrap.min.js") }}
        @if(\App::getLocale() == 'es')
            {{ Html::script("assets/plugins/formvalidation/dist/js/language/es_ES.js") }}
        @else
            {{ Html::script("assets/plugins/formvalidation/dist/js/language/en_US.js") }}
        @endif

        {{-- DateTimePicker plugin --}}
        {{ Html::script("assets/plugins/datetimepicker/datepicker.js") }}
        @if(\App::getLocale() == 'es')
            {{ Html::script("assets/plugins/datetimepicker/i18n/datepicker-es.js") }}
        @endif

        {{-- TimePicker plugin --}}
        {{ Html::script("https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js") }}
        {{ Html::script("assets/plugins/timepicker/timepicker.call.js") }}

        {{-- CkEditor plugin --}}
        {{ Html::script("assets/plugins/ckeditor/ckeditor.js") }}
        {{-- Include CKEditor and jQuery adapter --}}
        {{ Html::script("assets/plugins/ckeditor/adapters/jquery.js") }}

        {{-- Google Maps --}}
        {{ Html::script("https://maps.googleapis.com/maps/api/js?key=". env('GOOGLE_MAPS_KEY') ."&libraries=places&callback=initAutocomplete", ['async', 'defer']) }}
        {{ Html::script("assets/plugins/google-maps/google_maps.js") }}

        @yield('scripts')

        @include('notifications')
    </body>
</html>