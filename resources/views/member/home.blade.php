@extends('layout.main')

@section('content')

<div class="header_text_container">
    <h3>Teacher Dashboard</h3>
</div>


    <div class="form-holder">
        <div class="form-content">
            <div class="form-items">
                
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <a href="{{url('/take-attendance')}}">
                            <div class="widget_box widget_yellow rounded_edge_box">
                                <h4>Take My Attendance</h4>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <a href="{{url('/attendance-log')}}">
                            <div class="widget_box widget_red rounded_edge_box">
                                <h4>My Attendance Log</h4>
                            </div>
                        </a>
                    </div>


                    <div class="col-md-6 col-sm-12">
                        <a href="{{url('/take-student-attendance')}}">
                            <div class="widget_box widget_blue rounded_edge_box">
                                <h4>Class Attendance</h4>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <a href="{{url('/2fa')}}">
                            <div class="widget_box widget_green rounded_edge_box">
                                <h4>2FA Setting</h4>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <a href="{{url('/take-subject-attendance')}}">
                            <div class="widget_box widget_purple rounded_edge_box">
                                <h4>Subject Attendance</h4>
                            </div>
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </div>
       

@endsection