// Event
$( "#category_id" ).change(function(event){
    getSubcategories(event.target.value)
});
$( "#country_id" ).change(function(event){
    getStates(event.target.value)
});
$( "#state_id" ).change(function(event){
    getCities(event.target.value)
});

//Function
function getSubcategories(value){
    if(value == '' || value == null)
    {
        $( "#subcategory_id" ).find("option:gt(0)").remove();
    }
    else
    {
        $.get(direction+"/dynamic-selects/subcategories/"+value, function(response, value){
            $( "#subcategory_id" ).find("option:gt(0)").remove();
            for(i=0; i<response.length; i++){
                $( "#subcategory_id" ).append("<option value='"+ response[i].id +"'>"+ response[i].name +"</option>");
            }
        });
    }
}
function getStates(value){
    if(value == '' || value == null)
    {
        $( "#state_id" ).find("option:gt(0)").remove();
        $( "#city_id" ).find("option:gt(0)").remove();
    }
    else
    {
        $.get(direction+"/dynamic-selects/states/"+value, function(response, value){
            $( "#state_id" ).find("option:gt(0)").remove();
            $( "#city_id" ).find("option:gt(0)").remove();
            for(i=0; i<response.length; i++){
                $( "#state_id" ).append("<option value='"+ response[i].id +"'>"+ response[i].name +"</option>");
            }
        });
    }
}
function getCities(value){
    if(value == '' || value == null)
    {
        $( "#city_id" ).find("option:gt(0)").remove();
    }
    else
    {
        $.get(direction+"/dynamic-selects/cities/"+value, function(response, value){
            $( "#city_id" ).find("option:gt(0)").remove();
            for(i=0; i<response.length; i++){
                $( "#city_id" ).append("<option value='"+ response[i].id +"'>"+ response[i].name +"</option>");
            }
        });
    }
}
