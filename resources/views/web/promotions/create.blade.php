@extends('layouts.app')

@section('content')
<div class="col-md-6 col-md-offset-3">
	{!! Form::open(['route' => 'promociones.store', 'id' => 'frmAddPromotion']) !!}
	<div class="panel panel-flat no-border-radius border-top-primary">
		
		@include('web.promotions.complementos.form')

		<div class="panel-footer pb-5 pt-5">
			<div class="text-right">
				<button type="submit" class="btn border-slate text-slate-800 btn-flat">Agregar Promoción <i class="icon-arrow-right14 position-right"></i></button>
			</div>
		</div>
	</div>
	{!! Form::close() !!}
</div>
@endsection

@push('js')
{!! Html::script('assets/js/plugins/forms/inputs/maxlength.min.js') !!}
{!! Html::script('vendor/jsvalidation/js/jsvalidation.js') !!}
{!! JsValidator::formRequest('Cpanel\Http\Requests\PromotionStoreRequest', '#frmAddPromotion') !!}

<script>
	$(function() {
		$('.maxlength').maxlength({
			alwaysShow: true
		})
		
		$('.daterange').daterangepicker({
			applyClass: 'bg-slate-600',
			cancelClass: 'btn-default',
			autoUpdateInput: false,
			locale: {
				applyLabel: 'Aplicar',
				cancelLabel: 'Cancelar',
				cancelLabel: 'Clear'
			}
		});

		$('.daterange').on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
		});

		$('.daterange').on('cancel.daterangepicker', function(ev, picker) {
			$(this).val('');
		});

		$("input[name=emphasis]").on('change', function() {
			if( $(this).is(':checked') ) {
				$('#summary').attr('disabled', false);
				$('#summary-div').removeClass('hidden');
			}else{
				$('#summary').attr('disabled', true);
				$('#summary-div').addClass('hidden');
			}
		});

		$('#type').change(function(event) {
			if ($(this).val() == 'categorias') {
				$('#product_categorie_id').attr('disabled', false);
				$('#category-div').removeClass('hidden');
				$('#product_id').attr('disabled', true);
				$('#item-div').addClass('hidden');
			}else if($(this).val() == 'articulos') {
				$('#product_categorie_id').attr('disabled', false);
				$('#category-div').removeClass('hidden');
				$('#product_id').attr('disabled', false)
				$('#item-div').removeClass('hidden');
			}else{
				$('#product_categorie_id').attr('disabled', true);
				$('#category-div').addClass('hidden');
				$('#product_id').attr('disabled', true);
				$('#item-div').addClass('hidden');
			}
		});

		$('#product_categorie_id').change(function(event) {
			if ($('#product_id').prop('disabled') == false) {
				$.ajax({
					url: '{{ route('promociones.articulos', ':ID') }}'.replace(':ID', $(this).val()),
					dataType: 'json',
				})
				.done(function(data) {
					var cbo = '<option value="">Artículo</option>'
					$.each(data, function(index, val) {
						cbo += '<option value="'+val.id+'">'+val.description+'</option>'
					});
					$('#product_id').html(cbo)
				})
				.fail(function(data) {
				})
			}
		});
	});
</script>
@endpush