@extends('layout.main')

@section('content')

<div class="header_text_container">
    <h3>Create User</h3>
</div>

    <div class="form-holder">
        <div class="form-content">
            <div class="form-items">

@include('flash.error')

                <form method="post">
                     {{csrf_field()}}
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <input type="text" name="username" class="form-control" placeholder="Type your Email">
                        </div>
                        <div class="col-12 col-sm-6">
                            <input type="password" name="password" class="form-control" placeholder="Type your Password">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <input type="text" name="first_name" class="form-control" placeholder="Type your First Name">
                        </div>
                        <div class="col-12 col-sm-6">
                            <input type="text" name="surname" class="form-control" placeholder="Type your Surname">
                        </div>
                    </div>

                    <div class="row top-padding">
                        <div class="col-12 col-sm-6">
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-button text-right">
                                <input type="submit" class="ibtn less-padding" id="form_submit" name="form_submit" value="Create" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
      


@endsection