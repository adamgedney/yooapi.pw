<?php


class UserLog extends Eloquent{

	protected $table = "user_log";

	protected $fillable = array('user_id', 'email','logged_in', 'logged_out', 'failed_login','reset_token');



}