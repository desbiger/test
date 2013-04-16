<?php defined('SYSPATH') or die('No direct script access.');
	class Controller_Wigets_Prozrak extends Controller_Template
	{
		public $template = 'informers/prozrak';

		public function  before()
		{
			parent::before();
			$this->template->river = null;
			$this->template->value = null;
		}

		public function action_index()
		{
			$name = null;
			            $this->template->river = $this->request->param('river');
			            $this->template->value = $this->request->param('value');
		}
	}