<?php
namespace App\Controller;

use App\Model\CorrentistaModel;
use App\Service\Service;

class CorrentistaController extends Controller {
	
	public static function save() 
	{
		$json_obj = parent::getJSONFromRequest();

		$model = new CorrentistaModel();
		$model->id = $json_obj->Id;
		$model->nome = $json_obj->Nome;
		$model->cpf = Service::unmaskCPF($json_obj->CPF);
		$model->data_nasc = $json_obj->Data_Nasc;
		$model->senha = $json_obj->Senha;
		
		$model->id = $model->save();
		parent::getResponseAsJSON($model);
	}

	public static function select() 
	{

	}
		

	public static function auth() 
	{
		$json_obj = parent::getJSONFromRequest();

		$model = new CorrentistaModel();

		parent::getResponseAsJSON($model->auth(Service::unmaskCPF($_GET['cpf']), $_GET['senha']));		
	}

	public static function delete() 
	{

	}
}
