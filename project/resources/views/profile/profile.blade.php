@extends('layouts.app')
@push('top-scripts')

@endpush
@section('content')

<div class="col-md-8 col-lg-12">
	<div class="row">
		<div class="col-md-10" style="margin-top: 10px ; text-align: center;">

			@if(Session::has('success_message'))
			<div class="alert alert-success text-success">
				{{Session::get('success_message')}}
			</div>
			@endif

		</div>
	</div>

	<div class="tabs">
		<ul class="nav nav-tabs tabs-primary">
			<li class="active">
				<a href="#overview" data-toggle="tab">Overview</a>
			</li>
			<li>
				<a href="#edit" class="editfrom" data-id="{{Auth::user()->id}}" data-toggle="tab">Edit</a>
			</li>
		</ul>

		<div class="tab-content">
			
			<div id="overview" class="tab-pane active" >

				<div class="row">
					<div class="panel panel-default">
						<button type="button"  style="color: black; float: right;padding: 0px 7px;font-size: 16px;" class="btn btn-default modal-dismiss">&times;</button>
						<div class="panel-heading">  <h4 >User Profile</h4></div>
						<div class="panel-body">
							<div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
								@if(!empty(Auth::user()->photo))
								<img style="width: 200px; height: 200px" alt="User Pic" src="{{asset('/uploads/userphoto/'. Auth::user()->photo)}}"  id="profile-image1" class="img-circle img-responsive"> 
								@else
								<img style="width: 200px; height: 200px" alt="User Pic" src="{{asset('/uploads/userphoto/profile.jpg')}}" id="profile-image1" class="img-circle img-responsive"> 
								@endif
							</div>
							<div class="col-md-8 col-xs-12 col-sm-6col-lg-4" >
								<div class="container" >
									@if(!empty(Auth::user()->name))
									<h2>{{Auth::user()->name}}</h2>
									@endif
									
								</div>
								<hr>

								<ul class="container details" >
									
									@if(!empty(Auth::user()->email))
									<p><span class="glyphicon glyphicon-envelope one"></span>  {{Auth::user()->email}}</p>
									@endif
								</ul>
								<hr>
								@if(!empty(Auth::user()->created_at))
								<div class="col-sm-5 col-lg-4  "><span class="glyphicon glyphicon-calendar" >{{ Auth::user()->created_at->format('d-M-Y')}} 
								</span></div>
								@endif 
							</div>
						</div>
					</div>
				</div>

			</div>
			<div id="edit" class="tab-pane">

				<form class="form-horizontal" method="post" action="{{url('/profile/update')}}" enctype="multipart/form-data">
			  {{ csrf_field() }}
					<input type="hidden" value="{{Auth::user()->id}}" name="id">
					<h4 class="mb-xlg">Profile Edit</h4>
					<fieldset>
						<div class="form-group">
							<label class="col-md-3 control-label" for="profileFirstName"> Name</label>
							<div class="col-md-8">
								<input type="text" name="name" class="form-control" value="{{Auth::user()->name}}" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="profileLastName">

							Email</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="email" value="{{Auth::user()->email}}" required>
								@if($errors->has('email'))
								<span class="help-block text-danger">{{ $errors->first('email') }}</span>
								@endif
							</div>
						</div>
					
						<div class="form-group">
							<label class="col-md-3 control-label" for="profileCompany">Password</label>
							<div class="col-md-8">
								<input name="password" type="text" class="form-control">
							</div>

						</div>
						
					</fieldset>
					<div class="panel-footer">
						<div class="row">
							<div class="col-md-8 col-md-offset-3">
								<button type="submit" class="btn btn-primary">Update</button>

							</div>
						</div>
					</div>

				</form>

			</div>
		</div>
	</div>
</div>
@endsection
