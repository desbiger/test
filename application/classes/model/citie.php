<?php defined('SYSPATH') or die('No direct script access.');

	class Model_Citie extends ORM
	{
		public $_table_name = "geo_cities";

		public function GetByRegionID($regionID, $city_type)
		{
			$res = array();
			$result = $this
					->where('region_id', "=", $regionID)//					->where('socr', '', DB::expr("IN('г' , 'пгт','ст-ца','х')"))
					->where('socr', '=', $city_type)
					->order_by('name')
					->group_by('name')
					->find_all();
			foreach ($result as $vol) {
				$res[$vol->cid] = $vol->name;
			}

			return $res;
		}

		public function PrintSelect($id, $selected, $city_type = 'г')
		{
			$return = '';
			$array  = $this->GetByRegionID($id, $city_type);
			if (count($array) > 0) {
				$return = Form::select('citie', $array, $selected);
			}
			return $return;
		}
	}