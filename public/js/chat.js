var time = $.now() / 1000;
$(document).ready(function () {
    waitfornotifi();
    editdate();
    $(".box_chat").off("click", ".box-header").on("click", ".box-header", function () {
        var parent = $(this).parents(".box_chat");
        parent.toggleClass("collapsed-box");
        updateScroll(parent);
    });
    $(".box_chat").off("click", ".sendchat").on("click", ".sendchat", function () {
        var parent = $(this).parents(".box_chat");
        var text = $(".textchat", parent).val();
        if (text == "")
            return false;
        $(".textchat", parent).val("");
        var room = parent.attr("data-room");
        var id = parent.attr("data-id");
        var data = {note_date: moment().format("YYYY-MM-DD HH:mm:ss"), note_content: text, room: room, id_customer: id};
        addchat(data, parent);
        updateScroll(parent);
        $.ajax({
            type: 'POST',
            data: {text: text, room: room, id_customer: id},
            dataType: 'JSON',
            url: path + 'ajax/insertchat',
            beforeSend: function () {
                //$(".loadingtable").show();
            },
            success: function (data) {

            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
        return false;
    });
    $(".box_chat").off("keydown", ".textchat").on("keydown", ".textchat", function (e) {
        if ((e.which == "13" || e.which == "10") && !e.shiftKey) {
            e.preventDefault();
            e.stopPropagation();
            e.stopImmediatePropagation();
            $(".sendchat").trigger("click");
            return false;
        }
    })
});
function updateScroll(parent) {
    var element = $(".direct-chat-messages", parent)[0];
    element.scrollTop = element.scrollHeight;
}
function editdate() {
    $(".direct-chat-timestamp").each(function () {
        var data = $(this).attr("data-date");
        $(this).text(moment(data).fromNow());
    });
}
function addchat(data, parent) {
    var id = data.id;
    var text = data.note_content;
    var note_date = moment(data.note_date).fromNow();
    var id_customer = data.id_customer;
    var template = $(".direct-chat-msg.left").first().clone();
    var data_id = parent.attr("data-id");
    if (id_customer == data_id) {
        template = $(".direct-chat-msg.right").first().clone();
    }
    if (id_customer == "0") {
        $(".direct-chat-name", template).text("Admin");
    }else{
        $(".direct-chat-name", template).text("");
    }
    template.attr("data-id", id);
    $(".direct-chat-timestamp", template).text(note_date);
    $(".direct-chat-text", template).text(text);
    var html = template[0].outerHTML;
    $(".direct-chat-msg[data-id='" + id + "']", parent).remove();
    $(".direct-chat-messages", parent).append(html);
}
function waitfornotifi() {
    $.ajax({
        type: 'GET',
        dataType: "JSON",
        async: true,
        cache: false,
        data: {time: time},
        url: path + 'ajax/realtime',
        success: function (data) {
            time = data['time'];
            $.each(data['data'], function (key, val) {
                var id_room = val['room'];
                var id_customer = val['id_customer'];
                var data_id = 0;
                if (id_customer == "0")
                    data_id = id_room;
                var parent = $(".box_chat[data-room='" + id_room + "'][data-id='" + data_id + "']");
                if (parent.length) {
                    addchat(val, parent);
                    updateScroll(parent);
                }
            });
            setTimeout(waitfornotifi, 5000);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            setTimeout(waitfornotifi, 15000);
        }
    });
}