var index = 2;

$("#btnNewAnswer").click(function(e){
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

            // counter++;
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
