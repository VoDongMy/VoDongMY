$(document).ready(function() {
    $("#form_contact").validate({
        errorElement: "div",
        ignore: "",
        rules: {
            'vdata[fullname]': {required :true},
            'vdata[email]':{required :true, email:true},
            'vdata[phone]': {required :true},
            'vdata[title]': {required :true},
            'vdata[content]':{required :true}
        },
        messages: {
            'vdata[fullname]': {required : v_fullname},
            'vdata[email]':{required : v_email, email: v_valid_email},
            'vdata[phone]': {required : v_phone },
            'vdata[title]': {required : v_title},
            'vdata[content]':{required : v_content}
        }
    });
});