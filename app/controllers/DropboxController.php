<?php
header('Access-Control-Allow-Origin: *');

class DropboxController extends BaseController {






	public function dbTest(){

		$acctInfo = Dropbox::getAccountInfo();

		$obj = array(
			'appInfo'	=>$acctInfo,
			'string'	=>'test string');

		header('Access-Control-Allow-Origin: *');
		return Response::json($obj);

	}









}