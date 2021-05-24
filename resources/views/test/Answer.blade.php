<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> --}}
    <title>Webslesson Tutorial | Show JSON Data in Jquery Datatables</title>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css"/>  
    <script type="text/javascript" src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>


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
            <table id="data-table" class="table table-bordered">             
                 <thead>
                <tr>
              <th>lessonName</th>
              <th>question</th>
              <th>answer</th>
              <th>answer1</th>
              <th>answer2</th>
              <th>answer3</th>
              <th>true</th>
                </tr>
              </thead>

               
              </tbody>
            </table>
        </div>
        </div>
      </div>
    </div>
  
  </body>  
{{-- 
  <script src="{{url('jquery/jquery-3.6.0.min.js')}}"></script>
<script src="{{url('bootstrap/js/bootstrap.min.js')}}"></script> --}}
 
 <h2 style="text-align:center">
 <a href="{{url("/answer/new")}}" class="btn btn-primary">Нэмэх</a>
 <a href="{{url("/home/back")}}" class="btn btn-danger">Буцах</a>
</h2>
<script>  
  $(document).ready(function(){  
       $('#data-table').DataTable({  
            "ajax"     :     "answer.json",  
            "columns"     :     [  
                 {     "lessonName"     :     "lessonName"     },  
                 {     "question"     :     "question"},  
                 {     "answer"     :     "answer"}, 
                 {     "is_true"     :     "is_true"     }
            ]  
       });  
  });  
  </script>  
 </html
 
