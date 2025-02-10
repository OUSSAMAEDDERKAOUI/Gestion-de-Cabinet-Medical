<?php

/**
 * login class
 */
class Login
{
    use Controller;

    public function index()
    {
        $data = [];

        if($_SERVER['REQUEST_METHOD']== "POST"){
            $user = new User;
            $arr['email'] = $_POST['email'];
            $row=$user->first( $arr);
            if($row){
                if($row->password===$_POST["password"]){
                    $_SESSION['user_id']=  $row->id;
                    $_SESSION['user_fname']=  $row->prenom;
                    $_SESSION['user_lname']=  $row-> nom;
                    $_SESSION['user_phone']=  $row->phone;
                    $_SESSION['user_email']=  $row->email;
                    $_SESSION['user_role']=   $row->role;
                    $_SESSION['user_statut']=   $row->statut;

                    redirect('reservation');
                }    
            }
            $user->errors["email"] ='Wrong email or password ' ;
            $data['errors'] = $user->errors;
        }
       
        $this->view('login', $data);

    }
}
