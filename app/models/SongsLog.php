<?php


class SongsLog extends Eloquent{

	protected $table = "songs_log";

	protected $fillable = array('user_id', 'song_id', 'played_at', 'shared_at');



}