<script>
    $(document).ready(function() {
        $('#formValidation').formValidation({
            locale: '{{ \App::getLocale() == 'es' ? 'es_ES' : 'en_US' }}',
            fields: {
                first_name: {
                    validators: {
                        notEmpty: {},
                        stringLength: {
                            min: 3,
                            max: 255
                        }
                    }
                },
                last_name: {
                    validators: {
                        notEmpty: {},
                        stringLength: {
                            min: 3,
                            max: 255
                        }
                    }
                },
                email: {
                    validators: {
                        notEmpty: {},
                        emailAddress: {}
                    }
                },
                password: {
                    validators: {
                        stringLength: {
                            min: 6,
                            max: 16
                        },
                        identical_password: {
                            field: 'password_confirm'
                        }
                    }
                },
                password_confirm: {
                    validators: {
                        stringLength: {
                            min: 6,
                            max: 16
                        },
                        identical_password: {
                            field: 'password'
                        }
                    }
                },
                role_id: {
                    validators: {
                        notEmpty: {}
                    }
                }
            }
        });
    });
</script>
