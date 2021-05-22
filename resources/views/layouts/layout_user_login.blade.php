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
                                        <option value="-1">Сонгоно уу</option>
                                        <option value="-1">Сонгоно уу</option>
                                        <option value="-1">Сонгоно уу</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Цол:</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="rank" id="cmbRank">
                                        <option value="1">Ахлагч</option>
                                        <option value="2">Офицер</option>
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
