 <!DOCTYPE html>
    <html>
      <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        {{-- <link href="{{url('public/css/bootstrap4.css')}}" rel="stylesheet"> --}}
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>            
        <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
        <link href="{{url('public/css/bootstrap.min.css')}}" rel="stylesheet">
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js">
          <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap.min.js">
              <script type="text/javascript" src="js/jquery.printPage.js"></script>
      </head>
      <body>
        <div class="container">
          <br />
          <br />
          <div class="panel panel-default">
            <h4 class="text-center"><strong>Тестийн бүртгэл</strong></h4>
            <div class="panel-body">
              <div class="table-responsive">
                @csrf
                <table id="editable" class="table table-bordered table-striped">
                  <thead>
                    <tr>
    
                  <th>id</th>
                  <th>test_name</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $row)
                    <tr>
                      <h2 style="text-align:center">    
                      <td>{{ $row->id }}</td>
                      <td>{{ $row->test_name }}</td>
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
      </html>

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
     <a href="{{url("/test/new")}}" class="btn btn-success">Нэмэх</a>
     <a href="{{url("/home/back")}}" class="btn btn-danger">Буцах</a>

    </h2>
     
