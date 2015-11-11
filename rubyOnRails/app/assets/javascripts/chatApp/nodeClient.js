var socket = io.connect('http://172.16.20.146:8080');
$(document).ready(function() {
    $("#sendMessage").bind("click", function() {
        var id = '';
        var roomId = '';
        // Ajax call for saving datas
        var valuesToSubmit = $('#form-chat form').serialize();
        if ($("#content_message").val()) {
            $.ajax({
                type: "POST",
                async: false,
                url: $('#form-chat form').attr('action'), //sumbits it to the given url of the form
                data: {
                    group: $(this).attr('data-group'),
                    ip: $('.post-commnent .form-group .ip-user').val(),
                    contentMessage: $('.post-commnent .form-group .form-contro').val(),
                    _token: AUTH_TOKEN
                },
                dataType: "JSON" // you want a difference between normal and ajax-calls, and json is standard
            }).success(function(json) {
                id = json['id'];
                roomId = json['roomId'];
            });
            // put data to server nodejs
            $("#content_message").val('');
            socket.emit('data', {
                roomId: roomId,
                messagerId: id,
            });
            return false;
        }
    });
});


socket.on('data', function(data) {
    console.log(data);
    var dataAppend = '';
    var userMessengerId = '';
    var mf = '';
    $("html, body").animate({
        scrollTop: $(document).height()
    }, "slow");
    $.ajax({
        type: "POST",
        async: false,
        url: '/ajax/find_message', //sumbits it to the given url of the form
        data: {
            id: data.messagerId,
            ip: data.ip
        },
        dataType: "JSON" // you want a difference between normal and ajax-calls, and json is standard
    }).success(function(json) {
        addMessenger(data.messagerId, json['userMessengerId'], json['dataAppend']);
    });
})

socket.on('createRoom', function(data) {
    console.log(data.rooms);
})

function createRoom(id) {
    socket.emit('createRoom', {
        roomId: id,
    });
}

function addMessenger(id, userMessengerId, dataAppend) {
    _this = $("#message-content .group-chat");
    _this.append(dataAppend);
    userAuth = _this.find('.item-chat div[data-messenger=' + (id - 1) + ']').attr('data-user-auth');
    if ((id > 1) && (userAuth == userMessengerId)) {
        _this.find('.item-chat div[data-messenger=' + (id - 1) + ']').append(jQuery(dataAppend).find('.box-main-comment').html());
    } else {
        _this.find('.item-chat[data-messenger=' + id + ']').removeClass('wait-js')
    }
}