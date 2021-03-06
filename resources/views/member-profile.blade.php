@extends('app')

@section('styles')
@stop

@section('content')

<div class="wapper">
	<div class="content-member">				
			<div class="content-tabs">
				@if(Session::has('error'))
			    <div class="alert alert-danger">
			        <ul style="margin:0">
			            <li>{{ Session::get('error') }}</li>
			        </ul>
			    </div>
				@endif

				@if(Session::has('success'))
				    <div class="alert alert-success">
				        <ul style="margin:0">
				            <li>{{ Session::get('success') }}</li>
				        </ul>
				    </div>
				@endif
				@if(Session::has('successtem'))
				    <div class="alert alert-success">
				        <ul style="margin:0">
				            <li>{{ Session::get('successtem') }}</li>
				        </ul>
				    </div>
				@endif
				<h3>Profile</h3>
				<ul class="nav nav-tabs">
					<li><a data-toggle="tab" class="@if(!Session::has('successtem')) active @endif" href="#menu1">Your details</a></li>
				</ul>
				<div class="tab-content">

					<div id="menu1" class="tab-pane @if(!Session::has('successtem')) in active @endif ">
						<form action="{{ url('/member/update') }}" enctype="multipart/form-data" method="post" class="member-profile">
							{{ csrf_field()}}
							<div class="form-group order">
								<div class="row">
									<div class="col-12 col-sm-3 box-order cl-salutation">
										<label for="Salutation">Salutation</label>
										<select name="salutation">
											<option value="Mr" {{ (isset($member['salutation']) && $member['salutation'] == 'Mr') ? 'selected' : '' }}>Mr</option>
											<option value="Mrs">Mrs</option>
										</select>
									</div>
									<div class="col-12 col-sm-3 box-order cl-first-name">
										<label for="First name">First name</label>
										<input type="text" class="form-control" id="first_name" name="first_name" placeholder="First name" value="{{ $member_login->first_name or '' }}">
									</div>
									<div class="col-12 col-sm-3 box-order cl-surname">
										<label for="Surname">Surname</label>
										<input type="text" class="form-control" id="surname" name="surname" placeholder="Surname" value="{{ $member_login->surname or '' }}">
									</div>
									<div class="col-12 col-sm-3 box-order avatar-image">
										<div class="circle">
									       <img class="profile-pic" src="{{ !empty($member_login->avatar) ? asset('uploads').'/'.$member_login->avatar : asset('images/avatar-null.png') }}">
									    </div>
									    <div class="p-image">
									       <i class="fa fa-camera upload-button"></i>
									    </div>
										<input class="upload_avatar file-upload" id="Upload_avatar" type="file" name="avatar[]" value="Upload avatar" accept="image/*">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-12 col-sm-3">
										<label for="Team">Team</label>
										<input type="text" class="form-control" id="team" placeholder="Team" value="{{ $team['company_name'] or '' }}" readonly>
									</div>
								</div>
							</div>
							<hr>
							<h4>Contact details</h4>
							<div class="form-group">
								<div class="row">
									<div class="col-12 col-sm-3">
										<label for="email">Email address <i class="i-email-address"><span class="tooltiptext tooltip-top">Please contact community manager if you wish to update your email address</span></i></label>
										<input type="email" class="form-control" id="email_address" placeholder="Email address" value="{{ $user->email or '' }}" readonly>
									</div>
									<div class="col-12 col-sm-3">
										<label for="Phone">Phone</label>
										<input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="{{ $member_login->phone or '' }}">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-12 col-sm-3">
										<label for="postal-address">Postal address</label>
										<input type="text" class="form-control" id="postal_address" name="postal_address" placeholder="Postal address" value="{{ $member_login->postal_street_address or '' }}">
									</div>
									<div class="col-12 col-sm-3">
										<label for="suburb">Suburb</label>
										<input type="text" class="form-control" id="suburb" name="suburb" placeholder="Suburb" value="{{ $member_login->postal_suburb or '' }}">
									</div>
									<div class="col-12 col-sm-3">
										<label for="postcode">Postcode</label>
										<input type="text" class="form-control" id="postcode" name="postcode" placeholder="Postcode" value="{{ $member_login->postal_postcode or '' }}">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-12 col-sm-3">
										<label for="state">State</label>
										<select name="state">
											<option value="act">Australian Capital Territory</option>
											<option value="nsw">New South Wales</option>
											<option value="nt">Northern Territory</option>
											<option value="qld">Queensland</option>
											<option value="sa">South Australia</option>
											<option value="tas">Tasmania</option>
											<option value="vic">Victoria</option>
											<option value="wa">Western Australia</option>
										</select>
										
									</div>
									<div class="col-12 col-sm-3">
										<label for="country">Country</label>
										<select name="country">
											<option value="australia">Australia</option>
										</select>
									</div>
								</div>
							</div>
							<hr>
							<h4>Access details</h4>
							<div class="form-group">
								<div class="row">
									<div class="col-12 col-sm-3">
										<label for="security code">Security code <i><span class="tooltiptext tooltip-top">Your personal building access code. Do not share this with anyone!</span></i></label>
										<input type="text" class="form-control" id="security_code" placeholder="Security code" value="{{ $member_login->security_code or '' }}" readonly>
									</div>
									<div class="col-12 col-sm-3">
										<label for="keyfob ID">Keyfob ID <i class="i-keyfob-id"><span class="tooltiptext tooltip-top">Building access keyfob</span></i></label>
										<input type="text" class="form-control" id="keyfob_id" placeholder="Keyfob ID" value="{{ $member_login->fob_number or '' }}" readonly>
									</div>
									<div class="col-12 col-sm-3">
										<label for="locker_number">Locker number <i class="i-locker-number"><span class="tooltiptext tooltip-top">Your locker key. Don't lose it!</span></i></label>
										<input type="text" class="form-control" id="locker_number" placeholder="Locker number" value="{{ $member_login->Locker or '' }}" readonly>
									</div>
								</div>
							</div>
							 
							<button type="submit" class="btn btn-default">Save changes</button>
						</form>
					</div>			
				</div>
			</div>
		</div>
</div>
@stop

@push('scripts-bottom')
@endpush