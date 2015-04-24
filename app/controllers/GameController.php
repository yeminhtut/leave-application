<?php 
class GameController extends BaseController{

	public function index(){
		$games = Game::all();
		//var_dump($games);
		return Response::json(Game::all(),200);
	}

	public function create(){
		echo 'create function';
	}

	public function handleCreate(){

	}

	public function edit(){

	}

	public function handleEdit(){

	}

	public function delete(){

	}

	public function handleDelete(){

	}

}
?>