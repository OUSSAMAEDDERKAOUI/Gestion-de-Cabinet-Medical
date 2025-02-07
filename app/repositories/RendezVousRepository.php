<?php
require_once '../models/RendezVous.php' ;
class RendezVousRepository{
    public function ajouterRendezVous(RendezVous $rendezVous)
    {
        $query = "INSERT INTO rendez_vous ( date,description,id_medecin, id_patient)
                  VALUES ( CURRENT_DATE ,:description ,:id_medecin,:id_patient )";

        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->bindParam(':description', $rendezVous->getDescription());
        $stmt->bindParam(':id_medecin', $rendezVous->getIdMedecin());
        $stmt->bindParam(':id_patient', $rendezVous->getIdPatient());

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            throw new PDOException("Erreur lors de l'exécution de la requête : " . $e->getMessage());
        }
    }
    public function annulerRendezVous($id_rendez_vous)
    {
        $query = "UPDATE TABLE rendez_vous 
                  SET rendez_vous.statut ='annule'
                   WHERE id_rendez_vous= :id_rendez_vous ";

        $stmt = Database::getInstance()->getConnection()->prepare($query);
        
        $stmt->bindParam(':id_rendez_vous', $id_rendez_vous,PDO::PARAM_INT);

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            throw new PDOException("Erreur lors de l'exécution de la requête : " . $e->getMessage());
        }
    }
    public function modifierRendezVous($id_rendez_vous)
    {
        $query = "UPDATE TABLE rendez_vous 
                  SET rendez_vous.statut ='annule'
                   WHERE id_rendez_vous= :id_rendez_vous ";

        $stmt = Database::getInstance()->getConnection()->prepare($query);
        
        $stmt->bindParam(':id_rendez_vous', $id_rendez_vous,PDO::PARAM_INT);

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            throw new PDOException("Erreur lors de l'exécution de la requête : " . $e->getMessage());
        }
    }
    public function afficherTousRendezVous($id_patient)
    {
        $query = "SELECT * FROM  rendez_vous 
                  
                   WHERE id_patient= :id_patient ";

        $stmt = Database::getInstance()->getConnection()->prepare($query);
        
        $stmt->bindParam(':id_patient', $id_patient,PDO::PARAM_INT);

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            throw new PDOException("Erreur lors de l'exécution de la requête : " . $e->getMessage());
        }
    }

}

?>