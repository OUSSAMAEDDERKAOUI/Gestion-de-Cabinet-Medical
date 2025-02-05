-- Créer les types ENUM avant de les utiliser
CREATE TYPE role_enum AS ENUM ('Admin', 'Patient', 'Medecin');
CREATE TYPE statut_enum AS ENUM ('actif', 'inactif');
v-- Création de la table "users"
CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    phone VARCHAR(50) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role role_enum NOT NULL,  
    statut statut_enum        
);

-- Création de la table "informations" avec la clé étrangère
CREATE TABLE informations (
    id_medecin INT NOT NULL,
    biographie TEXT,
    adresse VARCHAR(255) NOT NULL,
    FOREIGN KEY (id_medecin) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE rendez_vous (
id_rendez_vous SERIAL PRIMARY KEY ,
date DATE DEFAULT  CURRENT_DATE  NOT NULL ,
description VARCHAR(255) ,
id_medecin INT NOT NULL,
id_patient INT NOT NULL ,
FOREIGN KEY (id_medecin) REFERENCES users(id)  ON DELETE CASCADE ON UPDATE CASCADE ,
FOREIGN KEY (id_patient) REFERENCES USERS (id) ON DELETE CASCADE ON update CASCADE 
)
