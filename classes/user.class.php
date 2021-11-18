<?php
	class User {
		protected $Conn;
		public function __construct($Conn){
			$this->Conn = $Conn;
		}
		public function createUser($user_data){
			$sec_password = password_hash($user_data['password'], PASSWORD_DEFAULT);
			$query = "INSERT INTO users (email, password) VALUES (:email, :password)";
			$stmt = $this->Conn->prepare($query);
			return $stmt->execute(array(
				'email' => $user_data['email'],
				'password' => $sec_password
			));
		}

		public function loginUser($user_data) {
			$query = "SELECT * FROM users WHERE email = :email";
			$stmt = $this->Conn->prepare($query);
			$stmt->execute(array('email' => $user_data['email']));
			$attempt = $stmt->fetch();

			if ($attempt && password_verify($user_data['password'], $attempt['password'])) {
				return $attempt;
			} else {
				return false;
			}
		}

		public function getUser() {
			$query = "SELECT * FROM users WHERE user_id = :user_id";
			$stmt = $this->Conn->prepare($query);
			$stmt->execute(array(
				'user_id' => $_SESSION['user_data']['user_id']
			));
			return $stmt->fetch();
		}

		public function updateUserProfile($file_name) {
			$query = "UPDATE users SET image = :image WHERE user_id = :user_id";
			$stmt = $this->Conn->prepare($query);
			$stmt->execute(array(
				'image' => $file_name,
				'user_id' => $_SESSION['user_data']['user_id']
			));
			return true;
		}
	}