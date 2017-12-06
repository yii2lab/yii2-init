<?php

namespace yii2lab\init\filters;

use yii2lab\console\helpers\Output;
use yii2lab\init\base\PlaceholderBaseFilter;

class ConfigureEnv extends PlaceholderBaseFilter {

	public $placeholderMask = 'YII_ENV_{name}';
	public $argName = 'env';

	public function run()
	{
		$this->loadDefault('env');
		$config = $this->userInput();
		Output::line();
		Output::arr($config);
		$this->saveData($config);
	}

	protected function inputData() {
		$config['env'] = $this->showSelect('env', null, 'Select env');
		$config = $this->setDefault($config);
		$config['debug'] = $config['env'] == 'prod' ? 'false' : 'true';
		return $config;
	}

}
