@extends('layouts.app')

@section('content')
<div style="margin-top:60px;"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-primary">
		                <div class="panel-heading">
		                	<b>Profil Pengguna</b>
		                	<div class="pull-right">
	                			{{ csrf_field() }}
	                			<button type="button" class="btn btn-xs btn-default" data-id="{{$profil->id}}" data-nama="{{$profil->nama}}" data-email="{{$profil->email}}" data-toggle="modal" data-target="#edit_profil" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Edit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button> &nbsp;
	                		</div>
		                </div>
		                <div class="panel-body">
		                	<label for="nama" class="col-sm-3 col-form-label">Nama</label>
		                	<label for="nama" class="col-sm-6 col-form-label">: {{ Auth::user()->nama }}</label> 	
		                </div>
		                <div class="panel-body">
		                	<label for="email" class="col-sm-3 col-form-label">Email</label>
		                	<label for="email" class="col-sm-6 col-form-label">: {{ Auth::user()->email }}</label>	
		                </div>
		                <div class="panel-body">
		                	<label for="created_at" class="col-sm-3 col-form-label">Bergabung Sejak</label>
		                	<label for="created_at" class="col-sm-6 col-form-label">: {{ Auth::user()->created_at->diffForHumans() }}</label>   	
		                </div>
		                <div class="panel-footer">
			  				<a href="{{ route('changePassword') }}" class="btn btn-primary" role="button">Change Password</a>
		                </div>
	            </div>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="edit_profil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title text-center" id="myModalLabel">Edit Profile</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					      
	<!--Form Dalam Modal -->
					<form role="form" action="{{route('editProfil')}}" enctype="multipart/form-data" method="post">{{csrf_field()}}
						<div class="box-body">
							<div class="form-group">
								<input type="hidden" name="id" id="id" class="form-control" value="">
							</div>
							<div class="form-group row">
							    <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
							    <div class="col-sm-10">
							      <input type="text" class="form-control" id="nama" name="nama">
							    </div>
							</div>
							<div class="form-group row">
							    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
							    <div class="col-sm-10">
							      <input type="text" class="form-control" id="email" name="email">
							    </div>
							</div>
							<div class="form-group row">
							    <div class="col-md-10 col-md-offset-2">
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                        Close
                                    </button>
                                </div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
    <!-- footer -->
    <footer style="position: fixed; bottom: 0; text-align: center; width: 100%;">
      <div class="container text-center">
        <div class="row">
          <div class="col-sm-12">
            <p>&copy; copyright 2019 by Riowaldy Indrawan.</p>
          </div>
        </div>
      </div>
    </footer>
      
    <!-- Akhir footer -->
<div class="col-sm-12 text-center">
  <p>&copy; 2019 | Riowaldy Indrawan</p>
</div>
@endsection





	