<?php

// url: https://www.forumsys.com/2022/05/10/online-ldap-test-server/


if(isset($_POST["send"])) {

    	
	$ldap_dn = "cn=".$_POST["username"].",dc=example,dc=com";

	$ldap_password = $_POST["password"];
	
	$ldap_con = ldap_connect("ldap.forumsys.com");
	
	ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);
	
	if(ldap_bind($ldap_con, $ldap_dn, $ldap_password)) {

	  echo "Bind successful!";
	  
	} else {
		echo "Invalid user/pass or other errors!";
	}
	

}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="./test.php">
            <input type="text" name="username" placeholder="username">

            <br>

            <input type="password" name="password" placeholder="password">


            <br>

            <input type="submit" name="send">
    </form>
</body>
</html>