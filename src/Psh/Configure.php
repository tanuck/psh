<?php

namespace Psh;

class Configure {

	private static $values = [];

	public static function get($key = null)
	{
		if ($key === null) {
			return self::$values;
		}

		$segments = explode('.', $key);
		$data = &self::$values;

		foreach ($segments as &$segment) {
			if (isset($data[$segment])) {
				$data = &$data[$segment];
			} else {
				return null;
			}
		}

		return $data;
	}

	public static function set($key, $value)
	{

	}

	public static function delete($key)
	{

	}

	public static function dump()
	{
		$values = self::$values;
		self::$values = [];

		return $values;
	}

	public static function load(array $data)
	{
		self::$values = $data;
	}
}