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
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-center"><strong>Бүртгүүлнэ үү</strong></h5>
                        <form id="frmNewUser" method="POST" action="{{url('/login')}}">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Анги байгууллага:</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="unit" id="cmbUnit">
                                        @foreach ($units as $unit)

                                            <option value="{{$unit->id}}">{{$unit->unit}}</option>
                                        @endforeach
                                        {{-- <option value="-1">Сонгоно уу</option>
                                        <option value="-1">Сонгоно уу</option> --}}
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Цолны төрөл:</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="rank" id="cmbRank">
                                        <option value="0">Ахлагч</option>
                                        <option value="1">Офицер</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Цол:</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="rankName" id="cmbRank">
                                        <option value="б/ч">Байлдагч</option>
                                        <option value="а/б">Ахлах байлдагч</option>
                                        <option value="д/т">Дэд түрүүч</option>
                                        <option value="т/ч">Түрүүч</option>
                                        <option value="а/т">Ахлах түрүүч</option>
                                        <option value="д/а">Дэд ахлагч</option>
                                        <option value="а/ч">Ахлагч</option>
                                        <option value="а/а">Ахлах ахлагч</option>
                                        <option value="с/а">Сургагч ахлагч</option>
                                        <option value="т/а">Тэргүүн ахлагч</option>
                                        <option value="д/ч">Дэслэгч</option>
                                        <option value="а/д">Ахлах дэслэгч</option>
                                        <option value="а/х">Ахмад</option>
                                        <option value="х/ч">Хошууч</option>
                                        <option value="д/х">Дэд хурандаа</option>
                                        <option value="хур">Хурандаа</option>
                                        <option value="Бр/ген">Бригадын генерал</option>
                                        <option value="Х/ген">Хошууч генерал</option>
                                        <option value="Д/ген">Дэслэгч генерал</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Регистрийн дугаар:</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="RD" id="txtRD">
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Овог:</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="firstName" id="txtFirstName">
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Нэр:</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="lastName" id="txtLastName">
                                </div>
                            </div>
                            <br>
                            <input type="submit" class="btn btn-success" value="Нэвтрэх" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="{{url('jquery/jquery-3.6.0.min.js')}}"></script>
    <script src="{{url('bootstrap/js/bootstrap.min.js')}}"></script>

</html>
