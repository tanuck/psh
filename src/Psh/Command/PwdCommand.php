<?php

namespace Psh\Command;

class PwdCommand extends BaseCommand {

	public function execute()
	{
		$this->response[] = getcwd();
	}
	
}