<?php
header('Access-Control-Allow-Origin: *');

class DropboxController extends BaseController {






	public function dbTest(){

		// $acctInfo = Dropbox::getAccountInfo();

		use \Dropbox as dbx;

		$appInfo = dbx\AppInfo::loadFromJsonFile("/config/packages/naturalweb/nwlaravel-dropbox/config/dropbox.json");
		$webAuth = new dbx\WebAuthNoRedirect($appInfo, "PHP-Example/1.0");

		$authorizeUrl = $webAuth->start();


		$obj = array(
			'appInfo'	=>$authorizeUrl,
			'string'	=>'test string');

		header('Access-Control-Allow-Origin: *');
		return Response::json($obj);

	}









}