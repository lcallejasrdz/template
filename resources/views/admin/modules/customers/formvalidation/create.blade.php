<script>
    $(document).ready(function() {
        $('#formValidation').formValidation({
            locale: "{{ \App::getLocale() == 'es' ? 'es_ES' : 'en_US' }}",
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
                id_genders: {
                    validators: {
                        notEmpty: {}
                    }
                },
                birthdate: {
                    validators: {
                        notEmpty: {},
                        date: {
                            format: 'YYYY-MM-DD'
                        }
                    }
                },
                phone: {
                    validators: {
                        notEmpty: {},
                        stringLength: {
                            min: 4,
                            max: 25
                        }
                    }
                },
                cellphone: {
                    validators: {
                        notEmpty: {},
                        stringLength: {
                            min: 4,
                            max: 25
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
                        notEmpty: {},
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
                id_roles: {
                    validators: {
                        notEmpty: {}
                    }
                }
            }
        });
    });

    $('#birthdate').change(function(){
        $('#formValidation').formValidation('revalidateField', 'birthdate');
    });
</script>
