<?

	class Controller_Base extends Controller_Template
	{
		public $template = 'index/index';

		public function before()
		{
			parent::before();

			if (!Auth::instance()
					->logged_in()
			) {
				//				$this->request->redirect('home');
			}

			$left_menu = Model::factory('wiget')
					->LeftMenu();

			$this->template->informers = array();

			$this->template->scripts = array();
			$this->template->css     = array();

			$this->template->wigets  = array($left_menu);
			$this->template->content = null;
		}
	}
