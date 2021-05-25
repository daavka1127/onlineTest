var jsonUserAns = [];
if (localStorage.getItem("dadaaTable") === null) {
}
else{
    jsonUserAns = JSON.parse(localStorage.getItem("dadaaTable"));
    $.each(jsonUserAns, function(i, item) {
        $("[ansID=" + item.ansID + "]").children().addClass("correctChoosed");
    });
}



$(".ans-box").click(function(){
    $("[qid=" + $(this).attr("qid") + "]").children().removeClass("correctChoosed");
    $(this).children().addClass("correctChoosed");
    var checkAns = search($(this).attr("qid"),$(this).attr("ansID"));
    if(checkAns === "don't have"){
        var element = {
            qid:$(this).attr("qid"),
            ansID:$(this).attr("ansID")
        };
        jsonUserAns.push(element);
        localStorage.setItem("dadaaTable", JSON.stringify(jsonUserAns));
    }
    else{
        localStorage.setItem("dadaaTable", JSON.stringify(jsonUserAns));
    }
});

function search(qid, ansID){
    for (i = 0; i < jsonUserAns.length; i++) {
        if (jsonUserAns[i]['qid'] === qid) {
            jsonUserAns[i]['ansID'] = ansID;
            return "have";
        }
    }
    return "don't have";
}

$("#btnFinishTest").click(function(){
    if(jsonUserAns.length < $("#qCount").val()){
        alert("Та шалгалтаа бүрэн хариулаагүй байна!!!");
        return;
    }

    var postUrl = $(this).attr("post-url");

    $.ajax({
        type: "POST",
        url: postUrl,
        data:{
            _token: $('meta[name="csrf-token"]').attr('content'),
            userAns: jsonUserAns
        },
        success: function(res){
            if(res.status == "success"){
                console.log(res);
                alert(res.msg);
                localStorage.clear();
                window.location.replace("/");
            }
            else{
                alert("Алдаа гарлаа!!!!!!!!!!!");
            }
        }
    });
});
