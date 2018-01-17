<?php

namespace yii2lab\init\domain\base;

use yii2lab\helpers\yii\FileHelper;

abstract class FileBaseFilter extends BaseFilter {

	protected function isFile($name)
	{
		$file = $this->getFileName($name);
		return file_exists($file);
	}

	protected function chmodFile($name, $mode)
	{
		$file = $this->getFileName($name);
		return @chmod($file, $mode);
	}
	
	protected function loadFile($name)
	{
		$file = $this->getFileName($name);
		$content = FileHelper::load($file);
		return $content;
	}
	
	protected function saveFile($name, $content)
	{
		$file = $this->getFileName($name);
		FileHelper::save($file, $content);
	}

	protected function removeFile($name)
	{
		$file = $this->getFileName($name);
		return @unlink($file);
	}

	protected function removeDir($name)
	{
		$file = $this->getFileName($name);
		return @rmdir($file);
	}

	protected function isDir($name)
	{
		$file = $this->getFileName($name);
		return @is_dir($file);
	}

	protected function getFileName($name)
	{
		$file = ROOT_DIR . DS . $name;
		$file = FileHelper::normalizePath($file);
		return $file;
	}

}