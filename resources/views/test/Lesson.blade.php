<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="{{url('public/test.js/jquery.min.js')}}"></script>
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> --}}
    <link rel="stylesheet" href="{{url('bootstrap/css/bootstrap.min.css')}}">    
    <script src="{{url('public/test.js/bootstrap.js')}}"></script>
    <script src="{{url('public/test.js/table.edit.js')}}"></script>     
  </head>
  <body>
    <div class="container">
      <br />
      <br />
      <div class="panel panel-default">
        <h4 class="text-center"><strong>Хичээлийн бүртгэл</strong></h4>
        <div class="panel-body">
          <div class="table-responsive">
            @csrf
            <table id="editable" class="table table-bordered table-striped">
              <thead>
                <tr>

              <th>id</th>
              <th>rank</th>
              <th>lessonName</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $row)
                <tr>
                  <h2 style="text-align:center">    
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->rank }}</td>
                  <td>{{ $row->lessonName }}</td>
    
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
  {{-- <script src="{{url('jquery/jquery-3.6.0.min.js')}}"></script> --}}
{{-- <script src="{{url('bootstrap/js/bootstrap.min.js')}}"></script> --}}
 
  <script type="text/javascript">
$(document).ready(function(){
   
  $.ajaxSetup({
    headers:{
      'X-CSRF-Token' : $("input[name=_token]").val()
    }
  });

  $('#editable').Tabledit({
    url:'{{ route("tabledit.action") }}',
    dataType:"json",
    columns:{
      identifier:[0, 'id'],
      editable:[[1, 'test_name']]
    },
    restoreButton:false,
    onSuccess:function(data, textStatus, jqXHR)
    {
      if(data.action == 'delete')
      {
        $('#'+data.id).remove();
      }
    }
  });

});  
</script>

 <h2 style="text-align:center">
 <a href="{{url("/lesson/new")}}" class="btn btn-success">Нэмэх</a>
 <a href="{{url("/home/back")}}" class="btn btn-danger">Буцах</a>

</h2>
 
