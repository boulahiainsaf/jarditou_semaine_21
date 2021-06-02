CREAT table users (
    us_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    us_nom VARCHAR(50) NOT NULL,
    us_prenom VARCHAR(50) NOT NULL,
    us_mail VARCHAR (50) NOT NULL,
    us_login VARCHAR(50) NOT NULL,
    us_password VARCHAR(50) NOT NULL,
    us_date_inscription DATE NOT NULL,
    us_date_der_connexion DATE NOT NULL
)