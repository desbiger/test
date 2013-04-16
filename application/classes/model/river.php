<?php defined('SYSPATH') or die('No direct script access.');

	class Model_River extends ORM
	{
		public function SearchByName($name)
		{
			$result = $this
					->where('name', "LIKE", $name . "%")
					->order_by('name')
					->group_by('name')
					->find_all();
			if (count($result) > 0) {
				return $result;
			}
			else {
				return false;
			}

		}

		public function SearchResult($name)
		{
			$array = $this->SearchByName($name);
			$html  = '';
			if (count($array) > 0) {
				$html .= "<div class='rivers_list'>";
				foreach ($array as $vol) {
					$html .= "<div onclick=\"SetRiverName('" . $vol->name . "')\">" . $vol->name . "</div>";
				}
				$html .= "</div>";
			}
			return $html;
			//			return print_r($array,true);
		}
	}