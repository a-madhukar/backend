<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use App\Company; 
use Request;
use Response;  

class CompanyController extends Controller {

	//

	//create the company
	public function create(){
		$company = Request::all(); 

		if ($company['fullname']!=null && $company['address']!=null && $company['phonenumber']!=null) {
			# code...
			$newCompany=$this->save($company['userid'],$company['fullname'], $company['companyname'],$company['address'],$company['phonenumber'],$company['website'],$company['companyregistration_number'],$company['industry']);

			//dd($newCompany); 

			if ($newCompany!=null) {
			 	# code...
			 	return Response::json($newCompany,201); 
			 } 
			 return Response::json($this->message("Couldn't create company"),500); 
		}

		return Response::json($this->message("Invalid Data"),400); 
	}

	//returns the message
	public function message($message){
		return ['message'=>$message];
	}

	//saves the company to the database
	public function save($userid,$fullname,$companyname,$address,$phonenumber,$website,$companyregistration_number,$industry){

		return Company::create(['userid'=>$userid,'fullname'=>$fullname,'companyname'=>$companyname,'address'=>$address,'phonenumber'=>$phonenumber,'website'=>$website,'companyregistration_number'=>$companyregistration_number,'industry'=>$industry]); 

	}

}
