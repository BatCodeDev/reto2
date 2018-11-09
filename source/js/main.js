$("body").width($(window).width());
$("body").height($(window).height());
$("#grid").height($(window).height());
$(window).resize(function(){
    $("body").width($(window).width());
    $("body").height($(window).height());
    $("#grid").height($(window).height());
});
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