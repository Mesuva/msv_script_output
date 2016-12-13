<?php

// Author: Ryan Hewitt - http://www.mesuva.com.au
namespace Concrete\Package\MsvScriptOutput;
use Package;
use BlockType;

class Controller extends Package {

	protected $pkgHandle = 'msv_script_output';
	protected $appVersionRequired = '5.7.5';
	protected $pkgVersion = '0.9.2';
	
	public function getPackageDescription() {
		return t("A block to control the output of ad-hoc scripts");
	}
	
	public function getPackageName() {
		return t("Script Output");
	}

	public function upgrade() {
		parent::upgrade();
	}
	 
	public function install() {
	   $pkg = parent::install();

	   $blk = BlockType::getByHandle('msv_script_output');
	   if(!is_object($blk) ) {
			BlockType::installBlockType('msv_script_output', $pkg);
	   }
	}
}