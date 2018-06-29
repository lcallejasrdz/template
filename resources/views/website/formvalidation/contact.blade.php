<script>
	$(document).ready(function() {
	    $('#formValidation').formValidation({
        	locale: '{{ \App::getLocale() == 'es' ? 'es_ES' : 'en_US' }}',
	        fields: {
	            name: {
	                validators: {
	                    notEmpty:{},
	                    stringLength: {
	                    	min: 6,
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
                phone: {
                    validators: {
                        notEmpty: {},
                        stringLength: {
                            min: 4,
                            max: 25
                        }
                    }
                },
                message: {
                    validators: {
                        notEmpty: {},
                        stringLength: {
                            min: 3,
                            max: 1000
                        }
                    }
                }
	        }
	    });
	});
</script>
