<?php
header('Access-Control-Allow-Origin: *');

class LibraryController extends BaseController {






	public function getLibrary($id, $sortBy, $sortOrder, $page)
	{
		$limit = 50;

		$libraryCount = Library::where('user_id', '=', $id)
							->where('is_deleted', '=', NULL)
							->join('library_songs', 'library.id', '=', 'library_songs.library_id')
							->count();


		//Defaults sort order if none present
		if($sortBy === 'def' || $sortOrder === 'def'){
			$sortBy 	= 'library_songs.created_at';
			$sortOrder 	= 'DESC';
		}

		//Fetches user library
		$library = Library::where('user_id', '=', $id)
							->where('is_deleted', '=', NULL)
							->join('library_songs', 'library.id', '=', 'library_songs.library_id')
							->join('songs', 'songs.id', '=', 'library_songs.song_id')
							->orderBy($sortBy, $sortOrder)
							->take($limit)
							->skip((int)$page)
							->get();


		$obj = array(
			json_decode($library, true),
			'count'		=>$libraryCount,
			'limit'  	=>$limit,
			'skip' 		=>(int)$page
		);




		header('Access-Control-Allow-Origin: *');
		return Response::json($obj);
	}












	//Add song to library
	public static function addToLibrary($songId, $userId)
	{
		$librarySongs = 'Song already exists';

		//Fetch library id based on user id
		$libraryId = Library::where('user_id', '=', $userId)
		->get();

		Check library for current song
		$inLibrary = LibrarySongs::where('song_id', '=', $songId)
									->where('library_id', '=', $libraryId[0]->id)
									->count();

		//If song is NOT in THIS USER'S library already, insert
		if($inLibrary === 0){

			//Insert song id into user songs paired to library id
			$librarySongs = LibrarySongs::insert(array(
				'song_id'	=>$songId,
				'library_id'=>$libraryId[0]->id));
		}




		header('Access-Control-Allow-Origin: *');
		return Response::json($librarySongs);
	}











	//Remove song from library
	public function removeFromLibrary($songId, $userId)
	{

		//Fetch library id based on user id
		$libraryId = Library::where('user_id', '=', $userId)->get();


		//Mark as removed where song id & library id match
		$librarySongs = LibrarySongs::where('library_id', '=', $libraryId[0]->id)
									->where('song_id', '=', $songId)
									->update(array(
											'is_deleted'=>"true"
											));

		$obj = array('libid'=>$libraryId[0]->id,
				'songid'=>$songId);


		header('Access-Control-Allow-Origin: *');
		return Response::json($obj);
	}






}