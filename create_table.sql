-- Lösche eine Datenbank falls sie schon existiert
DROP DATABASE IF EXISTS dea_database;
-- Generiere eine neue Datenbank
CREATE DATABASE IF NOT EXISTS dea_database;
-- Benutze die neue Datenbank
USE dea_database;
-- Generiere eine Tabelle darin
CREATE TABLE IF NOT EXISTS rezepte(
  id INT AUTO_INCREMENT PRIMARY KEY,
  name TEXT,
  zutaten TEXT,
  zubereitung TEXT
);
-- Zeige die Tabelle (die ist leer...)
SHOW TABLES;
