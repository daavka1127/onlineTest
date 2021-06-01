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
        <link rel="stylesheet" href="{{url('components/js/searchCombo/searchCSS.css')}}">
        <style>

            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;

            }
        </style>
    </head>
    <body>
        <div class="header_logo row justify-content-center">
            <div style="float: left; width:50px;"><img src="{{url("img/tovlogo.png")}}" height="50"></div>
            <div style="float: left; text-align:center;">Зэвсэгт хүчний программ хангамжын төвд хөгжүүлэв...</div>
        </div>

        <div class="container">
            <div class="row justify-content-center">
                Цэргийн ангиуд
                <select id="select-state" placeholder="Хайх нэр ээ бич...">
                    <option value="">Хайх ангиа бич..</option>
                    @foreach ($units as $unit)
                        <option value="{{$unit->id}}">{{$unit->unit}}</option>
                    @endforeach

                </select>
                <div class="row">
                    <input id="showResult" post-url="{{url('/show/unitAnswer')}}" type="button" class="btn btn-success" value="Үр дүн харах" />
                </div>
                <br>
                <div id="unitTable">

                </div>
            </div>
        </div>
    </body>
    <script src="{{url('jquery/jquery-3.6.0.min.js')}}"></script>
    <script src="{{url('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{url('components/js/searchCombo/search.js')}}"></script>
    <script>
    $(document).ready(function () {
        $('select').selectize({
            sortField: 'text'
        });

        $("#showResult").click(function(){

            $.ajax({
                type: "GET",
                url: $(this).attr('post-url'),
                data:{
                    unitID: $("#select-state").val()
                },
                success: function(res){
                    console.log(res);
                    var index = 1;
                    var table='<table>';
                    table += '<tr><th>№</th><th>Цолны ангилал</th><th>Мэргэжил</th><th>Цол</th><th>Регистрийн дугаар</th><th>Овог</th><th>Өөрийн нэр</th><th>Хууль эрх зүй</th><th>Ерөнхий мэдлэг</th></tr>'
                    $.each(res, function(key, val){
                        table += '<tr>';
                        table += '<td>'+index+'</td>';
                        table += '<td>'+val['rank']+'</td>';
                        table += '<td>'+val['occupation']+'</td>';
                        table += '<td>'+val['rankName']+'</td>';
                        table += '<td>'+val['RD']+'</td>';
                        table += '<td>'+val['firstName']+'</td>';
                        table += '<td>'+val['lastName']+'</td>';

                        $.each(val['answer'], function(i, item){
                            table += '<td>' + item.result + '</td>';
                        });

                        table += '</tr>';
                        index++;
                    });
                    table += '</table>'
                    $("#unitTable").html("");
                    $("#unitTable").html(table);
                }
            });
        });
    });
    </script>
</html>
