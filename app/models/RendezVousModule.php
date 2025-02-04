<?php
require_once '../Entities/RendezVous.php' ;
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
}

?>