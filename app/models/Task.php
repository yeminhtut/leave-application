<?php 
class Task extends Eloquent{

	public function project()
	{
		return $this->belongsTo('App\Project');
	}
}
?>