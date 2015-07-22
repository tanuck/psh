<?php

namespace Psh;

class Configure {

	private static $values = [];

	public static function get($key)
	{
		$segments = explode('.', $key);
		$data = &self::$values;

		foreach ($segments as &$segment) {
			if (isset($data[$segment])) {
				$data = $data[$segment];
			}
		}
	}

	public static function set($key, $value)
	{

	}

	public static function delete($key)
	{

	}
}