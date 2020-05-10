<?php
require_once('api/Engine.php');

class ProductsExportAdmin extends Engine
{	
	private $export_files_dir = 'engine/files/export/';

	public function fetch()
	{
		$this->templates->assign('export_files_dir', $this->export_files_dir);
		if(!is_writable($this->export_files_dir))
			$this->templates->assign('message_error', 'no_permission');
  	  	return $this->templates->fetch('products/export.tpl');
	}
	
}

