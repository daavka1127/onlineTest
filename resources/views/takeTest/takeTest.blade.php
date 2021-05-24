<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Зэвсэгт хүчний программ хангамжийн төв</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{url('bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{url('components/css/login.css')}}">
        <link rel="stylesheet" href="{{url("css/test.css")}}">
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <h3 class="text-center">Сайн байна уу? {{$firstName}}</h3>
                <h2 class="text-center">{{$testName}}</h2>
                <div class="header_logo">
                    <img src="{{url("img/tovlogo.png")}}" height="50">
                    Зэвсэгт хүчний программ хангамжын төвд хөгжүүлэв.
                </div>

                <input type="hidden" id="qCount" value="{{count($questions)}}" />

                @foreach ($questions as $key => $value)
                    <div class="ques col-md-12" qid="1">
                        <div class="ques-text">{{$value["number"]}}. {{$value["question"]}}</div>
                        <div class="ans col-md-12">

                            <div class="row">
                                @foreach ($value["answers"] as $key => $ansVal)
                                    <div class="ans-box col-md-3" qid="{{$value["id"]}}" ansID="{{$ansVal["id"]}}">
                                        <div class="ans-text"> 
                                            {{$ansVal["answer"]}}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="clearfix"></div>
                <br>
                <div class="form-group">
                    <div class="row">
                        <input id="btnFinishTest" post-url="{{url('/finish/test')}}" type="button" class="btn btn-success" value="Шалгалтыг дуусгах" />
                    </div>
                </div>
                <div class="clearfix"></div>
                <br>
                
            </div>
        </div>
    </body>
    <script src="{{url('jquery/jquery-3.6.0.min.js')}}"></script>
    <script src="{{url('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{url('components/js/takeTest/takeTest.js')}}"></script>

</html>