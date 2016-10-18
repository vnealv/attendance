var url_doc = document.getElementById('url').value;
$(document).ready(function () {

    

    var bodyId = $("#content").attr('class');
    $("#style-switcher").hide();
    $('#menu li').hover(function () {
//        alert('s');
        var className = jQuery(this).children("ul").attr('class');
        if (className !== "collapse in") {
            jQuery(this).children("ul").css("display", "none");
        }
    });

    $('#menu li').click(function () {
        jQuery(this).children("ul").removeAttr('style');
    });

    var bodyBackgroud = $('#body').css('background-image');
//    $('#body').css('background-image', bodyBackgroud.replace('home/', ''));
//    $('#body').css('background-image', 'url(http://localhost/pbb_admin/assets/img/pattern/arches.png)');

    if (bodyId == "dashboard_v") {
        $(function () {
            Metis.dashboard();
        });
//        $('#source_sel').on('change', function () {
////            alert( window.location.href ); // or $(this).val()
//            window.location = $("#base_url").val() + "/" + this.value;
//        });
        drawHighcharts();
        $('input.datetimepick').datetimepicker({
            //pick12HourFormat: false,		
//            pickSeconds: false,
//            minuteStepping: 5

        });
    }
    else if (bodyId == "registered_list_v" || bodyId == "members_list_v") {
        $(function () {
            Metis.MetisTable({
                sort: "Date Entered"
            });
//            Metis.metisSortable();
        });

    }
    else if (bodyId == 'users_v') {
        $(function () {
            Metis.dashboard();
        });
        $('input.datetimepick').datetimepicker({
            //pick12HourFormat: false,		
//            pickSeconds: false,
//            minuteStepping: 5

        });
    }

    if (bodyId == "members_list_v") {
        $('#dun_sel').on('change', function () {
//            alert( window.location.href ); // or $(this).val()
            window.location = $("#base_url").val() + "/" + this.value;
        });
    }





});


;
(function ($) {
    "use strict";
    Metis.dashboard = function () {


        //----------- BEGIN SPARKLINE CODE -------------------------*/
        // required jquery.sparkline.min.js*/

        /** This code runs when everything has been loaded on the page */
        /* Inline sparklines take their values from the contents of the tag */
        $('.inlinesparkline').sparkline();

        /* Sparklines can also take their values from the first argument
         passed to the sparkline() function */
        var myvalues = [10, 8, 5, 7, 4, 4, 1];
        $('.dynamicsparkline').sparkline(myvalues);

        /* The second argument gives options such as chart type */
        $('.dynamicbar').sparkline(myvalues, {type: 'bar', barColor: 'green'});

        /* Use 'html' instead of an array of values to pass options
         to a sparkline with data in the tag */
        $('.inlinebar').sparkline('html', {type: 'bar', barColor: 'red'});


        $(".sparkline.bar_week").sparkline([5, 6, 7, 2, 0, -4, -2, 4], {
            type: 'bar',
            height: '40',
            barWidth: 5,
            barColor: '#4d6189',
            negBarColor: '#a20051'
        });

        $(".sparkline.line_day").sparkline([5, 6, 7, 9, 9, 5, 4, 6, 6, 4, 6, 7], {
            type: 'line',
            height: '40',
            drawNormalOnTop: false
        });

        $(".sparkline.pie_week").sparkline([1, 1, 2], {
            type: 'pie',
            width: '40',
            height: '40'
        });

        $('.sparkline.stacked_month').sparkline(['0:2', '2:4', '4:2', '4:1'], {
            type: 'bar',
            height: '40',
            barWidth: 10,
            barColor: '#4d6189',
            negBarColor: '#a20051'
        });
        //----------- END SPARKLINE CODE -------------------------*/
    };
    return Metis;
})(jQuery);

function search() {
    var date1 = $("#date1").val();
    var date2 = $("#date2").val();
    var emp = $("#emp_sel").val();
//    var org = $("input[type='radio'][name='organization']:checked").val();
//    $.ajax({
//        url:"dashboard_data",
//        type: "POST",
//        
//        data: {date1: date1, date2: date2, emlpyee: emp},
//        success: function(d){
//            window.open('dashboard_data','_blank');
//        }
//    });
    window.location.href = "http://localhost/attendance/home/dashboard?date1=" + date1 + "&date2=" + date2 + "&employee=" + emp;
//    window.location.href = "http://attendance.aga.my/home/dashboard?date1=" + date1 + "&date2=" + date2 + "&employee=" + emp;
}





function add() {

    var name = $("#name").val();
    var email = $("#email").val();
    
    $("#add_b").prop('disabled', true);
    if (name && email) {
        $.ajax({
            url: "add",
            type: "POST",
            data: {name: name, email: email},
            success: function (d) {
                alert(d);
                $("#add_b").prop('disabled', false);
            }
        });
    }
    else {
        alert("Missing Fields");
        $("#add_b").prop('disabled', false);
    }


//    console.log(name +"  "+email+"  "+org);
}

function drawHighcharts() {
    var data = [];
//    $.ajax({
//        url: "dashboard_data",
//        type: "GET",
//        data: {time_frame: 1},
//        success: function (d) {
//            data = d;
////            console.log(data.length);
////            console.log(data[0]);
//            var names = [];
//            var time = [];
//            var temp = [];
//            var pushed = false;
//            var temp_id = 0;
//
//            for (var i = 0; i < data.length; i++) {
//                console.log(data[i].user_id);
////                if ((i % 2) == 0) {
////                    if (temp_id == data[i].user_id) {
//////                        continue;
////                    }
////                    temp_id = data[i].user_id;
////                }
//                if (data[i].comment == "Office" || data[i].comment == "Home") {
//                    if (!pushed) {
//                        names.push(data[i].users_name);
//                        pushed = true;
//                        temp = [];
//                        if (data[i].event == "In") {
//                            temp.push(Date.parse(data[i].time_checkin_out));
//                        }
//                        else {
//                            alert(data[i]);
//                            console.log(data[i]);
//                        }
//                    }
//                    else {
//                        if (data[i].event == "Out") {
//                            temp.push(Date.parse(data[i].time_checkin_out));
//                        }
//                        else {
//                            alert(data[i]);
//                            console.log(data[i]);
//                        }
//                        time.push(temp);
//                        pushed = false;
//                    }
//
//
//                    if (data[i].event == "") {
//                        temp.push(data[i].time_checkin_out);
//                    }
//                }
//            }
//            console.log(time);
//            console.log(names);

//    alert(Highcharts.dateFormat('%e. %b', new Date(1368223200000)));
    $('#container').highcharts({
        chart: {
            type: 'columnrange',
            inverted: true
        },
        title: {
            text: 'Employees Timesheet'
        },
        subtitle: {
            text: 'AGA Group'
        },
        xAxis: {
            categories: ["nae", "wael", "azmi"],
            type: 'datetime',
            dateTimeLabelFormats: {
                millisecond: '%H:%M:%S.%L',
                second: '%H:%M:%S',
                minute: '%H:%M',
                hour: '%H:%M',
                day: '%e. %b',
                week: '%e. %b',
                month: '%b \'%y',
                year: '%Y'
            }

        },
        yAxis: {
            title: {
                text: 'Time'
            },
            type: 'datetime',
            dateTimeLabelFormats: {
                day: '%e of %b'
            }
        },
//        tooltip: {
//            valueSuffix: ''
//        },

        plotOptions: {
            column: {
                stacking: 'normal'
            },
            series: {
                stacking: 'normal'
            },
            columnrange: {
                dataLabels: {
                    enabled: true,
                    formatter: function () {
                        console.log("x: " + this.x + " y: " + this.y);
                        return  '' +
                                Highcharts.dateFormat('%H:%M',
                                        new Date(this.y))
                                ;
                    }
                }
            }
        },
        legend: {
            enabled: false
        },
        series: [{
                data: [
                    [2, 3, 4],
                    [2, 1],
                    [3, 4, 8, 1],
                    [2, 6]
                ]
//                                [
//                [1439438420, 1439461589],
//                [1439439740, 1439462008]
//                            [Date.UTC(2015, 08, 14, 09, 34), Date.UTC(2015, 08, 14, 19, 54)],
//                            [Date.UTC(2015, 08, 14, 11, 01), Date.UTC(2015, 08, 14, 18, 40)]


//                        ]
            }]

    });
//        }
//    });
}

function delete_emp(id, md5) {
    $.ajax({
        url: "delete_employee/",
        type: "POST",
        data: {emp: id, md5: md5},
        success: function (data) {

            if (data == 1) {
                $('#' + id).remove();
            }
            else {
                alert("Ops, try again later please.");
            }
        }
    });
}

function update_in(count, md5_id, where) {
//    console.log($("#id_"+md5id).val());
    var status = $("#status_" + count).val();
    var out = 0;
    if (status == "Out") {
        out = 1;
    }
    if (status != "0") {
        var data = {
            check_in: 0,
            id: md5_id,
            check_out: out,
            specify: status,
            remarks: $("#remarks_" + count).val(),
            time: $("#date_" + count).val()
        };

        $.ajax({
            url: "update2/",
            type: "POST",
            data: data,
            success: function (data) {

                if (data == 1) {
                    window.location.reload();
                }
                else {
                    alert("Ops, try again later please.");
                }
            }
        });

        console.log(data);
    }
}

function update_out(count, md5_id, where) {
//    console.log($("#id_"+md5id).val());
    var status = $("#status_out_" + count).val();
    var cin = 0;
    if (status == "Office") {
        cin = 1;
    }
    if (status != "0") {
        var data = {
            check_in: cin,
            id: md5_id,
            check_out: 0,
            specify: status,
            remarks: $("#remarks_out_" + count).val(),
            time: $("#date_out_" + count).val()
        };

        $.ajax({
            url: "update2/",
            type: "POST",
            data: data,
            success: function (data) {

                if (data == 1) {
                    window.location.reload();
                }
                else {
                    alert("Ops, try again later please.");
                }
            }
        });

        console.log(data);
    }
}

function update_remarks(count, md5_id, where) {
    var data = {
        id: md5_id,
        remarks: $("#remarks_" + count).val()
    };

    $.ajax({
        url: "update_remarks/",
        type: "POST",
        data: data,
        success: function (data) {

            if (data == 1) {
                window.location.reload();
            }
            else {
                alert("Ops, try again later please.");
            }
        }
    });
}

function update_remarks_out(count, md5_id, where) {
    var data = {
        id: md5_id,
        remarks: $("#remarks_out_" + count).val()
    };

    $.ajax({
        url: "update_remarks/",
        type: "POST",
        data: data,
        success: function (data) {

            if (data == 1) {
                window.location.reload();
            }
            else {
                alert("Ops, try again later please.");
            }
        }
    });
}

