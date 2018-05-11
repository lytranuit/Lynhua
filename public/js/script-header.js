$(document).ready(function () {
    $.validator.setDefaults({
        debug: true,
        success: "valid"
    });
    $(".dropdown-toggle").dblclick(function () {
        var href = $(this).attr("href");
        if (href != "" && href) {
            window.location = href;
        }
    });
    $(".dropdown-toggle").click(function () {
        $(this).trigger("dblclick");
    });
    $(".dropdown").on({mouseenter: function () {
            $(".dropdown-toggle", $(this)).attr("aria-expanded", true);
            $(this).addClass("open");
        }, mouseleave: function () {
            $(".dropdown-toggle", $(this)).attr("aria-expanded", false);
            $(this).removeClass("open");
        }});
    $(".top-bar").click(function () {
        var parent = $(this).parents(".panel");
        $(".panel-body", parent).toggle(500);
    });
    $("#popuplienhe").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            mobile: {
                number: true
            }
        },
        errorPlacement: function (error, element) {
            element.attr("title", error.text()).tooltip();
        },
        submitHandler: function (form) {
            var data = $(form).serialize();
            $.ajax({
                type: 'POST',
                data: data,
                dataType: "JSON",
                url: path + 'ajax/contactsubmit',
                success: function (data) {
                    if (data.success) {
                        $(".top-bar").trigger("click");
                        alert("Đăng kí thành công!");
                        $(form).trigger("reset");
                    } else if (data.error) {
                        alert(data.error);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                }
            });
            return false;
        }
    });
    $("#formlienhe").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            mobile: {
                number: true
            }
        },
        errorPlacement: function (error, element) {
            element.attr("title", error.text()).tooltip();
        },
        submitHandler: function (form) {
            var data = $(form).serialize();
            $.ajax({
                type: 'POST',
                data: data,
                dataType: "JSON",
                url: path + 'ajax/contactsubmit',
                success: function (data) {
                    if (data.success) {
                        alert("Đăng kí thành công!");
                        $(form).trigger("reset");
                    } else if (data.error) {
                        alert(data.error);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                }
            });
            return false;
        }
    });
});