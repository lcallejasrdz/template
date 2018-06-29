<script>
	$(document).ready(function() {
	    var TIME_PATTERN = /^(0[0-9]{1}|1[0-9]{1}|2[0-4]{1}):[0-5]{1}[0-9]{1}$/;

	    $('#formValidation').formValidation({
            locale: '{{ \App::getLocale() == 'es' ? 'es_ES' : 'en_US' }}',
	        excluded: [':disabled'],
	        fields: {
	            user_id: {
	                validators: {
	                    notEmpty: {}
	                }
	            },
	            category_id: {
	                validators: {
	                    notEmpty: {}
	                }
	            },
	            subcategory_id: {
	                validators: {
	                    notEmpty: {}
	                }
	            },
	            name: {
	                validators: {
	                    notEmpty: {},
	                    stringLength: {
	                        min: 3,
	                        max: 255
	                    }
	                }
	            },
	            description_content: {
	                validators: {
	                    notEmpty: {},
	                    callback: {
	                        message: "{{ trans('validation.formvalidation.description.stringLength') }}",
	                        callback: function(value, validator, $field) {
	                            if (value === '') {
	                                return true;
	                            }
	                            // Get the plain text without HTML
	                            var div  = $('<div/>').html(value).get(0),
	                                text = div.textContent || div.innerText;

	                            var text_length = text.length - 1;

	                            if(text_length >= 3 && text_length <= 1000){
	                                return true;
	                            }else{
	                                return false;
	                            }
	                        }
	                    }
	                }
	            },
	            price: {
	                validators: {
	                    notEmpty: {},
	                    numeric: {
	                        // The default separators
	                        thousandsSeparator: '',
	                        decimalSeparator: '.'
	                    }
	                }
	            },
	            product_unity_id: {
	                validators: {
	                    notEmpty: {}
	                }
	            },
	            'event_type_id[]': {
	                validators: {
	                    notEmpty: {}
	                }
	            },
	            img_1: {
	                validators: {
	                    notEmpty: {},
	                    file: {
	                        extension: 'jpeg,jpg,png',
	                        type: 'image/jpeg,image/png',
	                        maxSize: 2097152   // 2048 * 1024
	                    }
	                }
	            },
	            img_2: {
	                validators: {
	                    file: {
	                        extension: 'jpeg,jpg,png',
	                        type: 'image/jpeg,image/png',
	                        maxSize: 2097152   // 2048 * 1024
	                    }
	                }
	            },
	            img_3: {
	                validators: {
	                    file: {
	                        extension: 'jpeg,jpg,png',
	                        type: 'image/jpeg,image/png',
	                        maxSize: 2097152   // 2048 * 1024
	                    }
	                }
	            },
	            img_4: {
	                validators: {
	                    file: {
	                        extension: 'jpeg,jpg,png',
	                        type: 'image/jpeg,image/png',
	                        maxSize: 2097152   // 2048 * 1024
	                    }
	                }
	            },
	            img_5: {
	                validators: {
	                    file: {
	                        extension: 'jpeg,jpg,png',
	                        type: 'image/jpeg,image/png',
	                        maxSize: 2097152   // 2048 * 1024
	                    }
	                }
	            },
	            product_type_id: {
	                validators: {
	                    notEmpty: {}
	                }
	            },
	            inventory: {
	                validators: {
	                    notEmpty: {},
	                    integer: {}
	                }
	            },
	            min_buy: {
	                validators: {
	                    notEmpty: {},
	                    integer: {}
	                }
	            },
	            preparation_time_id: {
	                validators: {
	                    notEmpty: {}
	                }
	            },
	            restocked_time_id: {
	                validators: {
	                    notEmpty: {}
	                }
	            },
	            'country_id[]': {
	                validators: {
	                    notEmpty: {}
	                }
	            },
		        states_res: {
		            excluded: false,
		            validators: {
		                callback: {
		                    message: "{{ trans('validation.formvalidation.notEmpty') }}",
		                    callback: function (value, validator, $field) {
		                        $total = $("input[name='state_id[]']:checked").length;
	                            if($total <= 0){
	                                return false;
	                            }
	                            return true;
		                    }
		                }
		            }
		        },
		        cities_res: {
		            excluded: false,
		            validators: {
		                callback: {
		                    message: "{{ trans('validation.formvalidation.notEmpty') }}",
		                    callback: function (value, validator, $field) {
		                        $total = $("input[name='city_id[]']:checked").length;
	                            if($total <= 0){
	                                return false;
	                            }
	                            return true;
		                    }
		                }
		            }
		        },
	            monday_init: {
	                validators: {
	                    regexp: {
	                        regexp: TIME_PATTERN,
	                    },
	                    callback: {
	                        message: "{{ trans('validation.formvalidation.disponibility.hour_init') }}",
	                        callback: function(value, validator, $field) {
	                            var monday_finish = validator.getFieldElements('monday_finish').val();
	                            if (monday_finish === '' || !TIME_PATTERN.test(monday_finish)) {
	                                return true;
	                            }
	                            var startHour    = parseInt(value.split(':')[0], 10),
	                                startMinutes = parseInt(value.split(':')[1], 10),
	                                endHour      = parseInt(monday_finish.split(':')[0], 10),
	                                endMinutes   = parseInt(monday_finish.split(':')[1], 10);

	                            if (startHour < endHour || (startHour == endHour && startMinutes < endMinutes)) {
	                                // The end time is also valid
	                                // So, we need to update its status
	                                validator.updateStatus('monday_finish', validator.STATUS_VALID, 'callback');
	                                return true;
	                            }

	                            return false;
	                        }
	                    }
	                }
	            },
	            monday_finish: {
	                validators: {
	                    regexp: {
	                        regexp: TIME_PATTERN,
	                    },
	                    callback: {
	                        message: "{{ trans('validation.formvalidation.disponibility.hour_finish') }}",
	                        callback: function(value, validator, $field) {
	                            var monday_init = validator.getFieldElements('monday_init').val();
	                            if (monday_init == '' || !TIME_PATTERN.test(monday_init)) {
	                                return true;
	                            }
	                            var startHour    = parseInt(monday_init.split(':')[0], 10),
	                                startMinutes = parseInt(monday_init.split(':')[1], 10),
	                                endHour      = parseInt(value.split(':')[0], 10),
	                                endMinutes   = parseInt(value.split(':')[1], 10);

	                            if (endHour > startHour || (endHour == startHour && endMinutes > startMinutes)) {
	                                // The start time is also valid
	                                // So, we need to update its status
	                                validator.updateStatus('monday_init', validator.STATUS_VALID, 'callback');
	                                return true;
	                            }

	                            return false;
	                        }
	                    }
	                }
	            },
	            tuesday_init: {
	                validators: {
	                    regexp: {
	                        regexp: TIME_PATTERN,
	                    },
	                    callback: {
	                        message: "{{ trans('validation.formvalidation.disponibility.hour_init') }}",
	                        callback: function(value, validator, $field) {
	                            var tuesday_finish = validator.getFieldElements('tuesday_finish').val();
	                            if (tuesday_finish === '' || !TIME_PATTERN.test(tuesday_finish)) {
	                                return true;
	                            }
	                            var startHour    = parseInt(value.split(':')[0], 10),
	                                startMinutes = parseInt(value.split(':')[1], 10),
	                                endHour      = parseInt(tuesday_finish.split(':')[0], 10),
	                                endMinutes   = parseInt(tuesday_finish.split(':')[1], 10);

	                            if (startHour < endHour || (startHour == endHour && startMinutes < endMinutes)) {
	                                // The end time is also valid
	                                // So, we need to update its status
	                                validator.updateStatus('tuesday_finish', validator.STATUS_VALID, 'callback');
	                                return true;
	                            }

	                            return false;
	                        }
	                    }
	                }
	            },
	            tuesday_finish: {
	                validators: {
	                    regexp: {
	                        regexp: TIME_PATTERN,
	                    },
	                    callback: {
	                        message: "{{ trans('validation.formvalidation.disponibility.hour_finish') }}",
	                        callback: function(value, validator, $field) {
	                            var tuesday_init = validator.getFieldElements('tuesday_init').val();
	                            if (tuesday_init == '' || !TIME_PATTERN.test(tuesday_init)) {
	                                return true;
	                            }
	                            var startHour    = parseInt(tuesday_init.split(':')[0], 10),
	                                startMinutes = parseInt(tuesday_init.split(':')[1], 10),
	                                endHour      = parseInt(value.split(':')[0], 10),
	                                endMinutes   = parseInt(value.split(':')[1], 10);

	                            if (endHour > startHour || (endHour == startHour && endMinutes > startMinutes)) {
	                                // The start time is also valid
	                                // So, we need to update its status
	                                validator.updateStatus('tuesday_init', validator.STATUS_VALID, 'callback');
	                                return true;
	                            }

	                            return false;
	                        }
	                    }
	                }
	            },
	            wednesday_init: {
	                validators: {
	                    regexp: {
	                        regexp: TIME_PATTERN,
	                    },
	                    callback: {
	                        message: "{{ trans('validation.formvalidation.disponibility.hour_init') }}",
	                        callback: function(value, validator, $field) {
	                            var wednesday_finish = validator.getFieldElements('wednesday_finish').val();
	                            if (wednesday_finish === '' || !TIME_PATTERN.test(wednesday_finish)) {
	                                return true;
	                            }
	                            var startHour    = parseInt(value.split(':')[0], 10),
	                                startMinutes = parseInt(value.split(':')[1], 10),
	                                endHour      = parseInt(wednesday_finish.split(':')[0], 10),
	                                endMinutes   = parseInt(wednesday_finish.split(':')[1], 10);

	                            if (startHour < endHour || (startHour == endHour && startMinutes < endMinutes)) {
	                                // The end time is also valid
	                                // So, we need to update its status
	                                validator.updateStatus('wednesday_finish', validator.STATUS_VALID, 'callback');
	                                return true;
	                            }

	                            return false;
	                        }
	                    }
	                }
	            },
	            wednesday_finish: {
	                validators: {
	                    regexp: {
	                        regexp: TIME_PATTERN,
	                    },
	                    callback: {
	                        message: "{{ trans('validation.formvalidation.disponibility.hour_finish') }}",
	                        callback: function(value, validator, $field) {
	                            var wednesday_init = validator.getFieldElements('wednesday_init').val();
	                            if (wednesday_init == '' || !TIME_PATTERN.test(wednesday_init)) {
	                                return true;
	                            }
	                            var startHour    = parseInt(wednesday_init.split(':')[0], 10),
	                                startMinutes = parseInt(wednesday_init.split(':')[1], 10),
	                                endHour      = parseInt(value.split(':')[0], 10),
	                                endMinutes   = parseInt(value.split(':')[1], 10);

	                            if (endHour > startHour || (endHour == startHour && endMinutes > startMinutes)) {
	                                // The start time is also valid
	                                // So, we need to update its status
	                                validator.updateStatus('wednesday_init', validator.STATUS_VALID, 'callback');
	                                return true;
	                            }

	                            return false;
	                        }
	                    }
	                }
	            },
	            thursday_init: {
	                validators: {
	                    regexp: {
	                        regexp: TIME_PATTERN,
	                    },
	                    callback: {
	                        message: "{{ trans('validation.formvalidation.disponibility.hour_init') }}",
	                        callback: function(value, validator, $field) {
	                            var thursday_finish = validator.getFieldElements('thursday_finish').val();
	                            if (thursday_finish === '' || !TIME_PATTERN.test(thursday_finish)) {
	                                return true;
	                            }
	                            var startHour    = parseInt(value.split(':')[0], 10),
	                                startMinutes = parseInt(value.split(':')[1], 10),
	                                endHour      = parseInt(thursday_finish.split(':')[0], 10),
	                                endMinutes   = parseInt(thursday_finish.split(':')[1], 10);

	                            if (startHour < endHour || (startHour == endHour && startMinutes < endMinutes)) {
	                                // The end time is also valid
	                                // So, we need to update its status
	                                validator.updateStatus('thursday_finish', validator.STATUS_VALID, 'callback');
	                                return true;
	                            }

	                            return false;
	                        }
	                    }
	                }
	            },
	            thursday_finish: {
	                validators: {
	                    regexp: {
	                        regexp: TIME_PATTERN,
	                    },
	                    callback: {
	                        message: "{{ trans('validation.formvalidation.disponibility.hour_finish') }}",
	                        callback: function(value, validator, $field) {
	                            var thursday_init = validator.getFieldElements('thursday_init').val();
	                            if (thursday_init == '' || !TIME_PATTERN.test(thursday_init)) {
	                                return true;
	                            }
	                            var startHour    = parseInt(thursday_init.split(':')[0], 10),
	                                startMinutes = parseInt(thursday_init.split(':')[1], 10),
	                                endHour      = parseInt(value.split(':')[0], 10),
	                                endMinutes   = parseInt(value.split(':')[1], 10);

	                            if (endHour > startHour || (endHour == startHour && endMinutes > startMinutes)) {
	                                // The start time is also valid
	                                // So, we need to update its status
	                                validator.updateStatus('thursday_init', validator.STATUS_VALID, 'callback');
	                                return true;
	                            }

	                            return false;
	                        }
	                    }
	                }
	            },
	            friday_init: {
	                validators: {
	                    regexp: {
	                        regexp: TIME_PATTERN,
	                    },
	                    callback: {
	                        message: "{{ trans('validation.formvalidation.disponibility.hour_init') }}",
	                        callback: function(value, validator, $field) {
	                            var friday_finish = validator.getFieldElements('friday_finish').val();
	                            if (friday_finish === '' || !TIME_PATTERN.test(friday_finish)) {
	                                return true;
	                            }
	                            var startHour    = parseInt(value.split(':')[0], 10),
	                                startMinutes = parseInt(value.split(':')[1], 10),
	                                endHour      = parseInt(friday_finish.split(':')[0], 10),
	                                endMinutes   = parseInt(friday_finish.split(':')[1], 10);

	                            if (startHour < endHour || (startHour == endHour && startMinutes < endMinutes)) {
	                                // The end time is also valid
	                                // So, we need to update its status
	                                validator.updateStatus('friday_finish', validator.STATUS_VALID, 'callback');
	                                return true;
	                            }

	                            return false;
	                        }
	                    }
	                }
	            },
	            friday_finish: {
	                validators: {
	                    regexp: {
	                        regexp: TIME_PATTERN,
	                    },
	                    callback: {
	                        message: "{{ trans('validation.formvalidation.disponibility.hour_finish') }}",
	                        callback: function(value, validator, $field) {
	                            var friday_init = validator.getFieldElements('friday_init').val();
	                            if (friday_init == '' || !TIME_PATTERN.test(friday_init)) {
	                                return true;
	                            }
	                            var startHour    = parseInt(friday_init.split(':')[0], 10),
	                                startMinutes = parseInt(friday_init.split(':')[1], 10),
	                                endHour      = parseInt(value.split(':')[0], 10),
	                                endMinutes   = parseInt(value.split(':')[1], 10);

	                            if (endHour > startHour || (endHour == startHour && endMinutes > startMinutes)) {
	                                // The start time is also valid
	                                // So, we need to update its status
	                                validator.updateStatus('friday_init', validator.STATUS_VALID, 'callback');
	                                return true;
	                            }

	                            return false;
	                        }
	                    }
	                }
	            },
	            saturday_init: {
	                validators: {
	                    regexp: {
	                        regexp: TIME_PATTERN,
	                    },
	                    callback: {
	                        message: "{{ trans('validation.formvalidation.disponibility.hour_init') }}",
	                        callback: function(value, validator, $field) {
	                            var saturday_finish = validator.getFieldElements('saturday_finish').val();
	                            if (saturday_finish === '' || !TIME_PATTERN.test(saturday_finish)) {
	                                return true;
	                            }
	                            var startHour    = parseInt(value.split(':')[0], 10),
	                                startMinutes = parseInt(value.split(':')[1], 10),
	                                endHour      = parseInt(saturday_finish.split(':')[0], 10),
	                                endMinutes   = parseInt(saturday_finish.split(':')[1], 10);

	                            if (startHour < endHour || (startHour == endHour && startMinutes < endMinutes)) {
	                                // The end time is also valid
	                                // So, we need to update its status
	                                validator.updateStatus('saturday_finish', validator.STATUS_VALID, 'callback');
	                                return true;
	                            }

	                            return false;
	                        }
	                    }
	                }
	            },
	            saturday_finish: {
	                validators: {
	                    regexp: {
	                        regexp: TIME_PATTERN,
	                    },
	                    callback: {
	                        message: "{{ trans('validation.formvalidation.disponibility.hour_finish') }}",
	                        callback: function(value, validator, $field) {
	                            var saturday_init = validator.getFieldElements('saturday_init').val();
	                            if (saturday_init == '' || !TIME_PATTERN.test(saturday_init)) {
	                                return true;
	                            }
	                            var startHour    = parseInt(saturday_init.split(':')[0], 10),
	                                startMinutes = parseInt(saturday_init.split(':')[1], 10),
	                                endHour      = parseInt(value.split(':')[0], 10),
	                                endMinutes   = parseInt(value.split(':')[1], 10);

	                            if (endHour > startHour || (endHour == startHour && endMinutes > startMinutes)) {
	                                // The start time is also valid
	                                // So, we need to update its status
	                                validator.updateStatus('saturday_init', validator.STATUS_VALID, 'callback');
	                                return true;
	                            }

	                            return false;
	                        }
	                    }
	                }
	            },
	            sunday_init: {
	                validators: {
	                    regexp: {
	                        regexp: TIME_PATTERN,
	                    },
	                    callback: {
	                        message: "{{ trans('validation.formvalidation.disponibility.hour_init') }}",
	                        callback: function(value, validator, $field) {
	                            var sunday_finish = validator.getFieldElements('sunday_finish').val();
	                            if (sunday_finish === '' || !TIME_PATTERN.test(sunday_finish)) {
	                                return true;
	                            }
	                            var startHour    = parseInt(value.split(':')[0], 10),
	                                startMinutes = parseInt(value.split(':')[1], 10),
	                                endHour      = parseInt(sunday_finish.split(':')[0], 10),
	                                endMinutes   = parseInt(sunday_finish.split(':')[1], 10);

	                            if (startHour < endHour || (startHour == endHour && startMinutes < endMinutes)) {
	                                // The end time is also valid
	                                // So, we need to update its status
	                                validator.updateStatus('sunday_finish', validator.STATUS_VALID, 'callback');
	                                return true;
	                            }

	                            return false;
	                        }
	                    }
	                }
	            },
	            sunday_finish: {
	                validators: {
	                    regexp: {
	                        regexp: TIME_PATTERN,
	                    },
	                    callback: {
	                        message: "{{ trans('validation.formvalidation.disponibility.hour_finish') }}",
	                        callback: function(value, validator, $field) {
	                            var sunday_init = validator.getFieldElements('sunday_init').val();
	                            if (sunday_init == '' || !TIME_PATTERN.test(sunday_init)) {
	                                return true;
	                            }
	                            var startHour    = parseInt(sunday_init.split(':')[0], 10),
	                                startMinutes = parseInt(sunday_init.split(':')[1], 10),
	                                endHour      = parseInt(value.split(':')[0], 10),
	                                endMinutes   = parseInt(value.split(':')[1], 10);

	                            if (endHour > startHour || (endHour == startHour && endMinutes > startMinutes)) {
	                                // The start time is also valid
	                                // So, we need to update its status
	                                validator.updateStatus('sunday_init', validator.STATUS_VALID, 'callback');
	                                return true;
	                            }

	                            return false;
	                        }
	                    }
	                }
	            },
	            dob: {
	                excluded: false,    // Don't ignore me
	                validators: {
	                    callback: {
	                        message: "{{ trans('validation.formvalidation.disponibility.hour_all') }}",
	                        callback: function (value, validator, $field) {
	                            if($('[name="dob"]').val() == ''){
	                                $('#monday_init').closest('.form-group').removeClass('has-success').addClass('has-error').find('.help-block').css('display','none');
	                                $('#tuesday_init').closest('.form-group').removeClass('has-success').addClass('has-error').find('.help-block').css('display','none');
	                                $('#wednesday_init').closest('.form-group').removeClass('has-success').addClass('has-error').find('.help-block').css('display','none');
	                                $('#thursday_init').closest('.form-group').removeClass('has-success').addClass('has-error').find('.help-block').css('display','none');
	                                $('#friday_init').closest('.form-group').removeClass('has-success').addClass('has-error').find('.help-block').css('display','none');
	                                $('#saturday_init').closest('.form-group').removeClass('has-success').addClass('has-error').find('.help-block').css('display','none');
	                                $('#sunday_init').closest('.form-group').removeClass('has-success').addClass('has-error').find('.help-block').css('display','none');
	                                $('#monday_finish').closest('.form-group').removeClass('has-success').addClass('has-error').find('.help-block').css('display','none');
	                                $('#tuesday_finish').closest('.form-group').removeClass('has-success').addClass('has-error').find('.help-block').css('display','none');
	                                $('#wednesday_finish').closest('.form-group').removeClass('has-success').addClass('has-error').find('.help-block').css('display','none');
	                                $('#thursday_finish').closest('.form-group').removeClass('has-success').addClass('has-error').find('.help-block').css('display','none');
	                                $('#friday_finish').closest('.form-group').removeClass('has-success').addClass('has-error').find('.help-block').css('display','none');
	                                $('#saturday_finish').closest('.form-group').removeClass('has-success').addClass('has-error').find('.help-block').css('display','none');
	                                $('#sunday_finish').closest('.form-group').removeClass('has-success').addClass('has-error').find('.help-block').css('display','none');
	                                return false;
	                            }else{
	                                return true;
	                            }
	                        }
	                    }
	                }
	            },
	            days_without_service_from: {
	                validators: {
	                    callback: {
	                        message: "{{ trans('validation.formvalidation.disponibility.date_init') }}",
	                        callback: function(value, validator, $field) {
	                            var startDate = value.replace('-', '').replace('-', '');
	                            var endDate = $('#days_without_service_to').val().replace('-', '').replace('-', '');

	                            $('#add_date_without_service').prop('disabled', true);

	                            if (endDate == '') {
	                                return true;
	                            }else if (endDate == '' && startDate == '') {
	                                return true;
	                            }else if(parseInt(startDate) < parseInt(endDate)){
	                                $('#add_date_without_service').prop('disabled', false);
	                                return true;
	                            }else{
	                                return false;
	                            }
	                        }
	                    }
	                }
	            },
	            days_without_service_to: {
	                validators: {
	                    callback: {
	                        message: "{{ trans('validation.formvalidation.disponibility.date_finish') }}",
	                        callback: function(value, validator, $field) {
	                            var startDate = $('#days_without_service_from').val().replace('-', '').replace('-', '');
	                            var endDate = value.replace('-', '').replace('-', '');

	                            $('#add_date_without_service').prop('disabled', true);

	                            if (startDate == '') {
	                                return true;
	                            }else if (endDate == '' && startDate == '') {
	                                return true;
	                            }else if(parseInt(endDate) > parseInt(startDate)){
	                                $('#add_date_without_service').prop('disabled', false);
	                                return true;
	                            }else{
	                                return false;
	                            }
	                        }
	                    }
	                }
	            },
	            status_id: {
	                validators: {
	                    notEmpty: {}
	                }
	            }
	        }
	    })
	    // To use the 'change' event, use CKEditor 4.2 or later
	    .find('[name="description_content"]').ckeditor().editor.on('change', function(evt) {
	        // Set content
	        $('#description').val(CKEDITOR.instances.description_content.getData());
	        // Revalidate the description field
	        $('#formValidation').formValidation('revalidateField', 'description_content');
	    });

	    $('#description').val(CKEDITOR.instances.description_content.getData());
	});

	// Event Types
	$('#check_event_types').click(function(){
	    $('#checkbox_evnet_type_container input[type="checkbox"]').prop('checked', true);
	    $('#formValidation').formValidation('revalidateField', 'event_type_id[]');
	});

	$('#uncheck_event_types').click(function(){
	    $('#checkbox_evnet_type_container input[type="checkbox"]').prop('checked', false);
	    $('#formValidation').formValidation('revalidateField', 'event_type_id[]');
	});

	// Schedules
	// changeTimePicker is a function called for timepicker.call.js
	function changeTimePicker(){
	    // the input field
	    var monday_init = $('#formValidation').find('[name="monday_init"]').val(),
	        tuesday_init = $('#formValidation').find('[name="tuesday_init"]').val(),
	        wednesday_init = $('#formValidation').find('[name="wednesday_init"]').val(),
	        thursday_init = $('#formValidation').find('[name="thursday_init"]').val(),
	        friday_init = $('#formValidation').find('[name="friday_init"]').val(),
	        saturday_init = $('#formValidation').find('[name="saturday_init"]').val(),
	        sunday_init = $('#formValidation').find('[name="sunday_init"]').val(),
	        monday_finish = $('#formValidation').find('[name="monday_finish"]').val(),
	        tuesday_finish = $('#formValidation').find('[name="tuesday_finish"]').val(),
	        wednesday_finish = $('#formValidation').find('[name="wednesday_finish"]').val(),
	        thursday_finish = $('#formValidation').find('[name="thursday_finish"]').val(),
	        friday_finish = $('#formValidation').find('[name="friday_finish"]').val(),
	        saturday_finish = $('#formValidation').find('[name="saturday_finish"]').val(),
	        sunday_finish = $('#formValidation').find('[name="sunday_finish"]').val();

	    // Set the dob field value
	    $('#formValidation').find('[name="dob"]').val(
	    											monday_init === '' &&
	    											tuesday_init === '' &&
	    											wednesday_init === '' &&
	    											thursday_init === '' &&
	    											friday_init === '' &&
	    											saturday_init === '' &&
	    											sunday_init === '' &&
	    											monday_finish === '' &&
	    											tuesday_finish === '' &&
	    											wednesday_finish === '' &&
	    											thursday_finish === '' &&
	    											friday_finish === '' &&
	    											saturday_finish === '' &&
	    											sunday_finish === '' ?
	    											'' : [
	    													monday_init,
	    													tuesday_init,
	    													wednesday_init,
	    													thursday_init,
	    													friday_init,
	    													saturday_init,
	    													sunday_init,
	    													monday_finish,
	    													tuesday_finish,
	    													wednesday_finish,
	    													thursday_finish,
	    													friday_finish,
	    													saturday_finish,
	    													sunday_finish
	    												  ].join('.'));

	    // Revalidate it

	    $('#formValidation').
	                    formValidation('revalidateField', 'monday_init').
	                    formValidation('revalidateField', 'tuesday_init').
	                    formValidation('revalidateField', 'wednesday_init').
	                    formValidation('revalidateField', 'thursday_init').
	                    formValidation('revalidateField', 'friday_init').
	                    formValidation('revalidateField', 'saturday_init').
	                    formValidation('revalidateField', 'sunday_init').
	                    formValidation('revalidateField', 'monday_finish').
	                    formValidation('revalidateField', 'tuesday_finish').
	                    formValidation('revalidateField', 'wednesday_finish').
	                    formValidation('revalidateField', 'thursday_finish').
	                    formValidation('revalidateField', 'friday_finish').
	                    formValidation('revalidateField', 'saturday_finish').
	                    formValidation('revalidateField', 'sunday_finish').
	                    formValidation('revalidateField', 'dob');
	}

	// Dates without Service
	$('#days_without_service_from').change(function(){
	    // Validate the date when user change it
	    $('#formValidation').formValidation('revalidateField', 'days_without_service_from');
	    $('#formValidation').formValidation('revalidateField', 'days_without_service_to');
	});

	$('#days_without_service_to').change(function(){
	    // Validate the date when user change it
	    $('#formValidation').formValidation('revalidateField', 'days_without_service_from');
	    $('#formValidation').formValidation('revalidateField', 'days_without_service_to');
	});

	$('#add_date_without_service').click(function(){
	    var startDate = $('#days_without_service_from').val();
	    var endDate = $('#days_without_service_to').val();

	    var row = "<tr>";
	            row += "<td class='text-center'>";
	                row += "<input name='dates_without_service_from[]' type='hidden' value='"+ startDate +"'>"+ startDate;
	            row += "</td>";
	            row += "<td class='text-center'>";
	                row += "<input name='dates_without_service_to[]' type='hidden' value='"+ endDate +"'>"+ endDate;
	            row += "</td>";
	            row += "<td class='text-center'>";
	                row += "<button type='button' class='btn btn-danger' onclick='deleteDaysWithoutService(this)'>{{ trans('strings.crud.delete') }}</button>";
	            row += "</td>";
	        row += "</tr>";

	    $('#tableDatesWithoutService').find('tbody').append(row);

	    $('#days_without_service_from').val('');
	    $('#days_without_service_to').val('');
	    $('#formValidation').formValidation('resetField', 'days_without_service_from');
	    $('#formValidation').formValidation('resetField', 'days_without_service_to');
	});

	function deleteDaysWithoutService(btn){
	    $(btn).closest('tr').remove();
	}
</script>
