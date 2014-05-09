<?php


class UserQueries extends Eloquent{

	protected $table = "user_queries";

	protected $fillable = array('user_id', 'query_id');



}