<?php
class Medcin extends User
{
    public  function getAllMedecins()
    {

        $query = "SELECT * FROM users JOIN informations ON users.id = informations.id_medecin";
        return $this->query($query);
    }




}


?>

