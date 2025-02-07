<?php
class User{
    protected $id_user ;
    protected $nom ;
    protected $prenom;
    protected $phone;
    protected $email;
    protected $password ;
    protected $role ;
    protected $statut ;

    public function __construct ($id_user ,$nom ,$prenom,$phone ,$email ,$password ,$role ,$statut ){
        $this->id_user=$id_user;
        $this->nom =$nom;
        $this->prenom =$prenom ;
        $this->phone =$phone ;
        $this->email=$email;
        $this->password =$password;
        $this->role=$role ;
        $this->statut=$statut;
    }

    // getters

    public function getIdUser(){
        return $this->id_user ;
    }
    public function getNom(){
        return $this->nom;
    }
    public function getPrenom(){
        return $this->prenom;
    }
    public function getPhone(){
        return $this->phone;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getPasswpord(){
        return $this->password;
    }
    public function getRole(){
        return $this->role;
    }
    public function getStatut(){
        return $this->statut;
    }

// setters
  
public function setIdUser($id_user){
    $this->id_user=$id_user;
}
public function setNom($nom){
    $this->nom=$nom;
}
public function setPrenom($Prenom){
    $this->prenom=$Prenom;
}
public function setPhone($phone){
    $this->phone=$phone;
}
public function setEmail($email){
    $this->email=$email;
}
public function setPassword($password){
    $this->password=$password;
}
public function setRole($role){
    $this->role=$role;
}
public function setStatut($statut){
    $this->statut=$statut;
}


}


?>