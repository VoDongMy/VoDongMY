function searchAllTicket() {
    var k_word = $("#k_word").val();
    var k_from = $("#k_from").val();
    var k_to = $("#k_to").val();
    var k_status = $("#k_status").val();

    var DATA = "cmd=searchAllTicket&k_word=" + k_word + "&k_from=" + k_from + "&k_to=" + k_to + "&k_status=" + k_status;
    $.ajax({
        cache: false,
        type: "GET",
        url: "ajax.php",
        data: DATA,
        success: function (dataReturn) {
            if (dataReturn) {
                $("#n_searchResults").html(dataReturn);
                $("#n_searchResults").css('display', 'block');
                oTable = $('#search_NOC').dataTable({
                    'bRetrieve': true,
                    "bJQueryUI": true,
                    "sPaginationType": "full_numbers",
                    //"sDom": '<""l>t<"F"fp>'
                    "sDom": '<"topr"f>t<"F"lp>',
                });
            }
        }
    });

}

