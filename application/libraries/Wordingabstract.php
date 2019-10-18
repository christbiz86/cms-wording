<?php

abstract class Wordingabstract extends CI_Controller {

	abstract protected function getValue();

	public function getJsonFile() {
		$data = $this->Packages_model->getContent($this->getValue());
		return json_decode($data[0]->packages_content);
	}

	public function updateJsonFile($content){
		$this->Packages_model->updateJsonFile($this->getValue(),$content);
	}

}
