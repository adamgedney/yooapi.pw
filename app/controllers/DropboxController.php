<?php
header('Access-Control-Allow-Origin: *');

class DropboxController extends BaseController {






	public function dbTest(){

		require_once "dropbox-sdk/Dropbox/autoload.php";

		$appInfo = dbx\AppInfo::loadFromJsonFile("config.json");

		$obj = array(
			'appInfo'	=>$appInfo,
			'string'	=>'test string');

		header('Access-Control-Allow-Origin: *');
		return Response::json($obj);

	}









}