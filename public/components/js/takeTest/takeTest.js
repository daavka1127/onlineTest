var jsonUserAns = [];

var minute = $('#testTime').val();
var second = minute * 60;
localStorage.setItem("timeStatus", "ehellee");

if (localStorage.getItem("leftSecond") > 0) {
    second = localStorage.getItem("leftSecond");
}

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
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        type: "POST",
        url: postUrl,
        data:{
            userAns: jsonUserAns
        },
        success: function(res){
            if(res.status == "success"){
                console.log(res);
                alert(res.msg);
                clearInterval(timerTest);
                localStorage.clear();
                window.location.replace("/");
            }
            else{
                alert("Алдаа гарлаа!!!!!!!!!!!");
            }
        }
    });
});


function convert_tsag(){
    var mod = second % 60;
    if(mod < 10){
        mod = "0" + mod;
    }
    var minut1 = (second - mod) / 60 + ":" + mod;
    document.getElementById("divTime").innerHTML = minut1;
    if(minut1 == "0:00"){
        alert("Шалгалт дууслаа");
        finishTest();
    }
    localStorage.setItem("testTime", minut1);
    localStorage.setItem("leftSecond", second);
    second = second - 1;
}

var timerTest = setInterval(function(){
    convert_tsag();
}, 1000);

function finishTest(){
    var postUrl = $("#btnFinishTest").attr("post-url");

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        type: "POST",
        url: postUrl,
        data:{
            userAns: jsonUserAns
        },
        success: function(res){
            if(res.status == "success"){
                console.log(res);
                alert(res.msg);
                clearInterval(timerTest);
                localStorage.clear();
                window.location.replace("/");
            }
            else{
                alert("Алдаа гарлаа!!!!!!!!!!!");
            }
        }
    });
}
