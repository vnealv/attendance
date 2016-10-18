var flag = false;
//var totalLoc = $.session.get('totalLocations');
//var sessionIndex;
var page;

function pageload(page) {
    gagid = $.session.get('agancyid');
    this.page = page;
    getNegeri(page);

    //if (page.indexOf("index.aspx") >= 0) {
    //    getJenisView();
    //}
}


function msgwarning(v) {
    if (v) {
        $('#loaderDiv').attr('style', 'display:none;');
    }
}
function msgsuccess(v) {
    if (v) {
        $('#loaderDiv').attr('style', 'display:none;');
    }
}
function msgerror(v) {
    if (v) {
        $('#loaderDiv').attr('style', 'display:none;');
    }
}
function msginfo(v) {
    if (v) {
        $('#loaderDiv').attr('style', 'display:block;');
    } else {
        $('#loaderDiv').attr('style', 'display:none;');
    }
}
function msgdefault(v, t) {
    if (v) {
        $('#loaderDiv').attr('style', 'display:none;');
    }
}
function msghide() {
    $('#loaderDiv').attr('style', 'display:none;');
}

    // __________________________ Date Picker __________________________
    //
    function datepicker() {

        $('#datetimepickervalue').val(Date.today().toString('yyyy-MM-dd'));
        $('#datetimepickerchart').datetimepicker({
            pickTime: false
        });
        $('#datetimepickerchart').on('change', function (ev) {
            if ($('#datetimepickervalue').val() != null) {
                console.log("entered datetimepicker value: " + $('#datetimepickervalue').val());
            }
        });
    }

    // __________________________ Upload File __________________________
    //
    function uploadFile() {
        $("#divStatus").attr('style', 'display:none;');

        var data = new FormData();
        var agensiTitle = $.session.get('agensiTitle');
        var jenis = $('#dropDownListJenis option:selected').text();
        var kategory = $('#dropDownListKategori option:selected').text();
        var negeri = $('#navbarStaticSide_DropDownListNegeri option:selected').text();
        var parliaments = $('#navbarStaticSide_DropDownListParlimen option:selected').text();
        var dun = $('#navbarStaticSide_DropDownListDun option:selected').text();
        var dm = $('#navbarStaticSide_DropDownListDm option:selected').text();
        var hashtag = $('#txtHashTag').val() != '' ? $('#txtHashTag').val() : $("input:checked").parent().children('label').html();
        var fileLocation = "Kempen";

        // For Insert only
        //var fileName = $('#txtFileTitle').val() != '' ? $('#txtFileTitle').val() + '.' + ($("#fileUpload").get(0).files[0].name).split('.').pop() : $("#fileUpload").get(0).files[0].name;
        var fileName = $("#fileUpload").get(0).files[0].name;
        fileName = fileName.replace(/[\*\&\@\$\#\%\^\'\!]/g, '-');
        console.log('File Name: >>>>> ', fileName);

        var files = $("#fileUpload").get(0).files;
        console.log('upload....');
        // Add the uploaded image content to the form data collection
        if (files.length > 0 && agensiTitle != null && jenis != '' && kategory != '' && negeri != '' && hashtag != null && hashtag != '') {
            //////////////////////////////////////////////////////////////////////////////////////////////////////progress();
            data.append("UploadedImage", files[0]);
            data.append(agensiTitle + '/' + jenis + '/' + kategory + '/' + negeri + '/' + parliaments + '/' + dun + '/' + dm + '/' + fileLocation, "AddressValue");


            // Make Ajax request with the contentType = false, and procesDate = false
            var ajaxRequest = $.ajax({
                type: "POST",
                dataType: 'json',
                url: "http://docs.repositori.1touch.my/RepoService.svc/UploadFile",
                contentType: false,
                processData: false,
                data: data,
                statusCode: {
                    404: function () {
                        $("#divStatus").attr('style', 'display:show;');
                        $("#divStatus").addClass('alert alert-warning');
                        $("#lblStatus").text('Server Error.... please Try again later');
                        flag = true;
                        setTimeout(function () { $('#progress-load').css('display', 'none'); }, 500);
                    }
                },
                xhr: function () {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function (evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total;
                            var perc = Math.round(percentComplete * 100);
                            //console.log('upload', perc);
                            $("#divStatus").attr('style', 'display:show;');
                            $('#progress-load').css('width', (perc) + '%');
                            $('#progress-load').text((perc) + '%');
                        }
                    }, false);

                    xhr.addEventListener("progress", function (evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total;
                            //Do something with download progress
                            console.log('download', percentComplete);
                        }
                    }, false);

                    return xhr;
                },
                processData: false,
            });

            ajaxRequest.done(function (responseData, textStatus) {
                flag = true;
                $("#divStatus").attr('style', 'display:show;');
                if (textStatus == 'success') {
                    if (responseData != null) {
                        if (responseData.key) {
                            $("#divStatus").removeClass();
                            $("#divStatus").addClass('alert alert-success');
                            $("#lblStatus").text(responseData.value);
                            $("#fileUpload").val('');
                            $("#selectedFile").text('');
                            insertRepository(fileName); //---------------------------------Insert into db File after successful upload
                        } else {
                            $("#divStatus").removeClass();
                            $("#divStatus").addClass('alert alert-warning');
                            $("#lblStatus").text(responseData.value);
                            $("#fileUpload").val('');
                            $("#selectedFile").text('');
                        }
                    }
                } else {
                    $("#divStatus").removeClass();
                    $("#divStatus").addClass('alert alert-warning');
                    $("#lblStatus").text(responseData.value);
                    $("#fileUpload").val('');
                    $("#selectedFile").text('');
                }
                setTimeout(function () { $('#progress-load').css('display', 'none'); }, 2000);
            });
        } else {
            $("#divStatus").attr('style', 'display:show;');
            $("#divStatus").removeClass();
            $("#divStatus").addClass('alert alert-danger');
            $("#lblStatus").text('Please Select the required fields...');
            $("#fileUpload").val('');
            $("#selectedFile").text('');
        }
    }

    //___________________________Insert Repository ______________________
    //
    function insertRepository(filename) {

        //----------------------for Directory only---------------------------------
        var parliaments = $('#navbarStaticSide_DropDownListParlimen option:selected').text() != '' ? $('#navbarStaticSide_DropDownListParlimen option:selected').text() + '/' : '';
        if (parliaments.indexOf("Select Parlimen/") >= 0) {
            parliaments = '';
        }
        var dun = $('#navbarStaticSide_DropDownListDun option:selected').text() != '' ? $('#navbarStaticSide_DropDownListDun option:selected').text() + '/' : '';
        if (dun.indexOf("Select Dun/") >= 0) {
            dun = '';
        }
        var dm = $('#navbarStaticSide_DropDownListDm option:selected').text();
        if (dm.indexOf("Select Dm") >= 0) {
            dm = '';
        }
        //-------------------------------------------------------------------------

        var dataRow = JSON.stringify({
            agensiid: $.session.get('agancyid'),
            agensiTitle: $.session.get('agensiTitle'),
            jenis_id: $('#dropDownListJenis option:selected').val(),
            jenis: $('#dropDownListJenis option:selected').text(),
            kategory_id: $('#dropDownListKategori option:selected').val(),
            kategory: $('#dropDownListKategori option:selected').text(),
            negeri_id: $('#navbarStaticSide_DropDownListNegeri option:selected').val(),
            negeri: $('#navbarStaticSide_DropDownListNegeri option:selected').text(),
            parliaments_id: $('#navbarStaticSide_DropDownListParlimen option:selected').val() != null ? $('#navbarStaticSide_DropDownListParlimen option:selected').val() : '0',
            PARLIMEN: $('#navbarStaticSide_DropDownListParlimen option:selected').text() != 'Select Parlimen' ? $('#navbarStaticSide_DropDownListParlimen option:selected').text() : '',
            dun_id: $('#navbarStaticSide_DropDownListDun option:selected').val() != null ? $('#navbarStaticSide_DropDownListDun option:selected').val() : '0',
            DUN: $('#navbarStaticSide_DropDownListDun option:selected').text() != 'Select Dun' ? $('#navbarStaticSide_DropDownListDun option:selected').text() : '',
            dm_id: $('#navbarStaticSide_DropDownListDm option:selected').val() != null ? $('#navbarStaticSide_DropDownListDm option:selected').val() : '0',
            DM: $('#navbarStaticSide_DropDownListDm option:selected').text() != 'Select Dm' ? $('#navbarStaticSide_DropDownListDm option:selected').text() : '',
            tarikh: $('#datetimepickervalue').val(),
            directory: $.session.get('agensiTitle') + '/' + $('#dropDownListJenis option:selected').text() + '/' + $('#dropDownListKategori option:selected').text() + '/' + $('#navbarStaticSide_DropDownListNegeri option:selected').text() + '/' + parliaments + dun + dm,
            file: filename,
            hashtag: $('#txtHashTag').val() != '' ? $('#txtHashTag').val() : $("input:checked").parent().children('label').html(),
            file_desc: $('#txtFileTitle').val(),
            keterangan: $('#txtKeterangan').val(),
            table: "kempen.repository"
        });

        var json = JSON.parse(dataRow);

        msginfo(true);

        if (json["agensiid"] != null && json["hashtag"] != '' && json["hashtag"] != null && json["jenis"] != '' && json["kategory"] != '' && filename != null) {
            $.ajax({
                type: "POST",
                url: "http://docs.repositori.1touch.my/RepoService.svc/insertToRepository",
                data: dataRow,
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function (msg) {
                    console.log('insertRepository msg: ', msg);
                    // all begins here

                    if (msg.d != 0) {
                        //$('#dropDownListJenis option').remove();
                        $("#divStatus").removeClass();
                        $("#divStatus").addClass('alert alert-success');
                        $("#lblStatus").text('Database Updated Successfully!');

                        msgdefault(true, 'Successful');
                    } else {
                        $("#divStatus").removeClass();
                        $("#divStatus").addClass('alert alert-warning');
                        $("#lblStatus").text('Unable to Insert Into Database...');
                        msgwarning(true);
                    }
                },
                error: function (x, y, e) {
                    msgerror(true);
                }
            });
        } else {
            $("#divStatus").attr('style', 'display:show;');
            $("#divStatus").removeClass();
            $("#divStatus").addClass('alert alert-danger');
            $("#lblStatus").text('Please Select the required fields...');
            $("#fileUpload").val('');
            $("#selectedFile").text('');
        }

    }
    // __________________________ Progress bar __________________________
    //
    function progress() {
        $('#progress-load').css('display', 'block');
        setTimeout(function () {
            $('#progress-load').each(function () {
                var me = $(this);
                var perc = me.attr("aria-valuenow");

                var current_perc = 0;

                var progress = setInterval(function () {
                    if (flag || current_perc == 100) {
                        clearInterval(progress);
                        console.log('current_perc >= perc', current_perc, ' ', perc);
                        me.css('width', '100%');
                        current_perc = 100;
                        //window.location.assign("index.aspx");
                    } else {
                        current_perc += 1;
                        me.css('width', (current_perc) + '%');
                    }
                    me.text((current_perc) + '%');
                }, 100);
            });
        }, 10);
    };


    function logout() {
        $.session.clear();
        location.assign('login.aspx');
    }

    // ________________________________________________________________
    //_________________________________________________________________
    // __________________________ get negery __________________________
    //
    function getNegeri(page) {
        console.log('entered getNegeri');
        if (page.indexOf("fileManager.aspx") >= 0) {
            $('#lblLocation').html('&nbsp; Set Location');
            $('#sidebarJenis').attr('style', 'display:none;');
            $('#sidebarJenis1').attr('style', 'display:none;');
            $('#sidebarJenis2').attr('style', 'display:none;');
        } else {
            $('#lblLocation').html('&nbsp; Filter By Location');
            $('#sidebarJenis').removeAttr('style');
            $('#sidebarJenis1').removeAttr('style');
            $('#sidebarJenis2').removeAttr('style');
        }
        var location = JSON.parse($.session.get('location'));
        //phvis(false);
        //clear23();
        msginfo(true);

        $.ajax({
            type: "POST",
            url: "../../services/Session.asmx/getNegeri",
            data: "",
            async: false,
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (msg) {
                console.log('getNegeri msg: ', msg);
                // all begins here

                if (msg.d != null) {
                    $('#navbarStaticSide_DropDownListNegeri option').remove();
                    $('#navbarStaticSide_DropDownListParlimen option').remove();
                    $('#navbarStaticSide_DropDownListDun option').remove();
                    $('#navbarStaticSide_DropDownListDm option').remove();
                    $('#navbarStaticSide_DropDownListLokaliti option').remove();
                    $('#dropDownListJenis option').remove();

                    select = $('#navbarStaticSide_DropDownListNegeri').attr('onchange', "getParlimen();");
                    var option = $('<option />').attr('selected', 'selected').attr('value', '0').text('Malaysia');
                    select.append(option);
                        $.each(msg.d, function (key, val) {
                            if (location[0].length == 0) {
                                var op = $('<option />').attr('value', val._stateid).text(val._negari);
                                select.append(op);
                            } else {
                                $.each(location, function (k, v) {
                                    if (parseInt(val._stateid) == parseInt(v.state_id)) {
                                        var op = $('<option />').attr('value', val._stateid).text(val._negari);
                                        select.append(op);
                                    }
                                });
                            }
                        });
                    if (page.indexOf("index.aspx") >= 0) {
                        $('#pageTitle').append('<i class="fa fa-home"></i>&nbsp; Viewer');
                        getTags();
                    } else if (page.indexOf("fileManager.aspx") >= 0) {
                        $('#pageTitle').append('<i class="fa fa-cloud-upload"></i>&nbsp; Uploader');
                        getJenis();
                    }
                    //getJenis(); // ---------------------- CALL JENIS
                    msgdefault(true, 'Select negeri');
                } else {
                    msgwarning(true);
                }
            },
            error: function (x, y, e) {
                msgerror(true);
            }
        });
    }
    function getParlimen() {
        if (page.indexOf("index.aspx") >= 0) {
            getRepo('');
        }
        var stateid = $('#navbarStaticSide_DropDownListNegeri').val();
        var location = JSON.parse($.session.get('location'));
        //sessionIndex = $("#navbarStaticSide_DropDownListNegeri option:selected").index();
        //sessionIndex--;
        //phvis(false);
        //clear23();
        msginfo(true);

        $.ajax({
            type: "POST",
            url: "../../services/Session.asmx/getParlimen",
            data: "{'stateid':'" + stateid + "'}",
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (msg) {
                console.log('getParlimen msg: ', msg);
                // all begins here

                if (msg.d != null) {
                    $('#navbarStaticSide_DropDownListParlimen option').remove();
                    $('#navbarStaticSide_DropDownListDun option').remove();
                    $('#navbarStaticSide_DropDownListDm option').remove();
                    $('#navbarStaticSide_DropDownListLokaliti option').remove();
                    //$('#dropDownListJenis option').remove();

                    select = $('#navbarStaticSide_DropDownListParlimen').attr('onchange', "getDun();");
                    var option = $('<option />').attr('selected', 'selected').attr('value', '0').text('Select Parlimen');
                    select.append(option);
                    $.each(msg.d, function (key, val) {
                        if (location[0].length == 0) {
                            var op = $('<option />').attr('value', val._parid).text(val._parlimen);
                            select.append(op);
                        } else {
                            $.each(JSON.parse($.session.get('location')), function (k, v) {
                                if (parseInt(val._stateid) == parseInt(v.state_id) &&
                                    (parseInt(val._parid) == parseInt(v.parliament_id) || parseInt(v.parliament_id) == 0)) {
                                    var op = $('<option />').attr('value', val._parid).text(val._parlimen);
                                    select.append(op);
                                }
                            });
                        }
                    });
                    msgdefault(true, 'Select parlimen');
                } else {
                    msgwarning(true);
                }
            },
            error: function (x, y, e) {
                msgerror(true);
            }
        });
    }
    function getDun() {
        if (page.indexOf("index.aspx") >= 0) {
            getRepo('');
        }
        var stateid = $('#navbarStaticSide_DropDownListNegeri').val();
        var parid = $('#navbarStaticSide_DropDownListParlimen').val();
        console.log('entered getDun stateid, parid: ' + stateid + ', ' + parid);
        var location = JSON.parse($.session.get('location'));
        //phvis(false);
        //clear23();
        msginfo(true);

        $.ajax({
            type: "POST",
            url: "../../services/Session.asmx/getDun",
            data: "{'stateid':'" + stateid + "', 'parid':'" + parid + "'}",
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (msg) {
                console.log('getDun msg: ', msg);
                // all begins here

                if (msg.d != null) {
                    $('#navbarStaticSide_DropDownListDun option').remove();
                    $('#navbarStaticSide_DropDownListDm option').remove();
                    //$('#dropDownListJenis option').remove();

                    select = $('#navbarStaticSide_DropDownListDun').attr('onchange', "getDm();");
                    var option = $('<option />').attr('selected', 'selected').attr('value', '0').text('Select Dun');
                    select.append(option);
                      $.each(msg.d, function (key, val) {
                       if (location[0].length == 0) {
                           var op = $('<option />').attr('value', val._dunid).text(val._dun);
                           select.append(op);
                       } else {
                           $.each(JSON.parse($.session.get('location')), function (k, v) {
                               if (parseInt(val._stateid) == parseInt(v.state_id) &&
                                   (parseInt(val._parid) == parseInt(v.parliament_id) || parseInt(v.parliament_id) == 0) &&
                                   (parseInt(val._dunid) == parseInt(v.dun_id) || parseInt(v.dun_id) == 0)) {
                                   var op = $('<option />').attr('value', val._dunid).text(val._dun);
                                   select.append(op);
                               }
                           });
                       }
                   });
                    msgdefault(true, 'Select dun');
                } else {
                    msgwarning(true);
                }
            },
            error: function (x, y, e) {
                msgerror(true);
            }
        });
    }
    function getDm() {
        if (page.indexOf("index.aspx") >= 0) {
            getRepo('');
        }
        var stateid = $('#navbarStaticSide_DropDownListNegeri').val();
        var parid = $('#navbarStaticSide_DropDownListParlimen').val();
        var dunid = $('#navbarStaticSide_DropDownListDun').val();
        console.log('entered getDm stateid, parid, dunid: ' + stateid + ', ' + parid + ', ' + dunid);
        var location = JSON.parse($.session.get('location'));
        //phvis(false);
        msginfo(true);

        $.ajax({
            type: "POST",
            url: "../../services/Session.asmx/getDm",
            data: "{'stateid':'" + stateid + "', 'parid':'" + parid + "', 'dunid':'" + dunid + "'}",
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (msg) {
                console.log('getDm msg: ', msg);
                // all begins here

                if (msg.d != null) {
                    $('#navbarStaticSide_DropDownListDm option').remove();
                    //$('#dropDownListJenis option').remove();

                    select = $('#navbarStaticSide_DropDownListDm').attr('onchange', " getRepoDM()");
                    var option = $('<option />').attr('selected', 'selected').attr('value', '0').text('Select Dm');
                    select.append(option);
                    $.each(msg.d, function (key, val) {
                        if (location[0].length == 0) {
                            var op = $('<option />').attr('value', val._dmid).text(val._dm);
                            select.append(op);
                        } else {
                            $.each(JSON.parse($.session.get('location')), function (k, v) {
                                if (parseInt(val._stateid) == parseInt(v.state_id) &&
                                    (parseInt(val._parid) == parseInt(v.parliament_id) || parseInt(v.parliament_id) == 0) &&
                                    (parseInt(val._dunid) == parseInt(v.dun_id) || parseInt(v.dun_id) == 0) &&
                                    (parseInt(val._dmid) == parseInt(v.dm_id) || parseInt(v.dm_id) == 0)) {

                                    var op = $('<option />').attr('value', val._dmid).text(val._dm);
                                    select.append(op);
                                }
                            });
                        }
                    });
                    msgdefault(true, 'Select dm');
                } else {
                    msgwarning(true);
                }
            },
            error: function (x, y, e) {
                msgerror(true);
            }
        });
    }

    function getRepoDM() {
        if (page.indexOf("index.aspx") >= 0) {
            getRepo('');
        }
    }
    // ___________________________Jenis & Kat ___________________________
    function getJenis() {
        var agensiid = 0;
        console.log('entered getJenis agensiid: ' + agensiid);
        //phvis(false);
        msginfo(true);

        $.ajax({
            type: "POST",
            url: "../../services/Session.asmx/getJenis",
            data: "{'agensiid':'" + agensiid + "'}",
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (msg) {
                console.log('getJenis msg: ', msg);
                // all begins here

                if (msg.d != null) {
                    $('#dropDownListJenis option').remove();

                    select = $('#dropDownListJenis').attr('onchange', "getKategori()");
                    var option = $('<option />').attr('selected', 'selected').attr('value', '0').text('Select Jenis Report');
                    select.append(option);
                    $.each(msg.d, function (key, val) {
                        var op = $('<option />').attr('id', 'kat' + val._JENIS_ID).attr('value', val._JENIS_ID).text(val._JENIS_DESC);
                        select.append(op);
                    });
                    getTagsFiles();
                    msgdefault(true, 'Select Jenis');
                } else {
                    msgwarning(true);
                }
            },
            error: function (x, y, e) {
                msgerror(true);
            }
        });
    }

    function getKategori() {
        $("#divStatus").attr('style', 'display:none;');

        var jenis_id = document.getElementById("dropDownListJenis").selectedIndex;
        var jenis_desc = document.getElementById("dropDownListJenis").options[jenis_id].text;

        console.log('entered getKategori jenis_id: ' + jenis_id, ' ', jenis_desc);
        //phvis(false);
        msginfo(true);

        $.ajax({
            type: "POST",
            url: "../../services/Session.asmx/getKategori",
            data: "{'jenis_id':'" + jenis_id + "'}",
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (msg) {
                console.log('getKategori msg: ', msg);
                // all begins here

                if (msg.d != null) {
                    $('#dropDownListKategori optgroup').remove();
                    $('#dropDownListKategori option').remove();
                    var listHeight = 30;
                    select = $('#dropDownListKategori').attr('onchange', "");
                    var optgroup = $('<optgroup />').attr('label', jenis_desc);
                    //var option = $('<option />').attr('selected', 'selected').attr('value', '0').text('Select Kategori');
                    select.append(optgroup);
                    $.each(msg.d, function (key, val) {
                        var op = $('<option />').attr('value', val._KATEGORI_ID).text(val._KATEGORI);
                        optgroup.append(op);
                        listHeight += 20;
                    });
                    msgdefault(true, 'Select Kategori');
                    if (listHeight <= 220)
                        $('#dropDownListKategori').attr('style', 'height: ' + listHeight + 'px');
                    else
                        $('#dropDownListKategori').attr('style', 'height: 200px');
                } else {
                    msgwarning(true);
                }
            },
            error: function (x, y, e) {
                msgerror(true);
            }
        });
    }

    function getJenisView() {
        var agensiid = 0;
        console.log('entered getJenisView agensiid: ' + agensiid);
        //phvis(false);
        msginfo(true);

        $.ajax({
            type: "POST",
            url: "../../services/Session.asmx/getJenis",
            data: "{'agensiid':'" + agensiid + "'}",
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (msg) {
                console.log('getJenisView msg: ', msg);
                // all begins here

                if (msg.d != null) {
                    $('#navbarStaticSide_DropDownListJenis option').remove();

                    select = $('#navbarStaticSide_DropDownListJenis').attr('onchange', "getKategoriView()");
                    var option = $('<option />').attr('selected', 'selected').attr('value', '0').text('Select Jenis Report');
                    select.append(option);
                    $.each(msg.d, function (key, val) {
                        var op = $('<option />').attr('id', 'kat' + val._JENIS_ID).attr('value', val._JENIS_ID).text(val._JENIS_DESC);
                        select.append(op);
                    });
                    //getTagsFiles();
                    msgdefault(false, 'Select Jenis');
                } else {
                    msgwarning(true);
                }
            },
            error: function (x, y, e) {
                msgerror(true);
            }
        });
    }

    function getKategoriView() {
        //$("#divStatus").attr('style', 'display:none;');
        getRepo('');////////////////////////////////////////////////////////

        var jenis_id = document.getElementById("navbarStaticSide_DropDownListJenis").selectedIndex;
        var jenis_desc = document.getElementById("navbarStaticSide_DropDownListJenis").options[jenis_id].text;

        console.log('entered getKategori jenis_id: ' + jenis_id, ' ', jenis_desc);
        //phvis(false);
        msginfo(true);

        $.ajax({
            type: "POST",
            url: "../../services/Session.asmx/getKategori",
            data: "{'jenis_id':'" + jenis_id + "'}",
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (msg) {
                console.log('getKategori msg: ', msg);
                // all begins here

                if (msg.d != null) {
                    $('#navbarStaticSide_DropDownListKategory option').remove();
                    select = $('#navbarStaticSide_DropDownListKategory').attr('onchange', "getRepo('')");
                    var option = $('<option />').attr('selected', 'selected').attr('value', '0').text('Select Kategori');
                    select.append(option);
                    $.each(msg.d, function (key, val) {
                        var op = $('<option />').attr('value', val._KATEGORI_ID).text(val._KATEGORI);
                        select.append(op);
                    });
                    msgdefault(true, 'Select Kategori');
                    
                } else {
                    msgwarning(true);
                }
            },
            error: function (x, y, e) {
                msgerror(true);
            }
        });
    }

    // __________________________ get Hash Tags __________________________
    //
    function getTags() {

        var tableBody = $('#tagTableBody');
        msginfo(true);
        var COLUMN_NUMBER = 4;
        var agensi = $.session.get('agensiTitle');

        $.ajax({
            type: "POST",
            url: "../../services/Session.asmx/getTags",
            data: "{'agensi':'" + agensi + "'}",
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (msg) {
                console.log('getTags msg: ', msg);

                if (msg.d != null) {
                    tableBody.empty();
                    var index = 1;
                    var tr = $('<tr />');
                    tableBody.append(tr);

                    $.each(msg.d, function (key, val) {

                        tr.append($('<td />').append($('<a />').attr('href', '#').attr('onclick', 'getRepo("' + val._hash_tag + '");').text(val._hash_tag)));
                        index++;

                        if (index > COLUMN_NUMBER) {
                            index = 1;
                            tr = $('<tr />');
                            tableBody.append(tr);
                        }
                    });

                    if (--index < COLUMN_NUMBER) {
                        for (var x = index; x < COLUMN_NUMBER; x++) {
                            tableBody.children('tr:last').append('<td />');
                        }
                    }
                    $('#dataTable').DataTable({
                        "language": {
                            "lengthMenu": '<select class="form-control input-sm">' +
                                     '<option value="5">5</option>' +
                                     '<option value="10">10</option>' +
                                     '<option value="25">25</option>' +
                                     '<option value="-1">All</option>' +
                                     '</select> Records per page'
                        }
                    });
                    //Metis.MetisTable();
                    getRepo(''); // get repo without any hashtag
                    getJenisView(); // Load Jenis Filter
                    //msgdefault(true, '');
                } else {
                    msgwarning(true);
                }
            },
            error: function (x, y, e) {
                msgerror(true);
            }
        });

    }

    function getTagsFiles() {

        var tableBody = $('#tagTableBody');
        msginfo(true);
        var COLUMN_NUMBER = 4;
        var agensi = $.session.get('agensiTitle');

        $.ajax({
            type: "POST",
            url: "../../services/Session.asmx/getTags",
            data: "{'agensi':'" + agensi + "'}",
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (msg) {
                console.log('getTags msg: ', msg);

                if (msg.d != null) {
                    tableBody.empty();
                    var index = 1;
                    var tr = $('<tr />');
                    tableBody.append(tr);

                    $.each(msg.d, function (key, val) {

                        //tr.append($('<td />').append($('<a />').attr('href', '#').attr('id', 'column' + val._HashId).text(val._Hash)));
                        tr.append($('<td />').append($('<div />').addClass('radio').html(
                        $('<input />').addClass('primary').attr('type', 'radio').attr('id', 'ch' + val._hash_tag).attr('name', 'optionsRadios')).append(
                        $('<label />').attr('for', 'ch' + val._hash_tag).html('Default').text(val._hash_tag))));
                        index++;

                        if (index > COLUMN_NUMBER) {
                            index = 1;
                            tr = $('<tr />');
                            tableBody.append(tr);
                        }
                    });

                    if (--index < COLUMN_NUMBER) {
                        for (var x = index; x < COLUMN_NUMBER; x++) {
                            tableBody.children('tr:last').append('<td />');
                        }
                    }
                    $('#dataTable').DataTable({ "iDisplayLength": 10 });
                    //Metis.MetisTable();
                    msgdefault(true, '');
                } else {
                    msgwarning(true);
                }
            },
            error: function (x, y, e) {
                msgerror(true);
            }
        });

    }

    //__________________________  get repository table ___________________
    //
    function getRepo(hashtag) {

        var table = $('#dataTable1').DataTable();
        table.destroy();

        var tableBody = $('#tableRepository');

        var dataRow = JSON.stringify({
            negeri: $('#navbarStaticSide_DropDownListNegeri').val(),
            parliaments: $('#navbarStaticSide_DropDownListParlimen').val(),
            dun: $('#navbarStaticSide_DropDownListDun').val(),
            dm: $('#navbarStaticSide_DropDownListDm').val(),
            hashtag: hashtag,
            jen: $('#navbarStaticSide_DropDownListJenis').val(),
            kat: $('#navbarStaticSide_DropDownListKategory').val(),
            agensi: $.session.get('agensiTitle'),
            table: "kempen.repository"
        });

        var json = JSON.parse(dataRow);

        console.log('entered getRepo Data: ' + dataRow);
        //phvis(false);
        msginfo(true);

        $.ajax({
            type: "POST",
            url: "http://docs.repositori.1touch.my/RepoService.svc/getRepo",
            data: dataRow,
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (msg) {
                console.log('getRepo msg: ', msg);
                // all begins here

                if (msg.getRepoResult != null) {
                    tableBody.empty();
                    var index = 1;
                    var tr = $('<tr />');
                    var url = 'http://docs.repositori.1touch.my/UploadedFiles/Kempen/';
                    var urlDoc = 'https://view.officeapps.live.com/op/view.aspx?src=http://docs.repositori.1touch.my/UploadedFiles/Kempen/';

                    $.each(msg.getRepoResult, function (key, val) {
                        var fileText = val.file_desc != '' ? val.file_desc : val.filename;

                        var directory = val.directory;
                        tableBody.append($('<tr />').append($('<td />').text(val.state)).append($('<td />').text(val.PARLIMEN)).append($('<td />').text(val.DUN)).append($('<td />').text(val.DM)).append($('<td />').text(val.jenis_report)).append($('<td />').text(val.category)).append($('<td />').append($('<a />').attr('id', 'browse' + key).attr('href', 'viewer/web/viewer.html?file=' + url + directory + '/' + val.filename).attr('target', '_blank').attr('dir', directory).attr('fname', val.filename).attr('tag', 'pic').text(fileText))).append($('<td />').text(val.trkh_masuk)).append($('<td />').append($('<a />').attr('href', '#').attr('data-toggle', 'modal').attr('data-placement', 'bottom').attr('data-target', '#helpModal').attr('tag', 'keterangan').attr('keterangan', val.keterangan).text('Show'))));


                        if (val.filename.toLowerCase().indexOf(".jpg") >= 0 || val.filename.toLowerCase().indexOf(".jpeg") >= 0 || val.filename.toLowerCase().indexOf(".png") >= 0) {
                            $('#browse' + key).attr('data-toggle', 'modal').attr('data-placement', 'bottom').attr('data-target', '#helpModal').attr('href', '#').removeAttr('target');
                        }
                        if (val.filename.toLowerCase().indexOf(".mp3") >= 0 || val.filename.toLowerCase().indexOf(".mp4") >= 0 || val.filename.toLowerCase().indexOf(".avi") >= 0 || val.filename.toLowerCase().indexOf(".mpeg") >= 0 || val.filename.toLowerCase().indexOf(".flv") >= 0 || val.filename.toLowerCase().indexOf(".divx") >= 0 || val.filename.toLowerCase().indexOf(".mkv") >= 0) {
                            $('#browse' + key).attr('data-toggle', 'modal').attr('data-placement', 'bottom').attr('data-target', '#helpModal').attr('href', '#').attr('url', url + directory + "/" + val.filename).removeAttr('target').attr('tag', 'media');
                        }
                        if (val.filename.toLowerCase().indexOf(".pptx") >= 0 || val.filename.toLowerCase().indexOf(".ppt") >= 0 || val.filename.toLowerCase().indexOf(".docx") >= 0 || val.filename.toLowerCase().indexOf(".doc") >= 0 || val.filename.toLowerCase().indexOf(".xls") >= 0 || val.filename.toLowerCase().indexOf(".xlsx") >= 0) {
                            $('#browse' + key).attr('href', urlDoc + directory + "/" + val.filename);
                        }
                    });
                    $('#dataTable1').DataTable({
                        "iDisplayLength": 10
                    });
                    msgdefault(true, '');
                    //Metis.MetisTable();
                } else {
                    msgwarning(true);
                }
            },
            error: function (x, y, e) {
                msgerror(true);
            }
        });
    }


    $('body').on('click', '#dataTable1>tbody>tr>td>a', function () {
        var role = JSON.parse($.session.get('role'));
        var url = 'http://docs.repositori.1touch.my/UploadedFiles/Kempen/';

        if ($(this).attr('tag').toLowerCase().indexOf('pic') >= 0) {
            console.log('Image >>>>>>>>>>>>>');
            $('#divImgViewer').empty('<div />');
            $('#divImgViewer').html($('<img />').attr('src', url + $(this).attr('dir') + $(this).attr('fname')).attr('id', 'imgTag'));
            if (role.role_id == 1)
                $('div .modal-footer').html($('<a />').attr('href', url + $(this).attr('dir') + $(this).attr('fname')).attr('target', '_blank').text('Download'));
        } else if ($(this).attr('tag').toLowerCase().indexOf('media') >= 0) {
            console.log('Video >>>>>>>>>>>>>');
            $('#divImgViewer').empty('<img />');
            $('#divImgViewer').html($('<div />').attr('id', 'playerVXkjGWJGhcxF'));
            if (role.role_id == 1)
                $('div .modal-footer').html($('<a />').attr('href', $(this).attr('url')).attr('target','_blank').text('Download'));
            setVideo($(this).attr('url'));
        } else if ($(this).attr('tag').toLowerCase().indexOf('keterangan') >= 0) {
            console.log('keterangan');
            $('#divImgViewer').empty('<img />');
            $('#divImgViewer').empty('<div />');
            $('div .modal-footer').empty('<a />');
            $('#divImgViewer').html($('<p />').attr('style', 'color: #000;').text($(this).attr('keterangan')));
        }
    });

    function setVideo(file) {
        jwplayer('playerVXkjGWJGhcxF').setup({
            file: file,
            image: file, //'//www.longtailvideo.com/content/images/jw-player/lWMJeVvV-876.jpg',
            width: '100%',
            aspectratio: '16:9'
        });
    }
    //.attr('href', 'viewer/web/viewer.html?file=' + 'http://localhost:5705/UploadedFiles/' + val._directory + '/' + val._filename).attr('target', '_blank')
    function filterTags() {
        if ($('#tagFilter').val().length > 1) {
            var searchString;
            $('div.select-tags>div.body>div.col-lg-3>div.radio>label').each(function () {
                searchString = $(this).text();
                //console.log($(this).text());
                if (searchString.toLowerCase().indexOf($('#tagFilter').val()) >= 0) {
                    console.log($('#tagFilter').val());
                    $(this).css("background-color", "yellow");
                }
                //else {
                //    $(this).css("display", "none");
                //}
            });
        } else {
            $('div.select-tags>div.body>div.col-lg-3>div.radio>label').each(function () {
                $(this).removeAttr('style');
            });
        }
    }
