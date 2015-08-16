<?php

namespace Psh\Command;

class CdCommand extends BaseCommand {

	public function execute()
	{
		if (!chdir($this->args[0])) {
			throw new CommandException('Invalid directory');
		}
	}
}