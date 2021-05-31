$("#btnLogin").click(function(e){
    e.preventDefault();
    if($("#txtOccupation").val() == ""){
        alertify.error('Та мэргэжлээ оруулна уу!!!');
        return;
    }
    if($("#txtRD").val() == ""){
        alertify.error('Та регистрийн дугаараа оруулна уу!!!');
        return;
    }
    if($("#txtFirstName").val() == ""){
        alertify.error('Та овогоо оруулна уу!!!');
        return;
    }
    if($("#txtLastName").val() == ""){
        alertify.error('Та нэрээ оруулна уу!!!');
        return;
    }

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: "POST",
        url:$("#btnLogin").attr("post-url"),
        data:$("#frmNewUser").serialize(),
        success:function(res){
            if(res.status == "success"){
                window.location.href = "/";
            }
            else if(res.status == "loginError"){
                alertify.error(res.msg);
                var audio = new Audio($("#hideSong").val());
                audio.play();
            }
            else{
                alertify.error(res.msg)
            }
        }
    });
});
