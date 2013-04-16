<?php defined('SYSPATH') or die('No direct script access.');

	class Model_Wiget extends Model
	{
		public function LeftMenu(){
			if(Auth::instance()->logged_in()){
				return View::factory('wigets/left_menu');
			}else{
				return View::factory('wigets/login');
			}
			return View::factory('wigets/left_menu');
		}
		public function Weather($city){
			return View::factory('wigets/weather.'.$city);
		}
	}