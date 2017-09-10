<?php

namespace yii2lab\init\filters;

use yii2lab\console\helpers\Error;
use yii2lab\console\helpers\Output;

class SetExecutable extends Base {

	public function run()
	{
		foreach ($this->paths as $executable) {
			if ($this->isExistsFile($executable)) {
				if ($this->chmodFile($executable)) {
					Output::line("      chmod 0755 $executable");
				} else {
					Error::line("Operation chmod not permitted for $executable.");
				}
			} else {
				Error::line("$executable does not exist.");
			}
		}
	}

}
