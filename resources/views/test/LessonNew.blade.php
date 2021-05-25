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
                                <input id="lessonName" type="text" class="form-control @error('lessonName') is-invalid @enderror" name="lessonName" value="{{ old('lessonName') }}" placeholder="Хичээлээ оруулна уу!" required autocomplete="lessonName" autofocus>

                                @error('lessonName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <br>

                            <div class="col-md-6">
                                <input id="rank" type="text"  class="form-control @error('rank') is-invalid @enderror" name="rank" value="{{ old('rank') }}" placeholder="Цолоо оруулна уу!" required autocomplete="rank" autofocus>

                                @error('rank')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <br>

                            <div class="col-md-6">
                                <input id="lessonName" type="text" class="form-control @error('lessonName') is-invalid @enderror" name="lessonName" value="{{ old('lessonName') }}" placeholder="Хичээлээ оруулна уу!" required autocomplete="lessonName" autofocus>

                                @error('lessonName')
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
