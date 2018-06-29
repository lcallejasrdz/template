<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>
            {{ env('APP_NAME') }} @yield('title')
        </title>

        <!-- Latest compiled and minified CSS -->
        {{ Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css') }}
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        {{ Html::script('https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js') }}
        {{ Html::script('https://code.jquery.com/ui/1.12.1/jquery-ui.js') }}

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

        {{-- Custom CSS file --}}
        {{ Html::style('assets/css/custom.css') }}

        {{-- NavBar CSS file --}}
        {{ Html::style('assets/css/navbar.css') }}

        <script>
            var direction = "{{ env('APP_URL') }}";
        </script>

        @yield('styles')
    </head>
    <body>
        <div class="container-fluid">
            @include('layout.menus.principal')
            @yield('content')
        </div>

        @include('notifications')

        <!-- Latest compiled and minified JavaScript -->
        {{ Html::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js') }}

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

        {{-- Google Maps --}}
        {{ Html::script("https://maps.googleapis.com/maps/api/js?key=". env('GOOGLE_MAPS_KEY') ."&libraries=places&callback=initAutocomplete", ['async', 'defer']) }}
        {{ Html::script("assets/plugins/google-maps/google_maps.js") }}

        @yield('scripts')
    </body>
</html>