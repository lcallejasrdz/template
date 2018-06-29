$('#rootwizard').bootstrapWizard({
    'tabClass': 'nav nav-pills',
    'onNext': function(tab, navigation, index) {
        var numTabs    = $('#formValidation').find('.tab-pane').length,
            isValidTab = validateTab(index - 1);
        if (!isValidTab) {
            return false;
        }

        return true;

        // var $validator = $('#formValidation').data('formValidation').validate();
        // return $validator.isValid();
    },
    onTabClick: function(tab, navigation, index) {
        return false;
    },
    onTabShow: function(tab, navigation, index) {
        var total = navigation.find('li').length;
        var current = index + 1;

        // If it's the last tab then hide the last button and show the finish instead
        if (current >= total) {
            $('#rootwizard').find('.pager .next').hide();
            $('#rootwizard').find('.pager .finish').show();
            $('#rootwizard').find('.pager .finish').removeClass('disabled');
        } else {
            $('#rootwizard').find('.pager .next').show();
            $('#rootwizard').find('.pager .finish').hide();
        }
    }
});

$('#rootwizard .finish').click(function () {
    var validator = $('#formValidation').data('formValidation').validate();
    if (validator.isValid()) {
        document.getElementById("formValidation").submit();
    }
});

function validateTab(index) {
    var fv   = $('#formValidation').data('formValidation'), // FormValidation instance
        // The current tab
        tab = $('#formValidation').find('.tab-pane').eq(index);

    // Validate the container
    fv.validateContainer(tab);

    var isValidStep = fv.isValidContainer(tab);
    if (isValidStep === false || isValidStep === null) {
        // Do not jump to the target tab
        return false;
    }

    return true;
}