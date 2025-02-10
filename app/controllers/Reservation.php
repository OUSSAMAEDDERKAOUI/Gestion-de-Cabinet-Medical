<?php 

/**
 * reservation class
 */
class Reservation
{
	use Controller;
    use Model ;

    public function index()
    {
       


    $joinOn = [
        'table' => 'informations',  
        'on' => 'users.id=informations.id_medecin'  
    ];
    
    $results = $this->innerJoin('users', $joinOn);

       $this->view('reservation', ['results' => $results]); 

    }

}