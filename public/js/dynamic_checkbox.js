//Function
function getCategoriesCheck(){
    $( "#checkbox_subcategories_container" ).find(".checkbox").remove();
    $('#formValidation').formValidation('revalidateField', 'subcategories_res');

    var selectedItems = new Array();
    $('[name="category_id[]"]:checked').each(function(){
        selectedItems.push($(this).val());
    });

    var elements = '?';
    var control = 0;

    selectedItems.forEach(function(element) {
        if(control == 0){
            elements += 'categories[]='+element;
        }else{
            elements += '&categories[]='+element;
        }
        control++;
    });

    if(selectedItems.length > 0){
        $.get(direction+"/dynamic-checkbox/subcategories"+elements,function(response, subcategories){
            for(i=0; i<response.length; i++){
                $("<div class='checkbox'><label><input type='checkbox' name='subcategory_id[]' value='"+ response[i].id +"' onChange='getSubcategoriesCheck();' /> "+ response[i].name +"</label></div>").insertBefore($( "#checkbox_subcategories_container" ).find("#subcategories_res"));
            }
        });
    }
}
function getSubcategoriesCheck(){
    $('#formValidation').formValidation('revalidateField', 'subcategories_res');
}
function getCountriesCheck(){
    $( "#checkbox_states_container" ).find(".checkbox").remove();
    $( "#checkbox_cities_container" ).find(".checkbox").remove();
    $('#formValidation').formValidation('revalidateField', 'states_res');
    $('#formValidation').formValidation('revalidateField', 'cities_res');

    var selectedItems = new Array();
    $('[name="country_id[]"]:checked').each(function(){
        selectedItems.push($(this).val());
    });

    var elements = '?';
    var control = 0;

    selectedItems.forEach(function(element) {
        if(control == 0){
            elements += 'countries[]='+element;
        }else{
            elements += '&countries[]='+element;
        }
        control++;
    });

    if(selectedItems.length > 0){
        $.get(direction+"/dynamic-checkbox/states"+elements,function(response, states){
            for(i=0; i<response.length; i++){
                $("<div class='checkbox'><label><input type='checkbox' name='state_id[]' value='"+ response[i].id +"' onChange='getStatesCheck();' /> "+ response[i].name +"</label></div>").insertBefore($( "#checkbox_states_container" ).find("#states_res"));
            }
        });
    }
}
function getStatesCheck(){
    $( "#checkbox_cities_container" ).find(".checkbox").remove();
    $('#formValidation').formValidation('revalidateField', 'states_res');
    $('#formValidation').formValidation('revalidateField', 'cities_res');

    var selectedItems = new Array();
    $('[name="state_id[]"]:checked').each(function(){
        selectedItems.push($(this).val());
    });

    var elements = '?';
    var control = 0;

    selectedItems.forEach(function(element) {
        if(control == 0){
            elements += 'states[]='+element;
        }else{
            elements += '&states[]='+element;
        }
        control++;
    });

    if(selectedItems.length > 0){
        $.get(direction+"/dynamic-checkbox/cities"+elements,function(response, cities){
            for(i=0; i<response.length; i++){
                $("<div class='checkbox'><label><input type='checkbox' name='city_id[]' value='"+ response[i].id +"' onChange='getCitiesCheck();' /> "+ response[i].name +"</label></div>").insertBefore($( "#checkbox_cities_container" ).find("#cities_res"));
            }
        });
    }
}
function getCitiesCheck(){
    $('#formValidation').formValidation('revalidateField', 'cities_res');
}
