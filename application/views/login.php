<html>

<head>
	<title>PBB ADMIN</title>
</head>
<body>
    <script src="<?php echo base_url("asset/js/jquery-1.11.0.js"); ?>"></script>
    <script src="http://sso2.aga.my/services/javascript/1.0"></script>
<script>
function start()	{



//console.log(M);
//console.log(M.current);
var userId = M.user.USER_ID;
var username = M.user.USERNAME;	
var agensiId = M.user.AGENSI.AGENSI_ID;
var agensi = M.user.AGENSI.AGENSI_NAME;
var authKey = M.current.authkey;
var stateId = M.user.STATE_ID;
var parId = M.user.PAR_ID;
var dunId = M.user.DUN_ID;
var pdmId = M.user.DM_ID;
var role = M.user.ROLES.ROLES_ID;
var last_login = M.user.USER_LAST_LOGIN;

//var userId = 6;
//var username = "naeltestw";	
//var agensiId = 1;
//var agensi = "aga";
//var authKey = "12qwdqw";
//var stateId = 0;
//var parId = 0;
//var dunId = 0;
//var pdmId = 0;
//var role = 1;


$.ajax({
	url: "<?php echo base_url("login/savesession"); ?>",
	type: "POST",
        data: {userid : userId, username : username, agensiid : agensiId, agensi : agensi, auth_key : authKey, stateid : stateId, parid : parId, dunid : dunId, pdmid : pdmId, role : role, last_login : last_login },
	success: function(){
		document.location = "<?php echo base_url("home/dashboard"); ?>";
	}
});
}


</script>

    
	
   
    <!--<script src="http://lib.aga.my/aga/sso.js"></script>-->
    <!-- Page-Level Plugin Scripts - Blank -->
    
	
   


</body>
</html>
