<?php defined('SYSPATH') or die('No direct script access.');
	class Controller_messages extends Controller
	{
		public function before()
		{

			$wigets = array(
				'left_menu' => Model::factory('wiget')->LeftMenu()
			);
			$this->content  = view::factory('messages/content/all_messages');
			$this->template = view::factory('index/index')->bind('content', $this->content)->bind('wigets', $wigets);
		}

		public function action_index()
		{
			$this->response->body($this->template);
		}

		public function action_dialog()
		{
			$this->content = view::factory('messages/content/dialog');
			$this->response->body($this->template);
		}
	}