<?php defined('SYSPATH') or die('No direct script access.');

    class Model_Region extends ORM
    {
	    public $_table_name = "geo_regions";
	    public  $_has_many = array(
		    'citie' => array(
			    'model' => 'citie'
		    )
	    );

	    public function GetList(){
		    return $this->find_all();
	    }
    }