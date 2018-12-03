<?php
/**
 * Created by PhpStorm.
 * User: atsukok
 * Date: 2018/12/04
 * Time: 5:38
 */

namespace core;


class ClassLoader
{
	protected $dirs;

	public function register() {
		apl_autoload_register(array($this, 'loadClass'));
	}

	public function registerDir($dir) {
		$this->dirs[] = $dir;
	}

	public function loadClass($class) {
		foreach ($this->dirs as $dir) {
			$file = $dir . '/' . $class . '.php';
			if (is_readable($file)) {
				require $file;

				return;
			}
		}
	}
}