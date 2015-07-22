<?php

namespace Psh\Command;

class EchoCommand extends BaseCommand {

	public function execute()
	{
		$this->response[] = implode(' ', $this->args);
	}

}