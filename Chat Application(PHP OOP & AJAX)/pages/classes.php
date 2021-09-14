<?php 

// class user 

class user{
	private $userid,$username,$usermail,$userpassword; 

	// get and set 

	public function getUser(){

		return $this->userid; 
	}

	public function setUser($userid){

		$this->userid = $userid; 
	}

	public function getUserName(){

		return $this->username; 
	}

	public function setUserName($username){

		$this->username = $username; 
	}

	public function getUserMail(){

		return $this->usermail; 
	}

	public function setUserMail($usermail){

		$this->usermail = $usermail; 
	}

    public function getUserPassword(){

		return $this->userpassword; 
	}

	public function setUserPassword($userpassword){

		$this->userpassword = $userpassword; 
	}

	// insert 

	public function InsertUser(){

		include "connection.php"; 
		$req = $con->prepare("INSERT INTO users(username,usermail,userpassword) VALUES(:zusername,:zusermail,:zuserpassword)"); 
		$req->execute(array(
          'zusername'=>$this->getUserName(), 
          'zusermail'=>$this->getUserMail(), 
          'zuserpassword'=>$this->getUserPassword()
		)); 
	}

	// the login 

	public function UserLogin(){
     
     include "connection.php";

     $req=$con->prepare("SELECT * FROM users WHERE usermail=:zusermail AND userpassword=:zuserpassword"); 
     $req->execute(array(
      'zusermail'=>$this->getUserMail(),
      'zuserpassword'=>$this->getUserPassword()

     )); 
        
        if($req->rowCount()==0){ // rowcount al safa f db 

        	header("Location: ../index.php?error=1"); 

        	return false;

        }else{

        	while($data=$req->fetch()) {  // fetch = a7dra al data 
        		
        		$this->setUser($data['userid']); 
        		$this->setUserName($data['username']);
        		$this->setUserMail($data['usermail']);
        		$this->setUserPassword($data['userpassword']);

        		header("Location: home.php");

        		return true; 
        	}
        }
	}

}


// class chat 

class chat{

	private $chatid,$chatuserid,$chattext; 

	// get and set 

	public function getChatId(){

		return $this->chatid; 
	}

	public function setChatId($chatid){

		$this->chatid = $chatid; 
	}

	public function getChatUserId(){

		return $this->chatuserid; 
	}

	public function setChatUserId($chatuserid){

		$this->chatuserid = $chatuserid; 
	}

	public function getChatText(){

		return $this->chattext; 
	}

	public function setChatText($chattext){

		$this->chattext = $chattext; 
	}


	//insert 

	public function InsertChat(){

		include "connection.php";
		$req = $con->prepare("INSERT INTO chats(chatuserid,chattext) VALUES(:zchatuserid,:zchattext)"); 
		$req->execute(array(

			'zchatuserid'=>$this->getChatUserId(),
			'zchattext'=>$this->getChatText() 

		)); 
	}

	// fun display messages 

	public function DisplayMessages(){

		include "connection.php";

		$chatreq=$con->prepare("SELECT * FROM chats ORDER BY chatid"); 
		$chatreq->execute(); 

		while ($datachat=$chatreq->fetch()) {
		 	
			$userreq=$con->prepare("SELECT * FROM users WHERE userid=:zuserid"); 
			$userreq->execute(array(

				'zuserid'=>$datachat['chatuserid']

			)); 

			$datauser = $userreq->fetch(); 

?> 

		<span style="color:red"><?php echo $datauser['username']; ?></span> Says: <br>
		<span class="chatmessages"><?php echo $datachat['chattext']; ?></span> <br> 


		<?php 

		 } 
	}

}

?> 





