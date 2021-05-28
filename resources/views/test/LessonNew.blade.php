<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2 style="text-align:center">
              <b>Хичээл бүртгэх хэсэг</b>
               <h2>
                <link rel="stylesheet" href="{{url('bootstrap/css/bootstrap.min.css')}}">

                <div class="card-body">
                    <form method="POST" action="{{ url('Lnew') }}">
                        @csrf
                        <h2 style="text-align:center">

                            <div class="col-md-6">
                                <input id="test_id" type="text"  class="form-control @error('test_id') is-invalid @enderror" name="test_id" value="{{ old('test_id') }}" placeholder="test_id оруулна уу!" required autocomplete="test_id" autofocus>

                                @error('test_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <br>

                            <div class="col-md-6">
                                <select id="rank" type="rank" class="form-control" name="rank"  required autocomplete="rank">
                                    <option value="-1" se3

                                        lected disabled>Төрлөө сонгоно уу</option>
                                    <option value="0">Ахлагч</option>
                                    <option value="1">Офицер</option>
                                    <option value="2">Бүгд</option>
                                </select>
                            </div>
                            <br>

                            <div class="col-md-6">
                                <input id="lessonName" type="text"  class="form-control @error('lessonName') is-invalid @enderror" name="lessonName" value="{{ old('lessonName') }}" placeholder="lessonName оруулна уу!" required autocomplete="lessonName" autofocus>

                                @error('lessonName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <br>

                            <div class="col-md-6">
                                <input id="question_count" type="text" class="form-control @error('question_count') is-invalid @enderror" name="question_count" value="{{ old('question_count') }}" placeholder="question_count!" required autocomplete="question_count" autofocus>

                                @error('question_count')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                        </div>
                                    <h2 style="text-align:center">
                                <button type="submit" class="btn btn-success">
                                    Бүртгэх
                                </button>

                                <a href="{{url("/lesson/back")}}" class="btn btn-danger">Буцах</a>

                            </h2>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
