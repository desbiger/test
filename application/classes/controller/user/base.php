<?php


	class Controller_User_Base extends Controller
	{
		public function before()
		{
			parent::before();
		}

		public function action_index()
		{

		}

		public function action_login()
		{
			$this->content = "<pre>".print_r($_POST)."</pre>";
//			$this->request->redirect('base/enter');
		}
	}