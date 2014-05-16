<?php

class LogController extends BaseController {



	public function logSongPlay($userId, $songId){
		$time = $this->timestamp();

		SongsLog::insert(array(
			'user_id'=>$userId,
			'song_id'=>$songId,
			'played_at'=>$time
			));


		header('Access-Control-Allow-Origin: *');
		return Response::json("Logged song play");
	}




	public function logSharedSong($userId, $songId){
		$time = $this->timestamp();

		SongsLog::insert(array(
			'user_id'=>$userId,
			'song_id'=>$songId,
			'shared_at'=>$time
			));

		header('Access-Control-Allow-Origin: *');
		return Response::json("Logged song shared");
	}






	public function logSharedPlaylist($userId, $playlistId){
		$time = $this->timestamp();

		PlaylistsLog::insert(array(
			'user_id'=>$userId,
			'playlist_id'=>$playlistId,
			'shared_at'=>$time
			));

		header('Access-Control-Allow-Origin: *');
		return Response::json("Logged playlist shared");
	}




	public function logPlaylistPlay($userId, $playlistId){
		$time = $this->timestamp();

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
		$time = timestamp();

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
		$time = timestamp();

		UserLog::insert(array(
			'user_id'=>$userId,
			'logged_in'=>$time
			));

		header('Access-Control-Allow-Origin: *');
		return Response::json("Logged login");
	}





	//Used by UserController========================//
	public static function logFailedLogin($email){
		$time = timestamp();

		UserLog::insert(array(
			'email'=>$email,
			'failed_login'=>$time
			));

		header('Access-Control-Allow-Origin: *');
		return Response::json("Logged failed Login");
	}





	//Used by UserController========================//
	public static function logForgotPassword($userId){
		$time = timestamp();

		UserLog::insert(array(
			'user_id'=>$userId,
			'forgot_password'=>$time
			));

		header('Access-Control-Allow-Origin: *');
		return Response::json("Logged forgot password");
	}






	public function logLogout($userId){
		$time = $this->timestamp();

		UserLog::insert(array(
			'user_id'=>$userId,
			'logged_out'=>$time
			));

		header('Access-Control-Allow-Origin: *');
		return Response::json("Logged logout");
	}






	public function logLoginFromSignup($userId){
		$time = $this->timestamp();

		UserLog::insert(array(
			'user_id'=>$userId,
			'login_from_signup'=>$time
			));

		header('Access-Control-Allow-Origin: *');
		return Response::json("Lpgged login from signup form");
	}










	public function timestamp(){

		date_default_timezone_set('UTC');
		$timestamp = date(DATE_RFC2822);

		return $timestamp;
	}

}