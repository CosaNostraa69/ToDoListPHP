-- Débute le script
START TRANSACTION;
-- Supprime la bdd si elle existe, idéal pour repartir de 0
DROP DATABASE IF EXISTS todo_List;
-- Crée la bdd
CREATE DATABASE IF NOT EXISTS todo_List;
-- Sélectionne la bdd
USE todo_List;
-- Crée une table dans la bdd
CREATE TABLE tasks (
    id INT(10) NOT NULL AUTO_INCREMENT,
    title VARCHAR(150) NOT NULL,
    description VARCHAR(150) NOT NULL,
    important BOOLEAN NOT NULL DEFAULT false,
    PRIMARY KEY (id)
);

-- Insère des valeurs dans la table
INSERT INTO tasks (title, description, important)
VALUES 
    ('Acheter des légumes', 'Se rappeler de prendre des légumes bio', false),
    ('Rendre le livre à la bibliothèque', 'Le livre est dans le sac à dos', false),
    ('Envoyer le courrier', 'Les lettres sont sur le bureau', true);

-- Termine le Script
COMMIT;
