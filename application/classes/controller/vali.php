<?php defined('SYSPATH') or die('No direct script access.');
	class Controller_Vali extends Controller
	{
		public function action_index()
		{

		}

		public function action_email()
		{
			$str  = '';
			$post = Arr::extract($this->request->post(), array('s'));
			$post = Validation::factory($post);
			$post->rule('s', 'min_length', array(':value', '3'));
			$post->rule('s', 'email');
			$post->rule('s', 'not_empty');
			$post->label('s', 'Email');

			if (! $post->check())
			{
				foreach ($post->errors('validation') as $vol)
				{
					$str .= $vol;
				}
				$this->response->body($str);
			}
		}

		public function action_tovar()
		{
			$str    = '';
			$tovars = ORM::factory('tovar')->find_all();
			foreach ($tovars as $tovar)
			{
				$str .= $tovar->name . "<br>";
				$str .= "<img src='" . $tovar->picture->path . "' title='" . $tovar->picture->name . "' >" . "<br>";
			}
			$this->response->body($str);
		}

	}