<?php

namespace App\Controllers;

use App\Models\PackagesModel;

abstract class WordingAbstract extends BaseController {

	abstract protected function getValue();

	public function getPackagesModel(){
		return new PackagesModel();
	}

	public function getJsonFile() {
		$data = $this->getPackagesModel()->where('packages_title',$this->getValue())->findAll();
		return json_decode($data[0]['packages_content']);
	}

	public function updateJsonFile($content){
		$this->getPackagesModel()->where('packages_title',$this->getValue())->set(['packages_content' => $content])->update();
	}

}
