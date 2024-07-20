@if (session('success_message'))
<div class="container">
    <div class="alert alert-success alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <p>{{{ session('success_message') }}}</p>
    </div>
</div>
@endif

@if (session('error_message'))
<div class="container">
    <div class="alert alert-warning alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <p>{{{ session('error_message') }}}</p>
    </div>
</div>
@endif