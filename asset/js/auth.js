function e(a) {
    console.log('entered auth e: ' + a);

    $.ajax({
        type: "POST",
        url: "../../services/Auth.asmx/e",
        data: "{'a':'" + a + "'}",
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function (msg) {
            console.log('auth e msg: ', msg);
            return msg.d;
        }
    });
};

function d(a) {
    console.log('entered auth d: ' + a);

    $.ajax({
        type: "POST",
        url: "../../services/Auth.asmx/d",
        data: "{'a':'" + a + "'}",
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function (msg) {
            console.log('aout d msg: ', msg);
            return msg.d;
        }
    });
};