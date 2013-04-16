<?php

	class Controller_Welcome extends Controller_Template
	{
		public $template = 'hellow';

		public function action_index()
		{
			$this->template->name = '234';
		}
	}