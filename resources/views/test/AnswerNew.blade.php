<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2 style="text-align:center">
              <b>Хариулт бүртгэх хэсэг</b>
               <h2>
                <link rel="stylesheet" href="{{url('bootstrap/css/bootstrap.min.css')}}">    

                <div class="card-body">
                    <form method="POST" action="{{ url('Anew') }}">
                        @csrf
                        <h2 style="text-align:center">

                            <div class="col-md-6">
                                <select id="test_id" type="test_id" class="form-control" name="test_id"  required autocomplete="test_id">
                                    <option value="0" selected disabled>Төрлөө сонгоно уу</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                           
                            <br>

                            <div class="col-md-6">
                                <textarea class="form-control" id="w3review" name="w3review" rows="4" >

                                </textarea>
                            </div>
                            <br>

                            <div class="col-md-6">
                                <input type="radio" name="rad" value="0"/>
                                <input name="asnwers" type="text" class="form-control" />
                                <button class=""><img src="{{url('/images/x-button.png')}}" alt=""></button>
                            </div>
                            <br>

                            <div class="col-md-6">
                                <input type="radio" name="rad" value="1"/>
                                <input name="asnwers" type="text" class="form-control" />
                            </div>
                            <br>

                            <div class="col-md-6">
                                <input type="radio" name="rad" value="2"/>
                                <input name="asnwers" type="text" class="form-control" />
                            </div>
                            <br>

                            <div class="col-md-6">
                                <input type="radio" name="rad" value="3"/>
                                <input name="asnwers" type="text" class="form-control" />
                            </div>

                            


             </div>
               </h2>
                                    <h2 style="text-align:center">
                                <button type="submit" class="btn btn-success">
                                    Бүртгэх
                                </button>
                               
                                <a href="{{url("/answer/back")}}" class="btn btn-danger">Буцах</a>
                                 
                            </h2>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
