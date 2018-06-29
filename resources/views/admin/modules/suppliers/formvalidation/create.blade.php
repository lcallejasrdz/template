<script>
    $(document).ready(function() {
        moralPersonFields($('#person_type_id').val());

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
                        notEmpty: {},
                        stringLength: {
                            min: 6,
                            max: 16
                        },
                        identical_password: {
                            field: 'password'
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
                'contact_first_name[]': {
                    validators: {
                        notEmpty: {}
                    }
                },
                'contact_last_name[]': {
                    validators: {
                        notEmpty: {}
                    }
                },
                'contact_job[]': {
                    validators: {
                        notEmpty: {}
                    }
                },
                'contact_email[]': {
                    validators: {
                        notEmpty: {},
                        emailAddress: {}
                    }
                },
                'contact_phone[]': {
                    validators: {
                        notEmpty: {}
                    }
                },
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
                },
                rfc: {
                    validators: {
                        notEmpty: {},
                        stringLength: {
                            min: 3,
                            max: 15
                        }
                    }
                },
                social_reason: {
                    validators: {
                        notEmpty: {},
                        stringLength: {
                            min: 3,
                            max: 255
                        }
                    }
                },
                commercial_name: {
                    validators: {
                        notEmpty: {},
                        stringLength: {
                            min: 3,
                            max: 255
                        }
                    }
                },
                person_type_id: {
                    validators: {
                        notEmpty: {}
                    }
                },
                web_site: {
                    validators: {
                        uri: {}
                    }
                },
                logo: {
                    validators: {
                        file: {
                            extension: 'jpeg,jpg,png',
                            type: 'image/jpeg,image/png',
                            maxSize: 2097152   // 2048 * 1024
                        }
                    }
                },
                email_paypal: {
                    validators: {
                        notEmpty: {},
                        emailAddress: {}
                    }
                },
                legal_representant: {
                    validators: {
                        notEmpty: {},
                        stringLength: {
                            min: 3,
                            max: 255
                        }
                    }
                },
                date_public_writing: {
                    validators: {
                        notEmpty: {},
                        date: {
                            format: 'YYYY-MM-DD'
                        }
                    }
                },
                no_public_notary: {
                    validators: {
                        notEmpty: {},
                        stringLength: {
                            min: 1,
                            max: 255
                        }
                    }
                },
                entity_public_notary: {
                    validators: {
                        notEmpty: {},
                        stringLength: {
                            min: 3,
                            max: 255
                        }
                    }
                },
                inscription_folio: {
                    validators: {
                        notEmpty: {},
                        stringLength: {
                            min: 3,
                            max: 255
                        }
                    }
                },
                constitutive_act: {
                    validators: {
                        notEmpty: {},
                        file: {
                            extension: 'jpeg,jpg,png,pdf',
                            type: 'image/jpeg,image/png,application/pdf',
                            maxSize: 2097152   // 2048 * 1024
                        }
                    }
                },
                hacienda_register: {
                    validators: {
                        file: {
                            extension: 'jpeg,jpg,png,pdf',
                            type: 'image/jpeg,image/png,application/pdf',
                            maxSize: 2097152   // 2048 * 1024
                        }
                    }
                },
                legal_representative_identification: {
                    validators: {
                        file: {
                            extension: 'jpeg,jpg,png,pdf',
                            type: 'image/jpeg,image/png,application/pdf',
                            maxSize: 2097152   // 2048 * 1024
                        }
                    }
                },
                address_proof: {
                    validators: {
                        file: {
                            extension: 'jpeg,jpg,png,pdf',
                            type: 'image/jpeg,image/png,application/pdf',
                            maxSize: 2097152   // 2048 * 1024
                        }
                    }
                },
                policies: {
                    validators: {
                        file: {
                            extension: 'jpeg,jpg,png,pdf',
                            type: 'image/jpeg,image/png,application/pdf',
                            maxSize: 2097152   // 2048 * 1024
                        }
                    }
                },
                status_id: {
                    validators: {
                        notEmpty: {}
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

    $('#person_type_id').change(function(){
        moralPersonFields($(this).val());
        $('#formValidation').formValidation('revalidateField', 'legal_representat')
                            .formValidation('revalidateField', 'date_public_writing')
                            .formValidation('revalidateField', 'no_public_notary')
                            .formValidation('revalidateField', 'entity_public_notary')
                            .formValidation('revalidateField', 'inscription_folio')
                            .formValidation('revalidateField', 'constitutive_act');
    });

    function moralPersonFields(type){
        if(type == 1){
            $('#legal_representat').prop('disabled', false)
                                    .closest('.form-group')
                                    .show();
            $('#date_public_writing').prop('disabled', false)
                                    .closest('.form-group')
                                    .show();
            $('#no_public_notary').prop('disabled', false)
                                    .closest('.form-group')
                                    .show();
            $('#entity_public_notary').prop('disabled', false)
                                    .closest('.form-group')
                                    .show();
            $('#inscription_folio').prop('disabled', false)
                                    .closest('.form-group')
                                    .show();
            $('#constitutive_act').prop('disabled', false)
                                    .closest('.form-group')
                                    .show();
            
        }else{
            $('#legal_representat').val('')
                                    .prop('disabled', true)
                                    .closest('.form-group')
                                    .hide();
            $('#date_public_writing').val('')
                                    .prop('disabled', true)
                                    .closest('.form-group')
                                    .hide();
            $('#no_public_notary').val('')
                                    .prop('disabled', true)
                                    .closest('.form-group')
                                    .hide();
            $('#entity_public_notary').val('')
                                    .prop('disabled', true)
                                    .closest('.form-group')
                                    .hide();
            $('#inscription_folio').val('')
                                    .prop('disabled', true)
                                    .closest('.form-group')
                                    .hide();
            $('#constitutive_act').val('')
                                    .prop('disabled', true)
                                    .closest('.form-group')
                                    .hide();
        }
    }

    $('#formValidation').on('click', '#add_contact', function() {
        bookIndex = $( ".formContactSupplier" ).length - 1;
        bookIndex++;
        var $template = $('#formContactSupplier'),
            $clone    = $template
                            .clone()
                            .removeClass('hide')
                            .removeAttr('id')
                            .attr('class','formContactSupplier')
                            .attr('data-book-index', bookIndex)
                            .insertAfter($( ".formContactSupplier" ).last());

        // Update the name attributes
        $clone.find('#divBtnDelete').removeClass('hidden');
        
        $clone.find('[id="contact_first_name"]').attr('id', 'contact_first_name_' + bookIndex).val("").end()
            .find('[id="contact_last_name"]').attr('id', 'contact_last_name_' + bookIndex).val("").end()
            .find('[id="contact_job"]').attr('id', 'contact_job_' + bookIndex).val("").end()
            .find('[id="contact_email"]').attr('id', 'contact_email_' + bookIndex).val("").end()
            .find('[id="contact_phone"]').attr('id', 'contact_phone_' + bookIndex).val("").end()
            .find('[id="contact_cellphone"]').attr('id', 'contact_cellphone_' + bookIndex).val("").end();

        // Add new fields
        // Note that we also pass the validator rules for new field as the third parameter
        $('#formValidation').formValidation('addField', $clone.find('[name="contact_first_name[]"]')).formValidation('resetField', $clone.find('[name="contact_first_name[]"]'), true)
            .formValidation('addField', $clone.find('[name="contact_last_name[]"]')).formValidation('resetField', $clone.find('[name="contact_last_name[]"]'), true)
            .formValidation('addField', $clone.find('[name="contact_job[]"]')).formValidation('resetField', $clone.find('[name="contact_job[]"]'), true)
            .formValidation('addField', $clone.find('[name="contact_email[]"]')).formValidation('resetField', $clone.find('[name="contact_email[]"]'), true)
            .formValidation('addField', $clone.find('[name="contact_phone[]"]')).formValidation('resetField', $clone.find('[name="contact_phone[]"]'), true)
            .formValidation('addField', $clone.find('[name="contact_cellphone[]"]')).formValidation('resetField', $clone.find('[name="contact_cellphone[]"]'), true);
    });

    function deleteContact(btn){
        $(btn).parents('.formContactSupplier').remove();
    }

    $('#date_public_writing').change(function(){
        $('#formValidation').formValidation('revalidateField', 'date_public_writing');
    });

    $("#rfc").keyup(function (){
        $("#rfc").val(($("#rfc").val()).toUpperCase());
    });
</script>
