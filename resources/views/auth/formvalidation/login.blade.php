<script>
	$(document).ready(function() {
	    $('#formValidation').formValidation({
        	locale: '{{ \App::getLocale() == 'es' ? 'es_ES' : 'en_US' }}',
	        fields: {
	            email: {
	                validators: {
	                    notEmpty:{},
	                    emailAddress:{}
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
	        }
	    });
	});
</script>
