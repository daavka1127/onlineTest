<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Зэвсэгт хүчний программ хангамжийн төв</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{url('bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{url('components/css/login.css')}}">
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <button id="btnDadaa" class="btn btn-success">турш дадаа</button>
                <button id="btnDadaa1" class="btn btn-success">турш дадаа123</button>
                {{count($questions)}}
                @foreach ($questions as $q=>$key)
                    <div class="row">{{$key["question"]}}</div>
                @endforeach
            </div>
        </div>
    </body>
    <script src="{{url('jquery/jquery-3.6.0.min.js')}}"></script>
    <script src="{{url('bootstrap/js/bootstrap.min.js')}}"></script>

</html>
<script>
    var answers = <?php echo json_encode($questions); ?>;
    console.log(answers);
    $("#btnDadaa").click(function(){
        localStorage.setItem("dadaaTable", JSON.stringify(answers));
        alert("AAA");
    });
    $("#btnDadaa1").click(function(){
        var a = localStorage.getItem("dadaaTable");
        console.log("aaa");
        console.log(JSON.parse(a));
        localStorage.clear();
        alert("AAA");
    });
</script>