<?php
/**
 * Created by PhpStorm.
 * User: atsukok
 * Date: 2018/12/04
 * Time: 6:35
 */

namespace core¥web;


class Session
{
	protected static $sessionStarted = false;
	protected static $sessionIdRegenerated = false;

	public function __construct() {
		if (!self::$sessionStarted) {
			session_start();
			self::$sessionStarted = true;
		}
	}

	public function set($name, $value) {
		$_SESSION[$name] = $value;
	}

	public function get($name, $default = null) {
		if (isset($_SESSION[$name])) {
			return $_SESSION[$name];
		}
		return $default;
	}

	public function remove($name) {
		unset($_SESSION[$name]);
	}

	public function clear() {
		$_SESSION = array();
	}

	public function regenerate($destroy = true) {
		if (!self::$sessionIdRegenerated) {
			session_regenerate_id($destroy);
			self::$sessionIdRegenerated = true;
		}
	}

	public function setAuthenticated($authenticated) {
		$this->set('_authenticated', (bool)$authenticated);

		$this->regenerate();
	}

	public function isAuthenticated() {
		return $this->get('_authenticated', false);
	}
}