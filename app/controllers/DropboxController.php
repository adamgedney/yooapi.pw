<?php
header('Access-Control-Allow-Origin: *');

class DropboxController extends BaseController {






	public function dbTest(){

		require_once "dropbox-sdk/Dropbox/autoload.php";

		$appInfo = dbx\AppInfo::loadFromJsonFile("app-info.json");



		header('Access-Control-Allow-Origin: *');
		return Response::json($appInfo);

	}









}