<?php

class LogController extends BaseController {



	public function logSongPlay($userId, $songId){

		SongsLog::insert(array(
			'user_id'=>$userId,
			'song_id'=>$songId,
			'played_at'=>$this->timestamp()
			));


		header('Access-Control-Allow-Origin: *');
		return Response::json("Logged song play");
	}




	public function logShareSong($userId, $songId){

		SongsLog::insert(array(
			'user_id'=>$userId,
			'song_id'=>$songId,
			'shared_at'=>$this->timestamp()
			));

		header('Access-Control-Allow-Origin: *');
		return Response::json("Logged song shared");
	}






	public function logSharedPlaylist($userId, $playlistId){

		PlaylistsLog::insert(array(
			'user_id'=>$userId,
			'playlist_id'=>$playlistId,
			'shared_at'=>$this->timestamp()
			));

		header('Access-Control-Allow-Origin: *');
		return Response::json("Logged playlist shared");
	}




	public function logPlaylistPlay($userId, $playlistId){

		PlaylistsLog::insert(array(
			'user_id'=>$userId,
			'playlist_id'=>$playlistId,
			'played_at'=>$this->timestamp()
			));

		header('Access-Control-Allow-Origin: *');
		return Response::json("Logged playlist play");
	}





	//Used by PlaylsitsController========================//
	public static function logPlaylistRetrieved($userId, $sharedPlaylistId){

		PlaylistsLog::insert(array(
			'user_id'=>$userId,
			'playlist_id'=>$sharedPlaylistId,
			'retrieved_at'=>$this->timestamp()
			));

		header('Access-Control-Allow-Origin: *');
		return Response::json("Logged playlist retrieved");
	}





	//Used by UserController========================//
	public static function logLogin($userId){

		UserLog::insert(array(
			'user_id'=>$userId,
			'logged_in'=>$this->timestamp()
			));

		header('Access-Control-Allow-Origin: *');
		return Response::json("Logged login");
	}





	//Used by UserController========================//
	public static function logFailedLogin($email){

		UserLog::insert(array(
			'email'=>$email,
			'failed_login'=>$this->timestamp()
			));

		header('Access-Control-Allow-Origin: *');
		return Response::json("Logged failed Login");
	}





	//Used by UserController========================//
	public static function logForgotPassword($userId){

		UserLog::insert(array(
			'user_id'=>$userId,
			'forgot_password'=>$this->timestamp()
			));

		header('Access-Control-Allow-Origin: *');
		return Response::json("Logged forgot password");
	}






	public function logLogout($userId){

		UserLog::insert(array(
			'user_id'=>$userId,
			'logged_out'=>$this->timestamp()
			));

		header('Access-Control-Allow-Origin: *');
		return Response::json("Logged logout");
	}






	public function logLoginFromSignup($userId){

		UserLog::insert(array(
			'user_id'=>$userId,
			'login_from_signup'=>$this->timestamp()
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