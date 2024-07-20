@extends('layout.main')

@section('content')

<div class="header_text_container">
    <h3>Two Factor Authentication (2FA)</h3>
</div>


    <div class="form-holder">
        <div class="form-content">
            <div class="form-items">
              

			    <div class="container">
			        <div class="row justify-content-md-center">
			            <div class="col-md-12">
			                <div class="card">
                    			<div class="card-body">

			                        @if (session('error'))
			                            <div class="alert alert-danger">
			                                {{ session('error') }}
			                            </div>
			                        @endif
			                        @if (session('success'))
			                            <div class="alert alert-success">
			                                {{ session('success') }}
			                            </div>
			                        @endif

			                        @if($data['user']->loginSecurity == null)
			                        	<p><strong>First step is to create and setup a unique secret key.</strong></p>

			                            <form class="form-horizontal" method="POST" action="{{ route('generate2faSecret') }}">
			                                {{ csrf_field() }}
			                                <div class="form-group">
			                                    <button type="submit" class="red_awesome_btn">
			                                        Create Secret Key
			                                    </button>
			                                </div>
			                            </form>
			                        @elseif(!$data['user']->loginSecurity->google2fa_enable)

			                        	@if(empty($data['secret']))
				                            <div class="err_msg">
				                                2FA is not <strong>enabled</strong> on your account.
				                            </div>

			                        		<p><strong>STEPS:</strong></p>

				                            1. Visit Google Playstore to download and install Google Authenticator App on your mobile device
				                            <br/><br/>

				                            2. Scan this QR barcode with your Google Authenticator App OR use this setup key: <code class="font20">{{ $data['secret'] }}</code><br/>

				                            {!! $data['google2fa_url'] !!}
				                            <br/><br/>
				                            2. Enter the pin generated from your Google Authenticator app:<br/><br/>
				                            <form class="form-horizontal" method="POST" action="{{ route('enable2fa') }}">
				                                {{ csrf_field() }}
				                                <div class="form-group{{ $errors->has('verify-code') ? ' has-error' : '' }}">
				                                    <input id="secret" type="text" class="form-control col-md-12" name="secret" placeholder="Type Pin Here" required>
				                                    @if ($errors->has('verify-code'))
				                                        <span class="help-block">
				                                        <strong>{{ $errors->first('verify-code') }}</strong>
				                                        </span>
				                                    @endif
				                                </div>
				                                <button type="submit" class="red_awesome_btn">
				                                    Enable 2FA
				                                </button>
				                            </form>

			                        	@else

				                            1. To enable 2FA on your account, Open your Google Authenticator App and then scan this QR barcode with your  <br> <strong>OR</strong> <br> use this setup key: <code class="font20">{{ $data['secret'] }}</code><br/>

				                            {!! $data['google2fa_url'] !!}
				                            <br/><br/>
				                            2. If QR barcode was scanned and setup was successful, Enter the generated pin from your Google Authenticator App:<br/><br/>
				                            <form class="form-horizontal" method="POST" action="{{ route('enable2fa') }}">
				                                {{ csrf_field() }}
				                                <div class="form-group{{ $errors->has('verify-code') ? ' has-error' : '' }}">
				                                    <input id="secret" type="text" class="form-control col-md-12" name="secret" placeholder="Type Pin Here" required>
				                                    @if ($errors->has('verify-code'))
				                                        <span class="help-block">
				                                        <strong>{{ $errors->first('verify-code') }}</strong>
				                                        </span>
				                                    @endif
				                                </div>
				                                <button type="submit" class="red_awesome_btn">
				                                    Enable 2FA
				                                </button>
				                            </form>

			                        	@endif

			                        	
			                        @elseif($data['user']->loginSecurity->google2fa_enable)
			                            <div class="alert alert-success">
			                                2FA is currently <strong>enabled</strong> on your account.
			                            </div>
			                            <p><strong>If you intend to disable Two Factor Authentication on your account, please enter your password and Click Disable 2FA Button.</strong></p>
			                            <form class="form-horizontal" method="POST" action="{{ route('disable2fa') }}">
			                                {{ csrf_field() }}
			                                <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
			                                    <label for="change-password" class="control-label"><strong>Your Current Password</strong></label>
			                                        <input id="current-password" type="password" class="form-control col-md-12" placeholder="Type Password" name="current_password" required>
			                                        @if ($errors->has('current_password'))
			                                            <span class="help-block">
			                                        <strong>{{ $errors->first('current_password') }}</strong>
			                                        </span>
			                                        @endif
			                                </div>
			                                <button type="submit" class="red_awesome_btn">Disable 2FA</button>
			                            </form>
			                        @endif
                    
                        		</div>
			                </div>
			            </div>
			        </div>
			    </div>


              
            </div>
        </div>
    </div>       

@endsection