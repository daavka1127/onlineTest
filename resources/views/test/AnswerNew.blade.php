<div class="modal" id="modalAnswerNew" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><strong>Асуулт нэмэх</strong></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="frmNewQuestion" method="POST" action="">
                <div class="col-md-6">
                    <select id="cmbLessonId" type="id" class="form-control" name="lessonName"  required autocomplete="id">
                        <option value="0">Хичээлээ сонгоно уу</option>
                        @foreach($lesson as $lesson)
                        <option value="{{$lesson->id}}">{{$lesson->lessonName}}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="clearfix"></div>

                <div class="col-md-12">
                    <h3>Асуултаа бичнэ үү.</h3>
                    <textarea class="form-control" id="question" name="question" rows="4" ></textarea>
                </div>
                <br>

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-1">
                            <input type="radio" name="rad" value="0" id="rad1" disabled/>
                        </div>
                        <div class="col-md-9">
                            <input name="answers[]" id="txtAns1" index="1" type="text" class="form-control" />
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-1">
                            <input type="radio" name="rad" value="1" id="rad2" disabled/>
                        </div>
                        <div class="col-md-9">
                            <input name="answers[]" id="txtAns2" index="2" type="text" class="form-control" />
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-1">
                            <input type="radio" name="rad" value="2" id="rad3" disabled/>
                        </div>
                        <div class="col-md-9">
                            <input name="answers[]" id="txtAns3" type="text" index="3" class="form-control" />
                        </div>

                    </div>
                </div>

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-1">
                            <input type="radio" name="rad" value="3" id="rad4" disabled/>
                        </div>
                        <div class="col-md-9">
                            <input name="answers[]" id="txtAns4" type="text" index="4" class="form-control" />
                        </div>
                    </div>
                </div>
            </form>

        </div>
        <div class="modal-footer">
          <button type="button" post-url="{{url("/Anew")}}" id="btnNewAnswer" class="btn btn-primary">Хадгалах</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Хаах</button>
        </div>
      </div>
    </div>
  </div>
{{--

<script src="{{url('jquery/jquery-3.6.0.min.js')}}"></script>
<script src="{{url('components/js/addAnswer/addAnswer.js')}}"></script> --}}
