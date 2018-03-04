<?php

namespace yii2lab\init\domain\exceptions;

use Yii;
use yii\web\HttpException;

class NotInitApplicationException extends HttpException {
	
	public function __construct($status = 500, $message = null, $code = 0, \Exception $previous = null) {
		$message = 'Application not be inited!';
		parent::__construct($status, $message, $code, $previous);
	}
	
}
