<?php

namespace Psh\Command;

abstract class BaseCommand implements CommandInterface {

	public $response = [];

	protected $args = [];

	public function setArgs(array $args)
	{
		array_splice($args, 0, 1);
		$this->args = $args;

		return $this;
	}

	public function getResponse()
	{
		return $this->response;
	}
}