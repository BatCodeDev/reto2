$("body").width($(window).width());
$("body").height($(window).height());
$("#grid").height($(window).height());
$(window).resize(function(){
    $("body").width($(window).width());
    $("body").height($(window).height());
    $("#grid").height($(window).height());
    if($(window).width() > 800){
        $("#navBar").removeClass("toggle");
        $("#fullfade").fadeOut(200);
        $("#divNavTrigger").removeClass("trigger");
    }
});

function request2server(idForm, target) {
    var form_data = $("#"+idForm).serialize();
    $.ajax({
        url: target,
        data: form_data,
        type: "POST",
        success: function (data) {
            console.log(data);
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

function request2server2(idForm, target) {
    var imagen = new FormData($('#'+idForm)[0]);

    $.ajax({
        type:'post',
        url:target,
        data:imagen,
        contentType:false,
        processData:false

    })
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
function validate(elForm, user){
    var correct = true;
    var inputs = elForm.children;
    Array.from(inputs).forEach(function (key) {
        if(!searchCleanString(key.value)){
            key.style.background = "red";
            correct = false;
        }else if(key.name!="registry"||key.name!="login"){
            key.style.background = "white";
        }
    });
    if(!user.value.match("^[a-z0-9]*$")){
        user.style.background = "red";
        correct = false;
    }else{
        user.style.background = "white";
    }
    if(correct){
        request2server(elForm.id, 'server/verifyRegistry.php')
    }
    return false;
}
function searchCleanString(element) {
    for(var x = 0; x < element.length&&element.charAt(x)!=';'; x++){}
    if(x == element.length){
        return true;
    }
    return false;
}