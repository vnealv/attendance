$(document).ready(function() {
    $('.fileinput').fileinput();

    $('input.datetimepick').datetimepicker({
        //pick12HourFormat: false,		
        //pickSeconds: false,
        //minuteStepping: 5
        pickTime: false

    });
    $().dateSelectBoxes({
        monthElement: $('#month3'),
        dayElement: $('#day3'),
        yearElement: $('#year3'),
        generateOptions: true,
        keepLabels: true
    });

    $('#year3 option').each(function(e) {
//        if($(this).html() != 'Year'){
        $(this).val($(this).html());
//        }
//        else{
//            $(this).html('Tahun');
//        }
//        if($(this).val() == 1991){
//            $(this).attr('selected', 'selected');
//        }
    });

    $("#month3 option").each(function(e) {
//        if ($(this).val() != 0) {
////            $(this).html($(this).val());
//        }
        if ($(this).val() == 1) {
            $(this).html('Jan');
        }
        if ($(this).val() == 2) {
            $(this).html('Feb');
        }
        if ($(this).val() == 3) {
            $(this).html('Mac');
        }
        if ($(this).val() == 4) {
            $(this).html('Apr');
        }
        if ($(this).val() == 5) {
            $(this).html('Mei');
        }
        if ($(this).val() == 6) {
            $(this).html('Jun');
        }
        if ($(this).val() == 7) {
            $(this).html('Jul');
        }
        if ($(this).val() == 8) {
            $(this).html('Aug');
        }
        if ($(this).val() == 9) {
            $(this).html('Sep');
        }
        if ($(this).val() == 10) {
            $(this).html('Oct');
        }
        if ($(this).val() == 11) {
            $(this).html('Nov');
        }
        if ($(this).val() == 12) {
            $(this).html('Dis');
        }

    });

    $("#year3 option").first().html('Tahun');
    $("#year3 option").first().val(0);

    $("#month3 option").first().html('Bulan');
    $("#day3 option").first().html('Hari');

    $("#month3").children().removeAttr("selected");
    $("#day3").children().removeAttr("selected");
    $("#year3").children().removeAttr("selected");

    $("#inputBaru").mask("999999-99-9999");

//    $("#inputBimbit").mask("+60 19-999 9999");


    $(".sel").select2();

    $("#agamaSel").append($('<option>', {value: "NEWVAL", text: "Nyatakan"}));

    var $eventSelect = $("#agamaSel");

    $eventSelect.on("select2:select", function(e) {
        if (e.params.data.id === 'NEWVAL') {
            $("#agamadiv").append('<input type="text" class="form-control upper" id="inputAgamaNewVal" name="inputAgamaNewVal" placeholder="">');
        }
        else {
            $("#inputAgamaNewVal").remove();
        }

    });



    $("#bangsaSel").append($('<option>', {value: "NEWVAL", text: "Nyatakan"}));

    var $eventSelect2 = $("#bangsaSel");

    $eventSelect2.on("select2:select", function(e) {
        if (e.params.data.id === 'NEWVAL') {
            $("#bangsadiv").append('<input type="text" class="form-control upper" id="inputBangsaNewVal" name="inputBangsaNewVal" placeholder="">');
        }
        else {
            $("#inputBangsaNewVal").remove();
        }

    });


});


function validate() {

    var comp = 1;

    if (!$("#inputAgamaNewVal").val() && $("#inputAgamaNewVal").length) {
        console.log('sd');
        $("#inputAgamaNewVal").closest('.form-group').addClass("has-error");
        comp = 0;
    }
    
    if (!$("#inputBangsaNewVal").val() && $("#inputBangsaNewVal").length) {
        $("#inputBangsaNewVal").closest('.form-group').addClass("has-error");
        comp = 0;
    }
    
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

function validatein(evt) {
//    console.log(evt);
    var theEvent = evt || window.event;
    if (theEvent.charCode != 0) {
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
        var regex = /[0-9]/;
        if (!regex.test(key)) {
            theEvent.returnValue = false;
            if (theEvent.preventDefault)
                theEvent.preventDefault();
        }
    }
}