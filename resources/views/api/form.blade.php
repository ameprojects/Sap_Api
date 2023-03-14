<!DOCTYPE html>
<html>
<head>
    <title>Form</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-3">
  @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
  <div class="card">
    <div class="card-header text-center font-weight-bold">
      Form Details
    </div>
    <div class="card-body">
      <form name="formdata" id="formdata" method="post" action="{{url('api/post_sap')}}">
       @csrf
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" class="form-control" required="">
        </div>
        <div class="form-group">
        <label for="email">Email</label>
          <input type="text" id="email" name="email" class="form-control" required="">
        </div>
        <div class="form-group">
        <label for="place">Place</label>
          <input type="text" id="place" name="place" class="form-control" required="">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>  
</body>
</html>