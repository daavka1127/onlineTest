<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="{{url('bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{url("css/test.css")}}">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
                margin: auto;
                width: 60%;
                padding: 3px;
                border: 1px solid;
            }
            .header_logo{

            }
        </style>
    </head>
    <body>
        <div class="header_logo">
            <img src="{{url("img/tovlogo.png")}}" height="50">
            Зэвсэгт хүчний программ хангамжын төвд хөгжүүлэв.
        </div>
        <div class="test_text col-md-12">
            <div class="test_text_head col-md-12">
                <div class="row">
                    <div class="timer col-md-6" style="float: left;">
                        23:29
                    </div>
                    <div class="question_mark col-md-6" style="float: right;">
                        50/15
                    </div>
                </div>
            </div>
            <div class="test_text_body">


                    <div class="ques col-md-12" qid="1">
                        <div class="ques-text">1.&nbsp;asdfasdfasdf</div>
                        <div class="ans col-md-12">

                            <div class="row">
                                <div class="ans-box col-md-3">
                                    <div class="ans-text" aord="3"
                                        aqid="2"> bootstrap js bootstrap min js map </div>
                                </div>

                                <div class="ans-box col-md-3">
                                    <div class="ans-text" aord="3"
                                        aqid="2"> bootstrap js bootstrap min js map </div>
                                </div>
                                <div class="ans-box col-md-3">
                                    <div class="ans-text" aord="3"
                                        aqid="2"> bootstrap js bootstrap min js map </div>
                                </div>
                                <div class="ans-box col-md-3">
                                    <div class="ans-text" aord="3"
                                        aqid="2"> bootstrap js bootstrap min js map </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="text-align: right;">
                        <a href="#" type="button" class="btn btn-success" id="nextBtn" style="font-size:18px; margin-top:20px;">Дараагийнх ></a>
                    </div>
            </div>
        </div>
    </body>
    <script src="{{url('jquery/jquery-3.6.0.min.js')}}"></script>
    <script src="{{url('bootstrap/js/bootstrap.min.js')}}"></script>
</html>
