<?php
header('Access-Control-Allow-Origin: *');

class DropboxController extends BaseController {






	public function dbTest(){

		$appInfo = dbx\AppInfo::loadFromJsonFile("config.json");



		header('Access-Control-Allow-Origin: *');
		return Response::json($appInfo);

	}









}