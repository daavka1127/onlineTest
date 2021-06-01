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

    </head>
    <body>
        <div class="header_logo row justify-content-center">
            <div style="float: left; width:50px;"><img src="{{url("img/tovlogo.png")}}" height="50"></div>
            <div style="float: left; text-align:center;">Зэвсэгт хүчний программ хангамжын төвд хөгжүүлэв.</div>
        </div>

        <div class="container">
            <div class="row justify-content-center">
                Шалгалт өгсөн ЦАХ-ууд
                <select id="select-state" placeholder="Хайх нэр ээ бич...">
                    <option value="">Хайх нэр ээ бич..</option>
                    @foreach ($users as $user)
                        <option value="{{$user->id}}">{{$user->RD.' '.$user->first_name.' '.$user->last_name}}</option>
                    @endforeach

                </select>
                <div class="row">
                    <input id="showResult" post-url="{{url('/show/userAnswer')}}" type="button" class="btn btn-success" value="Үр дүн харах" />
                </div>
                <div class="clearfix"></div>
                <label class="text-center"><h4>Ерөнхий суурь мэдлэглэгийн түвшин /хууль эрх зүй, цэргийн нийтлэг дүрмүүд,
                    цэргийн алба зохион байгуулах заавар, ахлагчийн ёс зүйн дүрэм,
                    оюуны чадавхи, сэтгэн бодох чадвар/</h4>
                </label>
                <div id="answeredlaw">

                </div>
                <label class="text-center"><h4>Цэргийн мэргэжлийн суурь мэдлэгийн түвшин /тактик, тусгай тактик,
                    тусгай бэлтгэл, бусад мэргэшүүлэх хичээл/</h4>
                </label>
                <div id="answeredgen">

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
                    userID: $("#select-state").val()
                },
                success: function(res){
                    var divlaw = "";
                    $.each(res.law, function(key, val){
                        divlaw += '<label style="font-weight:bold">'+ val["ques"].question +"</label>"

                        $.each(val['ans'], function(k, v){
                            console.log("hariulsan:" +val["hariulsan"] + "    tuhain asuultin id:"+ v["id"] + "    istrue:"+v["istrue"]);
                            if((val["hariulsan"] == v["id"]) && (v["istrue"] == '1'))
                                divlaw += '<div style="text-indent:20px; color: green"> Зөв хариулсан:  ' + v["answer"] + '</div>'
                            else if((val["hariulsan"] == v["id"]) && (v["istrue"] == '0'))
                                divlaw += '<div style="text-indent:20px; color: red"> Буруу хариулсан:  ' + v["answer"] + '</div>'
                            else if(v["istrue"] == '1')
                                divlaw += '<div style="text-indent:20px; color:blue">Зөв хариулт нь:   ' + v["answer"] + '</div>'
                            else
                                divlaw += '<div style="text-indent:20px;">' + v["answer"] + '</div>'
                        });


                    });

                    var divgen = "";
                    $.each(res.general, function(key, val){
                        divgen += '<label style="font-weight:bold">'+ val["ques"].question +"</label>"

                        $.each(val['ans'], function(k, v){
                            console.log("hariulsan:" +val["hariulsan"] + "    tuhain asuultin id:"+ v["id"] + "    istrue:"+v["istrue"]);
                            if((val["hariulsan"] == v["id"]) && (v["istrue"] == '1'))
                                divgen += '<div style="text-indent:20px; color: green"> Зөв хариулсан:  ' + v["answer"] + '</div>'
                            else if((val["hariulsan"] == v["id"]) && (v["istrue"] == '0'))
                                divgen += '<div style="text-indent:20px; color: red"> Буруу хариулсан:  ' + v["answer"] + '</div>'
                            else if(v["istrue"] == '1')
                                divgen += '<div style="text-indent:20px; color:blue">Зөв хариулт нь:   ' + v["answer"] + '</div>'
                            else
                                divgen += '<div style="text-indent:20px;">' + v["answer"] + '</div>'
                        });


                    });

                    $("#answeredlaw").html("");
                    $("#answeredlaw").html(divlaw);
                    $("#answeredgen").html("");
                    $("#answeredgen").html(divgen);

                }
            });
        });
    });
    </script>
</html>
