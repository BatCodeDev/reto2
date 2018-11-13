$("body").width($(window).width());
$("body").height($(window).height());
$("#grid").height($(window).height());
$(window).resize(function(){
    $("body").width($(window).width());
    $("body").height($(window).height());
    $("#grid").height($(window).height());
});
function request2server(idForm, target) {
    var form_data = $("#"+idForm).serialize();
    $.ajax({
        url: target,
        data: form_data,
        type: "POST",
        success: function (data) {
            debugger;
            switch (data){
                case "success":
                    $("#errorRegistry").html("Correcto");
                    break;
                case "errorUser":
                    $("#errorRegistry").html("Usuario ya existe");
                    break;
                case "errorEmail":
                    $("#errorRegistry").html("Email ya existe");
                    break;
                case "errorUpdate":
                    $("#errorRegistry").html("Datos introducidos incorrectos");
                    break;
            }
        },
        error: function () {
            console.log("ok");
        }
    });
    return false;
}
function toggleNavbar() {
    toggle($('#navBar'), 'toggle');
    toggle($('#divNavTrigger'), 'trigger');
    goFade($('#fullfade'));
}
function toggle(toToggle, toggleClass) {
    if(toToggle.hasClass(toggleClass)){
        toToggle.removeClass(toggleClass);
    }else{
        toToggle.addClass(toggleClass);
    }
}
function goFade(element) {
    if(!element.is(":visible")){
        element.fadeIn(200);
    }else{
        element.fadeOut(200);
    }
}