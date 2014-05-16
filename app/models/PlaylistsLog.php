<?php


class PlaylistsLog extends Eloquent{

	protected $table = "playlists_log";

	protected $fillable = array('user_id', 'playlist_id', 'played_at', 'shared_at', 'retrieved_at');



}