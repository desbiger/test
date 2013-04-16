<?php defined('SYSPATH') or die('No direct script access.');

	class Controller_Home extends Controller_Template
	{
		public $template = 'index/index';

		public function before()
		{
			parent::before();
			$this->template->informers = array();
			$this->template->wigets = array();
			$this->wigets['left_menu'] = Model::factory('wiget')->LeftMenu();
			if (! auth::instance()->logged_in()
			)
			{
				$request['email']       = $this->request->post('email');
				$request['name']        = $this->request->post('name');
				$request['first_name']  = $this->request->post('first_name');
				$request['second_name'] = $this->request->post('second_name');
				$request['oblast']      = $this->request->post('oblast');
				$request['citie']       = $this->request->post('citie');
				$request['year']        = $this->request->post('year');
				$request['month']       = $this->request->post('month');
				$request['day']         = $this->request->post('day');
				$request['stag']        = $this->request->post('stag');
				$request['river']       = $this->request->post('river');
				$request['login']       = $this->request->post('login');


				$regions = ORM::factory('region')->GetList();

				$cities = ORM::factory('citie')->PrintSelect($request['oblast'], $request['citie']);

				$this->template->content = View::factory('reg/content/register')->bind('regions', $regions)->bind('request',
					$request)->bind('cities', $cities);


			}
			else
			{
				$this->wigets['weather'] = Model::factory('wiget')->Weather('kursk');

				$this->content = View::factory('index/content/home_page');
			}
			//						$this->content = View::factory('index/content/home_page');
		}

		public function action_index()
		{
			$chuvak   = Request::factory('/vali/tovar')->execute();
			$template = View::factory('index/index')
					->bind('tovars', $tovars)
					->bind('wigets', $this->wigets)
					->bind('chuvak', $chuvak)
					->bind('content', $this->content)
					->bind('informers', $this->informers);
//			$this->response->body($template);
		}

		public function action_reg()
		{
			$this->content = view::factory('reg/content/register');
		}

		public function action_geka()
		{
			if (! Auth::instance()->logged_in())
			{
				$this->request->redirect('/home');
			}

			$name_id  = $this->request->param('id');
			$name     = Model::factory('Geka')->GetName($name_id);
			$template = View::factory('hellow')->bind('name', $name);
			$this->response->body($template);
		}

	} // End Welcome
