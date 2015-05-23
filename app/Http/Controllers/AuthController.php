<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use guzzlehttp\guzzle; 

//use Illuminate\Http\Request;
use App\User; 
use Request;
use Response;
use Mail; 
use Auth;

class AuthController extends Controller {

	//

	//register function
	public function register(){
		$credentials = Request::all(); 

		//check if there's data that's sent
		if($credentials['email']!=null && $credentials['password']!=null && $credentials['confirmPassword']!=null){

			//checks if the passwords are right
			if ($credentials['password']==$credentials['confirmPassword']) {

				$newuser = User::create(["email"=>$credentials['email'],"password"=>bcrypt($credentials['password'])]); 

				//checks if the new user is created
				if ($newuser!=null) {
					# code...
					//sends email and returns created object
					$this->sendConfirmMail($newuser->email); 
					return Response::json($newuser,201);
				}

				$message=$this->message("Server couldn't create resource"); 
				return Response::json($message,500); 
			}

			$message=$this->message("Password Don't match");
			return Response::json($message,400);  

		}

		$message=$this->message("Invalid Data"); 
		return Response::json($message,400); 

	}

	//creates the message
	public function message($message){
		return ['message'=>$message]; 
	}

	//sends the email
	public function sendConfirmMail($email){

		Mail::send('emails.signup',[],function($message) use ($email){
			$message->to($email)->subject('Welcome'); 
		}); 

	}

	//sends out a test email 
	//check out the api logs provided by mandrill 
	public function testEmail(){
		Mail::send('emails.signup',[],function($message){
			$message->to('a.madhukar@yahoo.com')->subject('testing'); 
		}); 	
	}

	//logs the user in
	public function login(){
		$credentials=Request::all(); 

		if ($credentials['email']!=null && $credentials['password']!=null) {
			# code...
			if (Auth::attempt(['email'=>$credentials['email'], 'password'=>$credentials['password']])) {
				# code...
				return Response::json(Auth::user(), 200); 
			}

				return Response::json($this->message("	Unsuccessful Login"), 400);
			 
		}	

		return Response::json($this->message("Invalid Data"),400); 	
	}

}
