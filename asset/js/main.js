var _LOG = true;

function neg(){
	if(_LOG)
		console.log('entered neg');

	$.ajax({
		url: "negeri",
		type: "post",
		data:{},
		success: function(d){
			if(_LOG)
				console.log('entered neg msg: ', d);
			if(d != null){
				$('#navbarStaticSide_DropDownListNegeri').html($('<option />').attr('value','0').html('Please select Negeri'));
				$('#navbarStaticSide_DropDownListNegeri').append(d);
			}
		}
	});
}

function negeri(stateid){
	if(_LOG)
		console.log('entered negeri');
	$('#navbarStaticSide_DropDownListParlimen').empty();
	$('#navbarStaticSide_DropDownListDun').empty();
	$('#navbarStaticSide_DropDownListDm').empty();
	$('#navbarStaticSide_DropDownListLokaliti').empty();
	clearTable();
	$('#divph').empty();
	$('#tablebody').empty();
	$.ajax({
		url: "parlimen",
		type: "post",
		data:{stateid: stateid},
		success: function(d){
			if(_LOG)
				console.log('entered negeri msg: ', d);
			if(d != null){
				$('#navbarStaticSide_DropDownListParlimen').html($('<option />').attr('value','0').html('Please select Parlimen'));
				$('#navbarStaticSide_DropDownListParlimen').append(d);
			}
		}
	});
}

function parlimen(parid){
	if(_LOG)
		console.log('entered parlimen');
	
	$('#navbarStaticSide_DropDownListDun').empty();
	$('#navbarStaticSide_DropDownListDm').empty();
	$('#navbarStaticSide_DropDownListLokaliti').empty();
	clearTable();
	$('#divph').empty();
	$('#tablebody').empty();
	var stateid = $('#navbarStaticSide_DropDownListNegeri option:selected').val();
	$.ajax({
		url: "dun",
		type: "post",
		data:{stateid: stateid, parid: parid},
		success: function(d){
			if(_LOG)
				console.log('entered parlimen msg: ', d);
			if(d != null){
				$('#navbarStaticSide_DropDownListDun').html($('<option />').attr('value','0').html('Please select Dun'));
				$('#navbarStaticSide_DropDownListDun').append(d);
			}
		}
	});
}

function dun(dunid){
	if(_LOG)
		console.log('entered dun');
	
	$('#navbarStaticSide_DropDownListDm').empty();
	$('#navbarStaticSide_DropDownListLokaliti').empty();
	clearTable();
	$('#divph').empty();
	$('#tablebody').empty();
	var stateid = $('#navbarStaticSide_DropDownListNegeri   option:selected').val();
	var parid =   $('#navbarStaticSide_DropDownListParlimen option:selected').val();
	var dunid =   $('#navbarStaticSide_DropDownListDun 		option:selected').val();
	$.ajax({
		url: "dm",
		type: "post",
		data:{stateid: stateid, parid: parid, dunid: dunid},
		success: function(d){
			if(_LOG)
				console.log('entered dun msg: ', d);
			if(d != null){
				$('#navbarStaticSide_DropDownListDm').html($('<option />').attr('value','0').html('Please select Dm'));
				$('#navbarStaticSide_DropDownListDm').append(d);
			}
		}
	});
}

function dm(dmid){
	if(_LOG)
		console.log('entered dm');
	clearTable();
	$('#tablebody').empty();
	$('#navbarStaticSide_DropDownListLokaliti').empty();
	$('#divph').empty();
	var stateid = $('#navbarStaticSide_DropDownListNegeri       option:selected').val();
	var parid =   $('#navbarStaticSide_DropDownListParlimen     option:selected').val();
	var dunid =   $('#navbarStaticSide_DropDownListDun 		    option:selected').val();
	var dmid =    $('#navbarStaticSide_DropDownListDm 		    option:selected').val();
	$.ajax({
		url: "lokaliti",
		type: "post",
		data:{stateid: stateid, parid: parid, dunid: dunid, dmid: dmid},
		success: function(d){
			if(_LOG)
				console.log('entered dm msg: ', d);

			if(d != null){
				$('#navbarStaticSide_DropDownListLokaliti').html($('<option />').attr('value','0').html('Please select Lokaliti'));
				$('#navbarStaticSide_DropDownListLokaliti').append(d);
			             }
			}

		});
}

function lokaliti(lokid){
	if(_LOG)
		console.log('entered lokaliti');
	clearTable();
	$('#divph').empty();
	$('#tablebody').empty();
	var stateid = $('#navbarStaticSide_DropDownListNegeri   option:selected').val();
	var parid = $('#navbarStaticSide_DropDownListParlimen   option:selected').val();
	var dunid = $('#navbarStaticSide_DropDownListDun 		option:selected').val();
	var dmid = $('#navbarStaticSide_DropDownListDm 		    option:selected').val();
	$.ajax({
		url: "../bangsa/getbangsa",
		type: "post",
		data:{stateid: stateid, parid: parid, dunid: dunid, dmid: dmid, lokid: lokid},
		success: function(d){
			if(_LOG)
				console.log('entered lokaliti msg: ', d);

			if(d != null){
				$('#divph').html($('<ul />').addClass("nav nav-pills nav-stacked").attr('id','ul-bangsa'));
				$('#divph>ul').html(d);
			}
		}
	});
}

function show_voters(bangsaid){
	if(_LOG)
		console.log('entered show_voters');
    var table = $('#dataTable').DataTable();
	var agensiid = $.session.get('aganciid');
	var stateid =  $('#navbarStaticSide_DropDownListNegeri      option:selected').val();
	var parid =    $('#navbarStaticSide_DropDownListParlimen    option:selected').val();
	var dunid =    $('#navbarStaticSide_DropDownListDun 		option:selected').val();
	var dmid =     $('#navbarStaticSide_DropDownListDm 		    option:selected').val();
	var lokid =    $('#navbarStaticSide_DropDownListLokaliti    option:selected').val();
	var tableBody = $('#tablebody');
	$('#tablebody').empty();
	$.ajax({
		url: "../Sikap_status_controller/getsikap_status_controller",
		type: "post",
		data:{bangsaid:bangsaid, agensiid:agensiid, stateid: stateid, parid: parid, dunid: dunid, dmid: dmid, lokid: lokid},
		success: function(d){
			var r = $.parseJSON(d);
			if(_LOG)
				console.log('entered show_voters msg: ', r);

			if(r != null){
				table.destroy();
				tableBody.empty();
				$.each(r, function( key, val ) {
                    tableBody.append($('<tr />')
                    		 .append($('<td />').text(key+1))
                    		 .append($('<td />').addClass('classic').text(val.IC))
                    		 .append($('<td />').text(val.Nama))
                    		 .append($('<td />').text(val.Jantina))
                    		 .append($('<td />').text(val.age))
                    		 .append($('<td />').text(val.telno))
                    		 .append($('<td class="text-left" />').text(val.alamat))
                    		 .append("<td><a class='btn-circle ppldetails' data-toggle='modal' data-target='#myModal' width='50px'><i class='glyphicon glyphicon-edit'></i></a></td>"));
                    		 
				});
				
				$('#dataTable').dataTable();
			}
		}
	});
}

$('body').on('click', '.ppldetails', function () {
	if(_LOG)
		console.log('entered get_ppldetails click');
	var ic = $(this).parent().parent().children('td.classic').text();
	var pplid = '';
	$.ajax({
        type: "POST",
        url: "../Getppldetails_controller/getppldetails",
        data: {ic:ic},
        success: function (d) {
			var msg = $.parseJSON(d)[0];
        	if(_LOG)
        		console.log('getinfo msg', msg);
            // all begins here
            if (msg != null) {
                if (msg.tel_rumah != null) {
                    var txtHPhone = $('#txtHPhone').val(msg.tel_rumah);
                }
                if (msg.tel_bimbit != null) {
                    var txtPhone = $('#txtPhone').val(msg.tel_bimbit);
                }
                if (msg.alamat1 != null) {
                    var txtAlamat1 = $('#txtAlamat1').val(msg.alamat1);
                }
                if (msg.alamat2 != null) {
                    var txtAlamat2 = $('#txtAlamat2').val(msg.alamat2);
                }
                if (msg.alamat3 != null) {
                    var txtAlamat3 = $('#txtAlamat3').val(msg.alamat3);
                }
                if (msg.bandar != null) {
                    var txtBandar = $('#txtBandar').val(msg.bandar);
                }
                if (msg.poskod != null) {
                    var txtPostkod = $('#txtPostkod').val(msg.poskod);
                }

                if (msg.negeri != null) {
                    var DropDownList1 = $('#DropDownList1').val(msg.negeri);
                }
                if (msg.ketokohanid != null) {
                    var DropDownListKetokohan = $('#DropDownListKetokohan').val(msg.ketokohanid);
                }
                if (msg.pekerjaanid != null) {
                    var DropDownListPekerjaan = $('#DropDownListPekerjaan').val(msg.pekerjaanid);
                }
                if (msg.pendapatanid != null) {
                    var DropDownListPendapatan = $('#DropDownListPendapatan').val(msg.pendapatanid);
                }
                if (msg.kecacatanid != null) {
                    var DropDownListKecacatan = $('#DropDownListKecacatan').val(msg.kecacatanid);
                }
            
                if (msg.oku != null) {
                	if(_LOG)
                		console.log('is OKU? ', msg.oku);
                    if (msg.oku != 1) {
                        $('input[id=chkBoxOKU]').attr('checked', true);
                    } else {
                        $('input[id=chkBoxOKU]').attr('checked', false);
                    }
                }
                if(msg.pplid != null){
                	pplid = msg.pplid;
                }
            }
            if(ic != null)
                $('#ButtonSave').attr('value', ic);
            if(pplid != null)
                $('#ButtonClose').attr('value', pplid);
        }
    });
});


function setinfo() {
    var ic = $('#ButtonSave').attr('value');
    var pplid = $('#ButtonClose').attr('value');

    sikap = $('#DropDownListSikap').val();
    status = $('#DropDownListStatus').val();
    if (sikap && status) {
        console.log('entered setinfo> sikap, status', sikap + ", ", status);
        if (status == 2 || status == 3)
            sikap = 0;
        updateSS(pplid, ic, sikap, status);
    }

    var tel_rumah;
    var tel_bimbit;
    var alamat1;
    var alamat2;
    var alamat3;
    var poskod;
    var bandar;
    var negeri;
    var ketokohanid;
    var pekerjaanid;
    var pendapatanid;
    var kecacatanid;
    var sikap;
    var status;
    var oku;


    tel_rumah =  $('#txtHPhone').val();
    tel_bimbit = $('#txtPhone').val();
    alamat1 =    $('#txtAlamat1').val();
    alamat2 =    $('#txtAlamat2').val();
    alamat3 =    $('#txtAlamat3').val();
    bandar =     $('#txtBandar').val();
    poskod =     $('#txtPostkod').val();

    negeri = 	   $('#DropDownList1').val();
    ketokohanid =  $('#DropDownListKetokohan').val();
    pekerjaanid =  $('#DropDownListPekerjaan').val();
    pendapatanid = $('#DropDownListPendapatan').val();
    kecacatanid =  $('#DropDownListKecacatan').val();

    console.log('chk: ',$('#chkBoxOKU').is(':checked'));
    if ($('#chkBoxOKU').is(':checked')) {
        oku = "1";
    }
    else {
        oku = "0";
    }

    console.log('entered setinfo', ic,
                                    tel_rumah,
                                    tel_bimbit,
                                    alamat1,
                                    alamat2,
                                    alamat3,
                                    poskod,
                                    bandar,
                                    negeri,
                                    ketokohanid,
                                    pekerjaanid,
                                    pendapatanid,
                                    kecacatanid,
                                    oku);

    $.ajax({
        type: "POST",
        url: "../Setppldetails_controller/setppldetails",
        data: "{'ic':'"+ic+"', 'tel_rumah':'"+tel_rumah+"', 'tel_bimbit':'"+tel_bimbit+"', 'alamat1':'"+alamat1+
                "', 'alamat2':'" + alamat2 + "', 'alamat3':'" + alamat3 + "', 'poskod':'" + poskod + "', 'bandar':'" + bandar +
                "', 'negeri':'" + negeri + "', 'ketokohanid':'" + ketokohanid + "', 'pekerjaanid':'" + pekerjaanid +
                "', 'pendapatanid':'" + pendapatanid + "', 'kecacatanid':'" + kecacatanid + "', 'oku':'" + oku + "'}",
        success: function (msg) {
            console.log('setinfo msg', msg);
            // all begins here
        }
    });
}

function resetModal(){
	
	console.log('resetting...');

    $('#txtHPhone'). val('');
    $('#txtPhone').  val('');
    $('#txtAlamat1').val('');
    $('#txtAlamat2').val('');
    $('#txtAlamat3').val('');
    $('#txtBandar'). val('');
    $('#txtPostkod').val('');
    $('#DropDownList1').val('0');
    $('#DropDownListKetokohan').val('0');
    $('#DropDownListPekerjaan').val('0');
    $('#DropDownListPendapatan').val('0');
    $('#DropDownListKecacatan').val('0');
    $('#DropDownListSikap').val('0');
    $('#DropDownListStatus').val('0');

    $('#chkBoxOKU').attr('checked','false');
}

function printDiv() {
	var divElements = document.getElementById("akbar").innerHTML;
	var oldPage = document.body.innerHTML;
	document.body.innerHTML =
	"<html><head><title></title></head><body>" +
	divElements + "</body>";
	window.print();
	document.body.innerHTML = oldPage;
}

$( document ).ready(function() {
	neg();
});

function clearTable(){
	
	$("#dataTable_wrapper").remove();
	$('#akbar').empty().append('<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped"><thead><tr>'
			     + '<th class="text-center">NO.</th>'
			     + '<th class="text-center">IC</th>'
			     + '<th class="text-center">Name</th>'
			     + '<th class="text-center">Gender</th>'
			     + '<th class="text-center">Age</th>'
			     + '<th class="text-center">Telephone</th>'
			     + '<th class="text-center">Address</th>'
			     + '<th class="text-center btn-circle ppldetails glyphicon glyphicon-print" onclick="printDiv()" style="cursor: pointer;"></th>'
	+ ' </tr><tbody id="tablebody"></tbody></table>');
}
