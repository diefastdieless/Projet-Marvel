<?php
require_once "controlleur.php";

	class LoginControlleur extends Controlleur{
		
		public function login(array $user): ?string{ // Typage donnee en sortie (null ou string);
			
			if(!isset($user["email"]) || !isset($user["password"])) // verification de l'existance
				return "view/no-connect/login.php";
			if(empty(trim($user["email"])) || empty(trim($user["password"]))) // Verification - remplie
				return "view/no-connect/login.php";
			
			$email = htmlspecialchars(trim($user["email"])); // Modification des balises html
			$password = strip_tags(trim($user["password"])); // Suppresssion des balises html php
			
			if(!$this->validateEmail($email)) // Verifiaction de l'email
				return "view/no-connect/login.php";
			
			if($email == "toto@toto.toto" && $password = "toto"){ // Connection
				$_SESSION["user"] = $user;
				return "view/connect/index.php";
				
				
			}else
				return "view/no-connect/login.php";
		}
			
			
		public function validateEmail(string $email): bool{
				
				return (filter_var($email, FILTER_VALIDATE_EMAIL)) ? true : false;
			}
	
	}
?>