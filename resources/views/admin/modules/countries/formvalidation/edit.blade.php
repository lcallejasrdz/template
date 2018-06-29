<script>
    $(document).ready(function() {
        $('#formValidation').formValidation({
            fields: {
                name: {
                    validators: {
                        notEmpty: {},
                        stringLength: {
                            min: 3,
                            max: 255
                        }
                    }
                }
            }
        });
    });
</script>
