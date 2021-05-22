var index = 2;

$("#btnNewAnswer").click(function(e){
    e.preventDefault();
    alert("A");
    $("#frmNewQuestion").submit();
});