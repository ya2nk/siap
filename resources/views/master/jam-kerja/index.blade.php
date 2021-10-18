@extends('layout.app')
@section('content')
	<style>
		#datatable th,
		#datatable td {
			font-size: 11px;
        
		}
	</style>
	<div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Master Jam Kerja</h1>
          <p>Master Jam Kerja</p>
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
                <table class="table table-hover table-bordered" id="datatable" width="100%">
                  <thead>
                    <tr>
					  <th>Aksi</th>
                      <th>Nama</th>
                      <th>Kode</th>
                      <th>Chekin Start</th>
                      <th>Chekin End</th>
                      <th>Chekout Start</th>
                      <th>Chekout End</th>
					  <th>Istirahat Start</th>
                      <th>Istirahat End</th>
					  <th>Jam Masuk</th>
                      <th>Jam Pulang</th>
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
	
<div class="modal fade" id="myModal" @onselectdate="alert($event.detail)">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Form Jam Kerja</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
		<form id="form">
			<div class="form-group row">
				<label class="col-md-3">Nama Jam Kerja</label>
				<div class="col-md-6">
					<input type="text" class="form-control" x-model="form.name" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-md-3">Kode</label>
				<div class="col-md-6">
					<input type="text" class="form-control" x-model="form.code">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-md-3">Checkin Start</label>
				<div class="col-md-2">
					<input type="text" class="form-control" x-model="form.checkin_start" data-inputmask='"mask": "99:99"' data-mask>
				</div>
				<label class="col-md-2">Checkin End</label>
				<div class="col-md-2">
					<input type="text" class="form-control" x-model="form.checkin_end" data-inputmask='"mask": "99:99"' data-mask>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-md-3">Checkout Start</label>
				<div class="col-md-2">
					<input type="text" class="form-control" x-model="form.checkout_start" data-inputmask='"mask": "99:99"' data-mask>
				</div>
				<label class="col-md-2">Checkout End</label>
				<div class="col-md-2">
					<input type="text" class="form-control" x-model="form.checkout_end" data-inputmask='"mask": "99:99"' data-mask>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-md-3">Istirahat Start</label>
				<div class="col-md-2">
					<input type="text" class="form-control" x-model="form.istirahat_start" data-inputmask='"mask": "99:99"' data-mask>
				</div>
				<label class="col-md-2">Istirahat End</label>
				<div class="col-md-2">
					<input type="text" class="form-control" x-model="form.istirahat_end" data-inputmask='"mask": "99:99"' data-mask>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-md-3">Jam Masuk</label>
				<div class="col-md-2">
					<input type="text" class="form-control" x-model="form.jam_masuk" data-inputmask='"mask": "99:99"' data-mask>
				</div>
				<label class="col-md-2">Jam Pulang</label>
				<div class="col-md-2">
					<input type="text" class="form-control" x-model="form.jam_pulang" data-inputmask='"mask": "99:99"' data-mask>
				</div>
			</div>
		</form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> TUTUP</button>
		<button type="button" class="btn btn-success" @click="doSave()"><i class="fa fa-save"></i> SIMPAN</button>
      </div>

    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
	document.addEventListener('alpine:init',() => {
		Alpine.data("content",() => ({
			form:{
				id:0,
				name:"",
				code:"",
				checkin_start:"00:00",
				checkin_end:"00:00",
				checkout_start:"00:00",
				checkout_end:"00:00",
				istirahat_start:"00:00",
				istirahat_end:"00:00",
				jam_masuk:"00:00",
				jam_pulang:"00:00",
			},
			init() {
				this.table = $('#datatable').DataTable({
					serverSide:true,
					processing:true,
					ajax:{
						url:"{{ url('master/jam-kerja/data') }}",
						type:'POST',
						data: (d) => {
							
						}
					},
					columns:[
						{data:"aksi",orderable:false,render:function(data,type,row){
							return "test";
						}},
						{data:"name"},
						{data:"code"},
						{data:"checkin_start"},
						{data:"checkin_end"},
						{data:"checkout_start"},
						{data:"checkout_end"},
						{data:"istirahat_start"},
						{data:"istirahat_end"},
						{data:"jam_masuk"},
						{data:"jam_pulang"},
					]
				});
				
				
			},
			openForm(id) {
				$('#myModal').modal('show');
			},
			doSave() {
				var form = $('#form');
					form.validate();
					
					
				
				if (form.valid()) {
					axios.post("{{ url('master/jam-kerja/save') }}",this.form).then( resp => {
						console.log(resp)
					})
				}
			}
		}));
	});
</script>
@endpush
