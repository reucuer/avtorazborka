$(document).ready(function(){
    $("#newsticker").jCarouselLite({
        vertical: true,
        hoverPause: true,
        btnPrev: "#news-prev",
        btnNext: "#news-next",
        visible: 3,
        auto: 3000,
        speed: 500
    });
    
$("#style-grid").click(function(){
$("#block-tovar-grid").show();
$("#block-tovar-list").hide();
$.cookie('select_style','grid');    
});

$("#style-list").click(function(){
$("#block-tovar-grid").hide();
$("#block-tovar-list").show();
$.cookie('select_style','list');
});

if($.cookie('select_style') == 'grid')
{
$("#block-tovar-grid").show();
$("#block-tovar-list").hide();
}
else
{
$("#block-tovar-grid").hide();
$("#block-tovar-list").show();    
}
});