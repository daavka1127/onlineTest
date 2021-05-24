<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <script src="{{url('public/test.js/jquery.min.js')}}"></script> --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> --}}
    <link rel="stylesheet" href="{{url('bootstrap/css/bootstrap.min.css')}}"> 
   {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> --}}
   <link rel="stylesheet" href="{{url('components/js/lesson/datatable.css')}}"> 
<script src="{{url('components/js/lesson/jquery.3.5.1.js')}}"></script>
<script src="{{url('components/js/lesson/bootstrap.js')}}"></script>
<script src="{{url('components/js/lesson/poper.js')}}"></script>
<script src="{{url('components/js/lesson/jquery.3.6.0.js')}}"></script>
<script src="{{url('components/js/lesson/datatable.js')}}"></script>
  </head>
  <body>
    <div class="container">
      <br />
      <br />
      <div class="panel panel-default">
        <h4 class="text-center"><strong>Хичээлийн бүртгэл</strong></h4>
        <section style="padding-top:60px;">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                {!! $dataTable->table()!!}
              </div>
            </div>
          </div>
        </section>
        {!! $dataTable->scripts()!!}
      </div>
  </body>  
  {{-- <script src="{{url('jquery/jquery-3.6.0.min.js')}}"></script> --}}
{{-- <script src="{{url('bootstrap/js/bootstrap.min.js')}}"></script> --}}
 
 <h2 style="text-align:center">
 <a href="{{url("/lesson/new")}}" class="btn btn-success">Нэмэх</a>
 <a href="{{url("/home/back")}}" class="btn btn-danger">Буцах</a>

</h2>
 
