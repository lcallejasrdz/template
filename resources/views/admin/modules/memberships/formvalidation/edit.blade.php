<script>
    $(document).ready(function() {
        $('#formValidation').formValidation({
            locale: '{{ \App::getLocale() == 'es' ? 'es_ES' : 'en_US' }}',
            fields: {
                name: {
                    validators: {
                        notEmpty: {},
                        stringLength: {
                            min: 3,
                            max: 255
                        }
                    }
                },
                quantity: {
                    validators: {
                        notEmpty: {},
                        integer: {}
                    }
                },
                monthly_cost: {
                    validators: {
                        notEmpty: {},
                        numeric: {
                            // The default separators
                            thousandsSeparator: '',
                            decimalSeparator: '.'
                        }
                    }
                },
                annual_cost: {
                    validators: {
                        notEmpty: {},
                        numeric: {
                            // The default separators
                            thousandsSeparator: '',
                            decimalSeparator: '.'
                        }
                    }
                }
            }
        });
    });
</script>
