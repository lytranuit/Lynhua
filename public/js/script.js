$(document).ready(function () {
    $(document).off("inview", '.onlyone').on("inview", '.onlyone', function () {
        var style = $(this).attr("data-style");
        $(this).removeClass("onlyone").addClass('animated ' + style);
    });

    $(document).off("click", '.bounce123').on("click", '.bounce123', function () {
        var parent = $(this).parent();
        var box = parent.prev(".show_more");
        box.removeClass("show_more");
        parent.remove();
    });
    
});