<div class="input-group mb-3" x-date="datepicker">
  <input type="text" class="form-control datepicker"  readonly placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary btn-datepicker" type="button" @click="openDatePicker"><i class="fa fa-calendar"></i></button>
  </div>
</div>

<script>
	document.addEventListener('alpine:init',() => {
		
	});
</script>