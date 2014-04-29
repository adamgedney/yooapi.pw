<?php
header('Access-Control-Allow-Origin: *');
class PlaylistsController extends BaseController {









	public function newPlaylist($userId, $songId, $playlistName)
	{


		//Create a new playlist for user
		$newPlaylist = Playlists::insert(array(
			'name'		=>$playlistName,
			'user_id'	=>$userId
			));



		//Get inserted playlist to retrieve id
		$getPlaylistId = Playlists::
			where('name', '=', $playlistName)
			->where('user_id', '=', $userId)
			->get();

		//Store new playlist id
		$playlistId= $getPlaylistId[0]->id;

		//Generate share url
		$shareUrl = $userId . '83027179269257243' . $playlistId;

		//Add share url to new playlist entry
		$addShareUrl = Playlists::where('id', '=', $playlistId)
			->update(array(
				'share_url'=>$shareUrl
			));



		//Insert new playlist song on playlist id
		$newplaylistSong = PlaylistSongs::insert(array(
			'playlist_id'=>$playlistId,
			'song_id'=>$songId));



		header('Access-Control-Allow-Origin: *');
		return Response::json($newplaylistSong);
	}










	public function addSharedPlaylist($userId, $sharedPlaylistId)
	{

		$addedSharedSongs = array();

		//Get Shared playlist on id
		$getSharedPlaylist = Playlists::
			where('id', '=', $sharedPlaylistId)
			->get();

		//Grab the playlist's name
		$playlistName = $getSharedPlaylist[0]->name;



		//Create a new playlist for current user
		$newPlaylist = Playlists::insert(array(
			'name'		=>$playlistName,
			'user_id'	=>$userId,
			'acquired' 	=>'true'
			));



		//Get inserted playlist to retrieve id
		$getPlaylistId = Playlists::
			where('name', '=', $playlistName)
			->where('user_id', '=', $userId)
			->get();

		//Store new playlist id
		$playlistId= $getPlaylistId[0]->id;

		//Generate share url
		$shareUrl = $userId . '83027179269257243' . $playlistId;

		//Add share url to new playlist entry
		$addShareUrl = Playlists::where('id', '=', $playlistId)
			->update(array(
				'share_url'=>$shareUrl
			));


		//get Shared playlist songs & loop through inserting them into new playlist
		//Get playlists on playlistId
		$sharedSongs = Playlists::where('playlists.id', '=', $playlistId)
								->where('playlist_songs.is_deleted', '=', NULL)
								->join('playlist_songs', 'playlists.id', '=', 'playlist_songs.playlist_id')
								->join('songs', 'songs.id', '=', 'playlist_songs.song_id')
								->get();

$testSongId;
$sharedAdded;
$addtolib = '';
		foreach($sharedSongs as $song){

			$songId = $song->song_id;
			$testSongId = $songId;

			//Insert new playlist song on playlist id
			$sharedSongsAdded = PlaylistSongs::insert(array(
				'playlist_id'=>$playlistId,
				'song_id'=>$songId));

			$sharedAdded = $sharedSongsAdded;

			//Add song to array for return data
			array_push($addedSharedSongs, $songId);

			//Add song to library
			$addtolib = LibraryController::addToLibrary($songId, $userId);
		}

		$obj = array(
			'addtolib'=>$addtolib,
			'array'=>$addedSharedSongs,
			'testsongid'=>$testSongId,
			'sharedAddedtoPL'=>$sharedAdded

		);

//weird



		header('Access-Control-Allow-Origin: *');
		return Response::json($obj);
	}















	public function getPlaylistSongs($playlistId)
	{
		//Get playlists on userId
		$playlist = Playlists::where('playlists.id', '=', $playlistId)
								->where('playlist_songs.is_deleted', '=', NULL)
								->join('playlist_songs', 'playlists.id', '=', 'playlist_songs.playlist_id')
								->join('songs', 'songs.id', '=', 'playlist_songs.song_id')
								->get();



		header('Access-Control-Allow-Origin: *');
		return Response::json($playlist);
	}










	public function getPlaylists($userId)
	{
		//Get playlists songs on userId
		$playlists = Playlists::where('user_id', '=', $userId)
								->where('is_deleted', '=', NULL)
								->orderBy('name', 'ASC')
								->get();



		header('Access-Control-Allow-Origin: *');
		return Response::json($playlists);
	}












	public function addToPlaylist($songId, $playlistId)
	{

		//Insert new song into playlist
		$addToPlaylist = PlaylistSongs::insert(array(
			'playlist_id'=>$playlistId,
			'song_id'=>$songId));



		header('Access-Control-Allow-Origin: *');
		return Response::json($addToPlaylist);
	}









	public function deleteFromPlaylist($songId, $playlistId)
	{

		//Marks playlist song as deleted
		$deleteFromPlaylist = PlaylistSongs::where('playlist_id', '=', $playlistId)
											->where('song_id', '=', $songId)
											->update(array(
											'is_deleted'=>"true"));



		header('Access-Control-Allow-Origin: *');
		return Response::json($deleteFromPlaylist);
	}












	public function deletePlaylist($playlistId)
	{

		//Marks playlist as deleted
		$deletePlaylist = Playlists::where('id', '=', $playlistId)
									->update(array(
									'is_deleted'=>'true'));



		header('Access-Control-Allow-Origin: *');
		return Response::json($deletePlaylist);
	}













	//Return URL to retrieve a playlist
	//Mark playlist as public w/ is_shared
	//Build URL w/ username and playlist id
	public function sharePlaylist()
	{
		return "Testing route";
	}




	//================//
	//Internal Methods//
	//================//

}