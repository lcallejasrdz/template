<script>
	var rowsArray = $('#datatables tbody').attr("data-rows").split(',');
	var final = [];
	$.each(rowsArray, function(i, val){ final.push({data:val, name:val}); });
	final.push({ data:'actions',name:'actions',orderable:false,searchable:false});
	var active = $('#datatables tbody').attr("data-active");
	var model = $('#datatables tbody').attr("data-model");
	var view = $('#datatables tbody').attr("data-view");
	var actions = $('#datatables tbody').attr("data-actions");
	var ajaxDirection = direction+'/admin/data?model='+model+'&active='+active+'&view='+view+'&actions='+actions;
	@if(\App::getLocale() == 'es')
		var language = 'https://cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json';
	@else
		var language = 'https://cdn.datatables.net/plug-ins/1.10.15/i18n/English.json';
	@endif
	$('#datatables').DataTable({
	  processing: true,
	  serverSide: true,
	  deferRender: true,
	  ajax: {
	    url: ajaxDirection,
	    type: 'POST',
	    headers: {
	        'X-CSRF-TOKEN': $('[name="_token"]').val(),
	    }
	  },
	  columns: final,
	  language: { "url": language}
	});
</script>
