<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model {

	//
	protected $fillable=[
		'userid',
		'fullname',
		'companyname',
		'address',
		'phonenumber',
		'website',
		'companyregistration_number',
		'industry'
	];

	public function users(){
		return $this->belongsTo('App\User','userid'); 
	}

}
