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

<?php
    $letter = ['A', 'B', 'C', 'D'];

?>
    @foreach ($ques as $key => $value)
        <div class="ques col-md-12" qid="1">
            <div>{{$value["number"]}}. {{$value["question"]}}</div>
            <div class="ans col-md-12">

                <div class="row">
                    <?php $i=0;?>
                    @foreach ($value["answers"] as $key => $ansVal)
                        <div point="{{$ansVal["is_true"]}}">
                            @if ($ansVal["is_true"] == 1)
                            <?php echo $letter[$i].'. ';?> <strong>{{$ansVal["answer"]}}</strong><?php $i++;?>
                            @else
                                <?php echo $letter[$i].'. ';?> {{$ansVal["answer"]}} <?php $i++;?>
                            @endif
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
