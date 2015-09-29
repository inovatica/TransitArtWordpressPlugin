jQuery(function ($) {
    $("#generate").click(function () {
        var type = $("#type").val();
        var demo = $("#demo").val();
            $("#result").val('[transitart t="'+ type +'" demo="'+ demo +'"]').css('visibility', 'visible');
    });
});