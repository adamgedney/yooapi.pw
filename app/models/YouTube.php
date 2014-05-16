<?php


class YouTube extends Eloquent{


	protected $table = 'youtube_results';
	protected $fillable = array('query', 'etag', 'video_id', 'title', 'description', 'img_default', 'img_medium', 'img_high');







	//Get the results for a query from database
	// public static function getResults($query)
	// {
	// 	$resultArray = array();

	// 	//Query DB on "query"
	// 	$results = DB::table('youtube_results')->where('query', '=', $query)->get();

	// 	foreach($results as $r){
	// 		array_push($resultArray, $r);
	// 	}


	// 	return $resultArray;
	// }


}