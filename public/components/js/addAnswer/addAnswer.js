var index = 2;

$("input[name='answers[]']").keyup(function(){
    if($(this).val().trim() != ""){
        $("#rad" + $(this).attr("index")).prop( "disabled", false );
    }
    else{
        $("#rad" + $(this).attr("index")).prop( "disabled", true );
    }
});

$("#btnNewAnswer").click(function(e){
    if($("#cmbLessonId").val() === "0"){
        alert("Та хичээлээ сонгоно уу!!!");
        return;
    }
    if($("#question").val() == 0){
        alert("Та асуултаа оруулна уу!!!");
        return;
    }
    if($("#txtAns1").val().trim() == "" && $("#txtAns2").val().trim() == ""){
        alert("Та ядаж 2 хариулт оруулна уу!!!");
        return;
    }

    if (!$("input[name='rad']:checked").val()) {
        alert('Nothing is checked!');
        return;
    }
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: "POST",
        url:$("#btnNewAnswer").attr('post-url'),
        data:$("#frmNewQuestion").serialize(),
        success:function(res){
            alert(res);
            t.row.add( [
                res,
                $("#cmbLessonId").val(),
                $("#question").val(),
                $("#cmbLessonId option:selected").text(),
                $("#txtAns1").val(),
                $("#txtAns2").val(),
                $("#txtAns3").val(),
                $("#txtAns4").val(),
            ] ).draw( false );
            $("#question").val('');
            $("input[name='answers[]']").val('');
            $("input[name=rad]").prop('checked', false);
        }
    });
});

$("#btnOpenNewAnswer").click(function(){
    $("#modalAnswerNew").modal();
});
// location.reload();

$("#btnDeleteQuestion").click(function(){
    if(dataRow == ""){
        alert("Мөрөө сонгоно уу");
        return;
    }
    var postUrl= $(this).attr('post-url');
    var r = confirm("Та устгахдаа итгэлтэй байна уу?");
    if(r == true){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: "POST",
            url: postUrl,
            data:{
                _token:$('meta[name="csrf-token"]').attr('content'),
                qiestionID:dataRow[0]
            },
            success:function(res){
                console.log(res);
                if(res.status == "success"){
                    t.row('.selected').remove().draw( false );
                    alert(res.msg);
                }
                else{
                    alert(res.msg);
                }
            }
        });
        dataRow = "";
    }
});
