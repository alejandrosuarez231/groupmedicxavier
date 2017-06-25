jQuery.fn.resetear = function () {
	$(this).each (function() { this.reset(); });
}

function formSend(form) {
	console.log(form)
	$.ajax({
		url: form.attr('action'),
		type: form.attr('method'),
		dataType: 'json',
		data: form.serialize(),
	})
	.done(function(data) {
		$('.modal').modal('hide')
		$('table').DataTable().ajax.reload()
		$.jGrowl(data.message, {
			header: data.title,
			theme: 'bg-info-400'
		});
	})
	.fail(function(jqXhr, json, errorThrown ) {
		var errors = jqXhr.responseJSON;
		var errorsHtml = '<ul>';
		$.each( errors, function( key, value ) {
			errorsHtml += '<li>'+value[0]+'</li>';
		});
		errorsHtml += '</ul>';
		$.jGrowl(errorsHtml, {
			header: 	'Errores',
			width: 		'500px',
			theme: 		'alert-styled-left bg-danger',
			corners: 	'0px',
		});
	})
}

function deleteElement(route)
{
	var form = $('#formDelete')
	$.ajax({
		url: route,
		type: form.attr('method'),
		dataType: 'json',
		data: form.serialize(),
	})
	.done(function(data) {
		$('table').DataTable().ajax.reload()
		$.jGrowl(data.message, {
			header: data.title,
			theme: 'bg-info-400'
		});
	})
}

function restoreElement(route)
{
	var form = $('#formDelete')
	$.ajax({
		url: route,
		dataType: 'json',
	})
	.done(function(data) {
		$('table').DataTable().ajax.reload()
		$.jGrowl(data.message, {
			header: data.title,
			theme: 'bg-info-400'
		});
	})
}

function destroyElement(route)
{
	swal({
		title: '¿Esta seguro de eliminar este elemento?',
		text: "No podrá revertir esta acción!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#00838f',
		cancelButtonColor: 	'#ef5350',
		confirmButtonText: 	'Sí, estoy seguro!',
		cancelButtonText: 	'Cancelar!',
	},function(){
		var form = $('#formDelete')
		$.ajax({
			url: route,
			type: form.attr('method'),
			dataType: 'json',
			data: form.serialize(),
		})
		.done(function(data) {
			$('table').DataTable().ajax.reload()
			$.jGrowl(data.message, {
				header: data.title,
				theme: 'bg-info-400'
			});
		})
	});
}

function deleteComplete(route)
{
	
}


$('.panel [data-action=reload]').click(function (e) {
        e.preventDefault();
        var block = $(this).parent().parent().parent().parent().parent();
        $(block).block({ 
            message: '<i class="icon-spinner2 spinner"></i>',
            overlayCSS: {
                backgroundColor: '#fff',
                opacity: 0.8,
                cursor: 'wait',
                'box-shadow': '0 0 0 1px #ddd'
            },
            css: {
                border: 0,
                padding: 0,
                backgroundColor: 'none'
            }
        });

        window.setTimeout(function () {
			$('table').DataTable().ajax.reload()
           	$(block).unblock();
        }, 1000);

    });