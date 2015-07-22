<?php

namespace Psh\Command;

interface CommandInterface {

	public function setArgs(array $args);

	public function execute();

	public function getResponse();

}