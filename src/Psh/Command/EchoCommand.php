<?php

namespace Psh\Command;

class EchoCommand extends BaseCommand {

	protected $args = [];

	public function setArgs(array $args)
	{
		array_splice($args, 0, 1);
		$this->args = $args;

		return $this;
	}

	public function execute()
	{
		$this->response[] = implode(' ', $this->args);
	}

	public function getResponse()
	{
		return $this->response;
	}

}