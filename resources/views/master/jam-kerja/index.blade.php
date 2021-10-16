@extends('layout.app')
@section('content')
	<div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Master Jam Kerja</h1>
          <p>Table to display analytical data effectively</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active"><a href="#">Data Table</a></li>
        </ul>
    </div>
	<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
			  
			  <button class="btn btn-outline-primary" type="button" @click="openForm(0)"><i class="fa fa-plus"></i> Tambah</button>
			  <hr>
              
			  <div class="table-responsive">
                <table class="table table-hover table-bordered" id="datatable">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Position</th>
                      <th>Office</th>
                      <th>Age</th>
                      <th>Start date</th>
                      <th>Salary</th>
                    </tr>
                  </thead>
				</table>
			  </div>
			</div>
		  </div>
		</div>
	</div>
@endsection

@section('modal')
	
<div class="modal fade" id="myModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Form Jam Kerja</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
		<div class="form-group row">
			<label class="col-md-3">Tanggal</label>
			<div class="col-md-3">
				@include('components.datepicker')
			</div>
		</div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> TUTUP</button>
		<button type="button" class="btn btn-success"><i class="fa fa-save"></i> SIMPAN</button>
      </div>

    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
	document.addEventListener('alpine:init',() => {
		Alpine.data("content",() => ({
			init() {
				this.table = $('#datatable').DataTable();
				$('.datepicker').datepicker({
					container:'#myModal'
				});
			},
			openForm(id) {
				$('#myModal').modal('show');
			}
		}));
	});
</script>
@endpush
