$(function(){
    $("nav ul li a").removeClass('active');
    $(".menuInicio").addClass('active');

    $(".card .btn").click(function () {
        $('.card .card-header .fa').removeClass('fa-angle-up');
        $('.card .card-header .fa').addClass('fa-angle-down');

        if ($(this).closest('.card').find('.card-body').is(':visible') === false) {
            $(this).find('.fa').removeClass('fa-angle-down');
            $(this).find('.fa').addClass('fa-angle-up');
        } else {
            $(this).find('.fa').removeClass('fa-angle-up');
            $(this).find('.fa').addClass('fa-angle-down');
        }
    });
});

function irActualizarInfo() {
    if ($("#cardUpdateInfo").closest('.card').find('.card-body').is(':visible') === false) {
        $("#cardUpdateInfo").click();
    }

    setTimeout(function () {
        $('html, body').animate({
            scrollTop: $("#cardUpdateInfo").closest('.card').offset().top
        }, 500);
    }, 700);
}