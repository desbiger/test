<?php


	class Model_Tovar extends ORM
	{
		protected  $_has_one = array(
			'picture' => array(
				'model' => 'picture',
				'foreign_key'   => 'id'
			)
		);

		public function rules()
		{
			return array(
				'name' => array('not_empty')
			);
		}
	}