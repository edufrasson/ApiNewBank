<?php
namespace App\Controller;

use App\Model\CorrentistaModel;

class CorrentistaController extends Controller {
	
	public static function save() 
	{
		$json_obj = parent::getJSONFromRequest();

		$model = new CorrentistaModel();
		$model->id = $json_obj->id;
		$model->cpf = $json_obj->cpf;
		$model->data_nasc = $json_obj->data_nasc;
		$model->senha = $json_obj->senha;
		
		$model->save();
	}

	public static function select() 
	{

	}

	public static function auth() 
	{

	}

	public static function delete() 
	{

	}
}
