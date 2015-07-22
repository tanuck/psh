<?php

namespace Psh;

use Psh\Command\BaseCommand;

class Shell {

	protected $pwd = null;

	public function __construct()
	{
		$this->pwd = getcwd();
	}

	public function run()
	{
		$this->welcome();

		$finish = false;

		while (!$finish) {
			$this->prompt();

			if ($line = trim(fgets(STDIN))) {
				$args = explode(' ', preg_replace('/\s+/', ' ', $line));
				$response = null;
				if ($this->isBuiltIn($args[0])) {
					$command = $this->loadCommand($args[0]);
					$response = &$this->invokeCommand($command, $args);
				}

				if ($response) {
					$this->out($response);
				}
			}
		}
	}

	protected function out(array $response)
	{
		foreach ($response as &$line) {
			printf($line . PHP_EOL);
		}
	}

	protected function invokeCommand(BaseCommand $command, array $args)
	{
		try {
			$command->setArgs($args)->execute();
			return $command->getResponse();
		} catch (CommandException $e) {
			return (method_exists($command, 'getUsage')) ? $command->getUsage() : null;
		}
	}

	protected function welcome()
	{
		printf('Welcome to Psh! The PHP Shell.' . PHP_EOL);
		printf(PHP_EOL);
	}

	private function isBuiltIn($command)
	{
		return class_exists('Psh\Command\\' . ucfirst($command) . 'Command');
	}

	private function prompt()
	{
		printf('Psh -> %s  ', $this->pwd);
	}

	private function loadCommand($command)
	{
		$class = new \ReflectionClass('Psh\Command\\' . ucfirst($command) . 'Command');
		return $class->newInstance();
	}
}