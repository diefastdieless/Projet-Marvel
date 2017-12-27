<?php
	require_once "contolleur.php";
	
	class RegisterControlleur extends Controlleur{
		public function register(array $user): ?string{ // Typage donnee en sortie (null ou string);
			
			if(!isset($user["email"]) || !isset($user["password"]) || !isset($user["username"])) // verification de l'existance
				return "view/no-connect/register.php";
			if(empty(trim($user["email"])) || empty(trim($user["password"])) || empty(trim($user["username"]))) // Verification - remplie
				return "view/no-connect/register.php";
			
			$email = htmlspecialchars(trim($user["email"])); // Modification des balises html
			$password = strip_tags(trim($user["password"])); // Suppresssion des balises html php
			$username = strip_tags(trim($user["username"])); // Suppresssion des balises html php
			
			if(!$this->validateEmail($email)) // Verifiaction de l'email
				return "view/no-connect/register.php";
			
			if($email == "toto@toto.toto" && $password = "toto"){ // Connection
				$_SESSION["user"] = $user;
				return "view/connect/index.php";
				
				
			}else
				return "view/no-connect/register.php";
		}
	}
		
		 
		


?>