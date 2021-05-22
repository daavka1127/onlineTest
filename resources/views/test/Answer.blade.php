<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> --}}
    <link rel="stylesheet" href="{{url('bootstrap/css/bootstrap.min.css')}}">    

  </head>
  <body>
    <div class="container">
      <br />
      <br />
      <div class="panel panel-default">
        <h4 class="text-center"><strong>Асуулт, хариулт</strong></h4>
        <div class="panel-body">
          <div class="table-responsive">
            @csrf
            <table id="editable" class="table table-bordered table-striped">
              <thead>
                <tr>

              <th>id</th>
              <th>test_id</th>
              <th>question</th>
              <th>answer</th>
              <th>is_true</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $row)
                <tr>
                  <h2 style="text-align:center">    
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->test_id }}</td>
                  <td>{{ $row->question }}</td>
                  <td>{{ $row->answer }}</td>
                  <td>{{ $row->is_true }}</td>
                  </h2>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
        </div>
      </div>
    </div>
  
  </body>  

  <script src="{{url('jquery/jquery-3.6.0.min.js')}}"></script>
<script src="{{url('bootstrap/js/bootstrap.min.js')}}"></script>
 
 <h2 style="text-align:center">
 <a href="{{url("/answer/new")}}" class="btn btn-primary">Нэмэх</a>
 <a href="{{url("/home/back")}}" class="btn btn-danger">Буцах</a>

</h2>
 
