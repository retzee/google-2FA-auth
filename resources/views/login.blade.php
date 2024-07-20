@extends('layout.main')

@section('content')

<div class="header_text_container">
    <h3>Login</h3>
</div>

    <div class="form-holder">
        <div class="form-content">
            <div class="form-items">

@include('flash.error')

                <form method="post">
                     {{csrf_field()}}

                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <input type="text" name="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="col-12 col-sm-6">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                    </div>

                    <div class="row top-padding">
                        <div class="col-12 col-sm-6">
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-button text-right">
                                <input type="submit" class="ibtn less-padding" id="form_submit" name="form_submit" value="Login" />
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
      


@endsection