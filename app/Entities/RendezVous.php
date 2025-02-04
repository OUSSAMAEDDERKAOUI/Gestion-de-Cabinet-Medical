<?php

require_once '../config/database.php';
class RendezVous
{
    private $id_rendez_vous;
    private $date;
    private $description;
    private $id_medecin;
    private $id_patient;

    public function __construct($id_rendez_vous, $date, $description, $id_medecin, $id_patient)
    {
        $this->id_rendez_vous = $id_rendez_vous;
        $this->description = $description;
        $this->id_medecin = $id_medecin;
        $this->id_patient = $id_patient;
    }
    // getters
    public function getIdRendezVous()
    {
        return $this->id_rendez_vous;
    }
    public function getDate()
    {
        return $this->date;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getIdMedecin()
    {
        return $this->id_medecin;
    }
    public function getIdPatient()
    {
        return $this->id_patient;
    }

    //setters 

    public function setIdRendezVous($id_rendez_vous)
    {
        $this->id_rendez_vous = $id_rendez_vous;
    }
    public function setDate($date)
    {
        $this->date = $date;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }
    public function setIdMedecin($id_medecin)
    {
        $this->id_medecin = $id_medecin;
    }
    public function setIdPatient($id_patient)
    {
        $this->id_patient = $id_patient;
    }

    // methods

   
}
