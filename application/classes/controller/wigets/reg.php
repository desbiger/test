<?php defined('SYSPATH') or die('No direct script access.');
	class Controller_Wigets_Reg extends Controller_Template
	{
		public $template = 'wigets/register';

		public function  before()
		{
			parent::before();
			$this->template->request = Arr::extract($_POST, array(
				'email',
				'name',
				'first_name',
				'second_name',
				'citie',
				'year',
				'month',
				'day',
				'stag',
				'river',
				'login',
				'oblast',
			));
			$this->template->regions   = Model::factory('region')->GetList();

			$this->template->cities   = ORM::factory('citie');
		}

		public function action_index()
		{
			$name                  = null;
			$this->template->river = $this->request->param('river');
			$this->template->value = $this->request->param('value');
		}
	}