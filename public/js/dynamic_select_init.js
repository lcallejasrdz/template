// Init
$(document).ready(function() {
    getSubcategories($( "#category_id" ).val());
    getStates($( "#country_id" ).val());
    getCities($( "#state_id" ).val());
});
