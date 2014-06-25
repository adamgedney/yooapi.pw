<?php
header('Access-Control-Allow-Origin: *');

class DropboxController extends BaseController {






	public function dbTest(){

		// $acctInfo = Dropbox::getAccountInfo();
		$authorizeUrl = $webAuth->start();

		$obj = array(
			'appInfo'	=>$authorizeUrl,
			'string'	=>'test string');

		header('Access-Control-Allow-Origin: *');
		return Response::json($obj);

	}









}