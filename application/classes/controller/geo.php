<?php defined('SYSPATH') or die('No direct script access.');
	class Controller_Geo extends Controller
	{
		public function action_index()
		{

		}

		public function action_city()
		{
			$id     = $this->request->post('id');
			$type    = $this->request->post('type');
			$cities = ORM::factory('citie')
					->GetByRegionID($id,$type);
			if (count($cities) > 0) {
				$html = "				<td>Населенный пункт</td>
								<td>";
				$html .= Form::select('citie', $cities);
				$html .= "</td>";
				$this->response->body($html);
			}
			else {
				return false;
			}
		}

		public function action_river()
		{
			$name = $this->request->post('name');
			//			$name = $this->request->param('id');
			if (strlen($name) > 0) {
				$html = ORM::factory('river')
						->SearchResult($name);
				$this->response->body($html);
			}
			else {
				return "";
			}
		}

		public function action_addrivers()
		{
			//			$rivers = unserialize(file_get_contents($_SERVER['DOCUMENT_ROOT'].'/media/rivers2.php'));

			//			foreach($rivers as $river){
			//				$orm_river = ORM::factory('river');
			//				$orm_river->set('name',$river);
			//				$orm_river->save();
			//			}
		}
		public function action_stripn()
		{
			$rivers = ORM::factory('river')->find_all();
			foreach ($rivers as $river) {
				$strip_name = str_replace("\n", "", $river->name);
				$strip_name = preg_replace("!([\r,\n])(.*)!isU", "\$2", $river->name);
				$new_name   = ORM::factory('river', $river->id);
				$new_name->set('name', $strip_name);
//				$new_name->save();
				echo var_dump($strip_name) . "<br>";
			}
		}

	}