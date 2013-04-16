<?php
	/**
	 * Created by JetBrains PhpStorm.
	 * User: wadim
	 * Date: 02.04.13
	 * Time: 12:35
	 * To change this template use File | Settings | File Templates.
	 */

	class Model_Geka extends Model
	{

		public function GetName($id_name = 0)
		{
			$names = array(
				'Жека',
				'Паша',
				'Лёха',
				'Андрюха',
			);
			return $names[$id_name];
		}
	}