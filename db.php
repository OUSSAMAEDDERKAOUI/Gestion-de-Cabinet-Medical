<?php
try {
    // Connexion à PostgreSQL avec PDO
    $pdo = new PDO("pgsql:host=localhost;dbname=gestion_cabinet_medical", "postgres", "1234");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connexion réussie à PostgreSQL!";
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
