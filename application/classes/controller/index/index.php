<?php defined('SYSPATH') or die('No direct script access.');
	class Controller_Index_Index extends Controller_Base
	{

		public function before()
		{



			parent::before();
			$this->values = Arr::extract($_POST, array(
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
		}

		public function action_index()
		{
			if (! Auth::instance()->logged_in() && $this->request->action() != 'reg')
			{
				$this->request->redirect('base/reg');
			}
		}

		public function action_enter(){
			$this->template->content = '123';
		}

		public function action_reg()
		{
			$regions = Model::factory('region')->GetList();

			$cities = ORM::factory('citie')->PrintSelect($this->values['oblast'], $this->values['citie']);

			$reg_form = View::factory('wigets/register', array(
			                                                  'regions' => $regions,
			                                                  'request' => $this->values,
			                                                  'cities'  => $cities,
			                                             ));

			$this->template->content = $reg_form;
		}

		public function action_newuser()
		{
			$this->template->content = "<pre>" . print_r($this->values, true) . "</pre>";
		}
	}