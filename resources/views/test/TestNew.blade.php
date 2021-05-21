<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2 style="text-align:center">
              <b>Тест бүртгэх хэсэг</b>
               <h2>
            
                <div class="card-body">
                    <form method="POST" action="{{ url('Tnew') }}">
                        @csrf
                        <h4 style="text-align:center">
                            <div class="col-md-6">
                                <input id="test_name" type="text" size="50" class="form-control @error('test_name') is-invalid @enderror" name="test_name" value="{{ old('test_name') }}" placeholder="Тестээ оруулна уу!" required autocomplete="test_name" autofocus>

                                @error('test_name')
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
                                  <button>
                                <a href="{{url("/test/back")}}" class="btn btn-danger">Буцах</a>
                                  </button>
                            </h2>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
