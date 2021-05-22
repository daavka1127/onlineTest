<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2 style="text-align:center">
              <b>Хариулт бүртгэх хэсэг</b>
               <h2>
                <link rel="stylesheet" href="{{url('bootstrap/css/bootstrap.min.css')}}">    

                <div class="card-body">
                    <form id="frmNewQuestion" method="POST" action="{{ url('Anew') }}">
                        @csrf
                        <h2 style="text-align:center">

                            <div class="col-md-6">
                                <select id="test_id" type="test_id" class="form-control" name="testID"  required autocomplete="test_id">
                                    <option value="0" selected disabled>Төрлөө сонгоно уу</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                           
                            <br>

                            <div class="col-md-6">
                                <textarea class="form-control" id="question" name="question" rows="4" ></textarea>
                            </div>
                            <br>

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-1">
                                        <input type="radio" name="rad" value="0"/>
                                    </div>
                                    <div class="col-md-9">
                                        <input name="answers[]" type="text" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-1">
                                        <input type="radio" name="rad" value="1"/>
                                    </div>
                                    <div class="col-md-9">
                                        <input name="answers[]" type="text" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-1">
                                        <input type="radio" name="rad" value="2"/>
                                    </div>
                                    <div class="col-md-9">
                                        <input name="answers[]" type="text" class="form-control" />
                                    </div>
                                    <div class="col-md-1">
                                        <button class=""><img width="20" src="{{url('/images/x-button.png')}}" alt=""></button>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-1">
                                        <input type="radio" name="rad" value="3"/>
                                    </div>
                                    <div class="col-md-9">
                                        <input name="answers[]" type="text" class="form-control" />
                                    </div>
                                    <div class="col-md-1">
                                        <button class=""><img width="20" src="{{url('/images/x-button.png')}}" alt=""></button>
                                    </div>
                                </div>
                            </div>

                            


             </div>
               </h2>
                                    <h2 style="text-align:center">
                                <button type="submit" id="btnNewAnswer" class="btn btn-success">
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
<script src="{{url('jquery/jquery-3.6.0.min.js')}}"></script>
<script src="{{url('components/js/addAnswer/addAnswer.js')}}"></script>