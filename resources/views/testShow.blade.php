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
            }
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
}
        </style>

    </head>
    <body>
<table width="500">
    <tr><td colspan="4">1.asdf</td></tr>
    <tr><td>A. ddfd</td></tr>
    <tr><td>B. ddfd</td></tr>
    <tr><td>C. ddfd</td></tr>
    <tr><td>D. ddfd</td></tr>
</table>

    @foreach ($ques as $key => $value)
        <div class="ques col-md-12" qid="1">
            <div class="ques-text">{{$value["number"]}}. {{$value["question"]}}</div>
            <div class="ans col-md-12">

                <div class="row">
                    @foreach ($value["answers"] as $key => $ansVal)
                        <div class="ans-box col-md-3" qid="{{$value["id"]}}" ansID="{{$ansVal["id"]}}" point="{{$ansVal["is_true"]}}">
                            <div class="ans-text">
                                {{$ansVal["answer"]}}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach

    </body>
    <script src="{{url('jquery/jquery-3.6.0.min.js')}}"></script>
    <script src="{{url('bootstrap/js/bootstrap.min.js')}}"></script>
</html>
