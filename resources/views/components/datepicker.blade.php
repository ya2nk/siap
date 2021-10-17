<div class="input-group mb-3">
  <input type="text" class="form-control datepicker-component" readonly  aria-label="Recipient's username" aria-describedby="basic-addon2" id="{{ $id }}" 
	value="{{ @$value }}" x-model="{{ $model }}" x-init="{{ $id }}Init" x-ondatepick{{ isset($event) ? ".".$event : "" }}>
  <div class="input-group-append">
    <button class="btn btn-outline-secondary btn-datepicker" type="button" @click="{{ $id }}ButtonClick"><i class="fa fa-calendar"></i></button>
  </div>
</div>

<script>
	function {{ $id }}Init(){
		$('#{{ $id }}').datepicker({
			autoclose:true,
			format:'yyyy-mm-dd'
		});
	}
	
	function {{ $id }}ButtonClick() {
		$(this.$el).parent().parent().find('.datepicker-component').datepicker('show')
	}
</script>

