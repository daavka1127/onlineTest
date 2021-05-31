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
                <div id="answeredgen">

                </div>
                {{-- @foreach ($questions as $key => $value)
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
                </div> --}}

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
                     console.log(res);
                    // console.log(res['law']);
                    // $.each(res.answered, function(key, val){

                    //     console.log(val['law']);
                    // });

                }
            });
        });
    });
    </script>
</html>
