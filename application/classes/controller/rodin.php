<?php defined('SYSPATH') or die('No direct script access.');
    class Controller_Rodin extends Controller
    {
        public function action_index(){
            $template = View::factory('rodin');
	        $this->response->body($template);
        }
    }