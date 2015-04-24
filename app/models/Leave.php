<?php

class Leave extends Eloquent {
	public function laeave()
	{
		return $this->belongsTo('App\Auth');
	}
}
