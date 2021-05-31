<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> --}}
    <title>Асуултууд</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
            </table>
        </div>
        </div>
      </div>
    </div>
    @include("test.AnswerNew")

  </body>
{{--
  <script src="{{url('jquery/jquery-3.6.0.min.js')}}"></script>
<script src="{{url('bootstrap/js/bootstrap.min.js')}}"></script> --}}
  <style media="screen">
  #data-table tbody tr.selected {
    color: white;
    background-color: #8893f2;
  }
  #data-table tbody tr{
  cursor: pointer;
  }
</style>

 <h2 style="text-align:center">
 <button id="btnOpenNewAnswer" class="btn btn-success">Нэмэх</button>
 <button id="btnDeleteQuestion" post-url="{{url("/answer/delete")}}" class="btn btn-danger">Устгах</button>
 <a href="{{url("/home/back")}}" class="btn btn-danger">Буцах</a>
</h2>
<script>
    var dataRow = "";
    var cols = <?php echo json_encode($questionCols) ?>;
    var questionData = <?php echo json_encode($questions) ?>;
    console.log(cols);
    console.log("dadaa");
    console.log(questionData);
    var t = $('#data-table').DataTable( {
        "language": {
              "lengthMenu": "_MENU_ мөрөөр харах",
              "zeroRecords": "Хайлт илэрцгүй байна",
              "info": "Нийт _PAGES_ -аас _PAGE_-р хуудас харж байна ",
              "infoEmpty": "Хайлт илэрцгүй",
              "infoFiltered": "(_MAX_ мөрөөс хайлт хийлээ)",
              "sSearch": "Хайх: ",
              "paginate": {
                "previous": "Өмнөх",
                "next": "Дараахи"
              },
              "select": {
                  rows: ""
              }
          },
          select: {
            style: 'single'
        },
        dom: "Bfrtip",
        data: questionData,
        columns: cols
    });
    $('#data-table tbody').on( 'click', 'tr', function () {
          if ( $(this).hasClass('selected') ) {
              $(this).removeClass('selected');
              dataRow = "";
          }else {
              t.$('tr.selected').removeClass('selected');
              $(this).addClass('selected');
              var currow = $(this).closest('tr');
              dataRow = $('#data-table').DataTable().row(currow).data();
              console.log(dataRow);
            //   alert(dataRow[0]);
          }
          });
  </script>
  <script src="{{url('components/js/addAnswer/addAnswer.js')}}"></script>
 </html
