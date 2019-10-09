<?php

namespace App\Controllers;

abstract class WordingAbstract extends BaseController {

	abstract protected function getValue();

	public function getJsonFile() {
		return json_decode(file_get_contents($this->getValue()));
	}

}
