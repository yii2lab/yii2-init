<?php

namespace yii2lab\init\filters;

use yii2lab\console\helpers\input\Question;

class SetEnv extends Base {

	public $root;
	public $paths;
	public $appList;
	public $envs = [
		'prod' => 'Production',
		'dev' => 'Develop',
	];
	public $default = [
		'env' => 'prod',
		'debug' => false,
	];

	public function run()
	{
		$config['env'] = Question::display('Select env', $this->envs);
		$config['debug'] = $config['env'] == 'prod' ? 'false' : 'true';
		$config = $this->setDefault($config);
		$this->replaceContentList([
			'_YII_ENV_PLACEHOLDER_' => $config['env'],
			'_YII_DEBUG_PLACEHOLDER_' => $config['debug'],
		]);
	}

}