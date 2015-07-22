<?php

namespace Psh\Command;

use Psh\Configure;

class PwdCommand extends BaseCommand {

	public function execute()
	{
		$this->response[] = Configure::get('pwd');
	}
	
}