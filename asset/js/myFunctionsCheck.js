$(document).ready(function() {
    $("#inputBaru").mask("999999-99-9999");
});


function validate() {

    var comp = 1;

    if (!$("#inputNama").val()) {
        $("#inputNama").closest('.form-group').addClass("has-error");
        comp = 0;
    }
    if ($("#month3").val() == 0 || $("#day3").val() == 0 || $("#year3").val() == 0) {
        $("#month3").closest('.form-group').addClass("has-error");
        comp = 0;
    }
    ic = $("#inputBaru").val().replace(/[^0-9]/g, '');
    if (ic.length !== 12) {
        $("#inputBaru").closest('.form-group').addClass("has-error");
        comp = 0;
    }
    if (!$("#Kediaman").val()) {
        $("#Kediaman").closest('.form-group').addClass("has-error");
        comp = 0;
    }
    if (!$("#inputBimbit").val()) {
        $("#inputBimbit").closest('.form-group').addClass("has-error");
        comp = 0;
    }

    if ($("#inputEmail").val()) {
        if (validateEmail($("#inputEmail").val())) {

        }
        else {
            $("#inputEmail").closest('.form-group').addClass("has-error");
            comp = 0;
        }

    }
    comp = 1;
    if (comp) {
        $("#submit").prop('disabled', true);
        return true;
    }
    else {
//        alert("Please, check that you entered all the mandatory fields!");
        alert("Diminta mengisi lapangan yang diwajibkan");
        return false;
    }


}

function validateEmail(email) {


    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}