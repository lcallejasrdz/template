<script>
    $(document).ready(function() {
        $('#formValidation').formValidation({
            locale: '{{ \App::getLocale() == 'es' ? 'es_ES' : 'en_US' }}',
            fields: {
                country_id: {
                    validators: {
                        notEmpty: {}
                    }
                },
                state_id: {
                    validators: {
                        notEmpty: {}
                    }
                },
                city_id: {
                    validators: {
                        notEmpty: {}
                    }
                },
                municipality: {
                    validators: {
                        notEmpty: {},
                        stringLength: {
                            min: 3,
                            max: 255
                        }
                    }
                },
                colony: {
                    validators: {
                        notEmpty: {},
                        stringLength: {
                            min: 3,
                            max: 255
                        }
                    }
                },
                street: {
                    validators: {
                        notEmpty: {},
                        stringLength: {
                            min: 3,
                            max: 255
                        }
                    }
                },
                no_ext: {
                    validators: {
                        notEmpty: {},
                        stringLength: {
                            min: 1,
                            max: 50
                        }
                    }
                },
                no_int: {
                    validators: {
                        stringLength: {
                            min: 1,
                            max: 50
                        }
                    }
                },
                postal_code: {
                    validators: {
                        notEmpty: {},
                        stringLength: {
                            min: 3,
                            max: 5
                        }
                    }
                }
            }
        });
    });
</script>
