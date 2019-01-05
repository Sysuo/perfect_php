<?php
/**
 * Created by PhpStorm.
 * User: atsukok
 * Date: 2019/01/05
 * Time: 18:35
 */

namespace core;


class View
{
	protected $base_dir;
	protected $defaults;
	protected $layout_variables = array();

	public function __construct($base_dir, $defaults = array()) {
		$this->base_dir = $base_dir;
		$this->defaults = $defaults;
	}

	public function setLayoutVar($name, $value) {
		$this->layout_variables[$name] = $value;
	}

	public function render($_path, $_variables = array(), $_layout = false) {
		$_file = $this->base_dir . '/' . $_path . '.php';

		extract(array_merge($this->defaults, $_variables));

		ob_start();	// 出力のバッファリングを有効化
		ob_implicit_flush(0);	// 自動フラッシュOFF

		require $_file;

		$content = ob_get_clean();

		if ($_layout) {
			$content = $this->render($_layout,
				array_merge(
					$this->layout_variables,
					array('content' => $content),
				)
			);
		}

		return $content;
	}
}