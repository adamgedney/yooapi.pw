<?php

class LogController extends BaseController {



	public function logSongPlay($userId, $songId){
		date_default_timezone_set('UTC');
		$time = date(DATE_RFC2822);

		SongsLog::insert(array(
			'user_id'=>$userId,
			'song_id'=>$songId,
			'played_at'=>$time
			));


		header('Access-Control-Allow-Origin: *');
		return Response::json("Logged song play");
	}




	public function logSharedSong($userId, $songId){
		date_default_timezone_set('UTC');
		$time = date(DATE_RFC2822);

		SongsLog::insert(array(
			'user_id'=>$userId,
			'song_id'=>$songId,
			'shared_at'=>$time
			));

		header('Access-Control-Allow-Origin: *');
		return Response::json("Logged song shared");
	}






	public function logSharedPlaylist($userId, $playlistId){
		date_default_timezone_set('UTC');
		$time = date(DATE_RFC2822);

		PlaylistsLog::insert(array(
			'user_id'=>$userId,
			'playlist_id'=>$playlistId,
			'shared_at'=>$time
			));

		header('Access-Control-Allow-Origin: *');
		return Response::json("Logged playlist shared");
	}




	public function logPlaylistPlay($userId, $playlistId){
		date_default_timezone_set('UTC');
		$time = date(DATE_RFC2822);

		PlaylistsLog::insert(array(
			'user_id'=>$userId,
			'playlist_id'=>$playlistId,
			'played_at'=>$time
			));

		header('Access-Control-Allow-Origin: *');
		return Response::json("Logged playlist play");
	}





	//Used by PlaylsitsController========================//
	public static function logPlaylistRetrieved($userId, $sharedPlaylistId){
		date_default_timezone_set('UTC');
		$time = date(DATE_RFC2822);

		PlaylistsLog::insert(array(
			'user_id'=>$userId,
			'playlist_id'=>$sharedPlaylistId,
			'retrieved_at'=>$time
			));

		header('Access-Control-Allow-Origin: *');
		return Response::json("Logged playlist retrieved");
	}





	//Used by UserController========================//
	public static function logLogin($userId){
		date_default_timezone_set('UTC');
		$time = date(DATE_RFC2822);

		UserLog::insert(array(
			'user_id'=>$userId,
			'logged_in'=>$time
			));

		header('Access-Control-Allow-Origin: *');
		return Response::json("Logged login");
	}





	//Used by UserController========================//
	public static function logFailedLogin($email){
		date_default_timezone_set('UTC');
		$time = date(DATE_RFC2822);

		UserLog::insert(array(
			'email'=>$email,
			'failed_login'=>$time
			));

		header('Access-Control-Allow-Origin: *');
		return Response::json("Logged failed Login");
	}





	//Used by UserController========================//
	public static function logForgotPassword($userId){
		date_default_timezone_set('UTC');
		$time = date(DATE_RFC2822);

		UserLog::insert(array(
			'user_id'=>$userId,
			'forgot_password'=>$time
			));

		header('Access-Control-Allow-Origin: *');
		return Response::json("Logged forgot password");
	}






	public function logLogout($userId){
		date_default_timezone_set('UTC');
		$time = date(DATE_RFC2822);

		UserLog::insert(array(
			'user_id'=>$userId,
			'logged_out'=>$time
			));

		header('Access-Control-Allow-Origin: *');
		return Response::json("Logged logout");
	}






	public function logLoginFromSignup($userId){
		date_default_timezone_set('UTC');
		$time = date(DATE_RFC2822);

		UserLog::insert(array(
			'user_id'=>$userId,
			'login_from_signup'=>$time
			));

		header('Access-Control-Allow-Origin: *');
		return Response::json("Lpgged login from signup form");
	}






}