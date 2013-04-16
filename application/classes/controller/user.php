<?php defined('SYSPATH') or die('No direct script access.');
	class Controller_User extends Controller
	{
		public function action_index()
		{
			$post = Arr::extract($_POST, array(
				'email',
				'name',
				'password',
				'confirm_password'
			));
		}
	}