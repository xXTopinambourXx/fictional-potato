CREATE TABLE Utilisateurs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL
);

-- Exemple d'insertion d'un utilisateur
INSERT INTO Utilisateurs (nom, email, mot_de_passe)
VALUES ('Dupont', 'dupont@example.com', 'motdepasse123');

-- Ajoutez d'autres utilisateurs en utilisant des requêtes similaires.

INSERT INTO Utilisateurs (nom, email, mot_de_passe)
VALUES ('Martin', 'martin@example.com', 'motdepasse456');

INSERT INTO Utilisateurs (nom, email, mot_de_passe)
VALUES ('Lefebvre', 'lefebvre@example.com', 'secret123');
