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
        <div class="testTime" id="divTime"></div>
        <div class="header_logo row justify-content-center">
        <div style="float: left; width:50px;">
            <img src="{{url("img/tovlogo.png")}}" height="50">

        </div>
<div style="float: left; text-align:center;">Зэвсэгт хүчний программ хангамжын төвд хөгжүүлэв.</div>
    </div>
        <div class="container">
            <div class="row justify-content-center">
                <h3 class="text-center">Сайн байна уу? {{$firstName}}</h3>
                <h2 class="text-center">{{$testName}}</h2>


                <input type="hidden" id="qCount" value="{{count($questions)}}" />
                <input type="hidden" id="testTime" value="{{$testTime}}" />
                @php
                    $qc = 0;
                    $showAns = true;
                @endphp
                @foreach ($questions as $key => $value)
                    <div class="ques col-md-12" qid="1">
                        <div class="ques-text">{{$value["number"]}}. {{$value["question"]}}</div>
                        <div class="ans col-md-12">

                            <div class="row">
                                @if($qc > 35)
                                    @php
                                        $showAns = false;
                                    @endphp
                                @endif
                                @foreach ($value["answers"] as $key => $ansVal)
                                    <div class="ans-box col-md-3" qid="{{$value["id"]}}" ansID="{{$ansVal["id"]}}">
                                        <div class="ans-text">
                                            @if ($showAns)
                                                @if($ansVal['is_true'] == 1)
                                                    {{$ansVal["answer"]}}...
                                                @else
                                                    {{$ansVal["answer"]}}
                                                @endif
                                            @else
                                                {{$ansVal["answer"]}}
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @php
                        $qc++;
                    @endphp
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
