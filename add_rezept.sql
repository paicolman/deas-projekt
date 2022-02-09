-- Benutze die Datenbank die wir generiert haben
USE dea_database;

-- Schreibe ein Rezept rein. In der Tabelle "rezepte" will ich die Spalten 
-- "name", "zutaten" und "zubereitung" mit folgende Werte belegen...
INSERT INTO rezepte(name, zutaten, zubereitung)
VALUES('Mein super Rezept','1 Kg Mehl, 1 Tasse Zucker', 'Mischen und Backen');

-- Wieder...
INSERT INTO rezepte(name, zutaten, zubereitung)
VALUES('Mein anderer mega Rezept','500g Brokkoli, 1 Löffel Salz, Wasser', 'Aufochen und geniessen');

-- und wieder...
INSERT INTO rezepte(name, zutaten, zubereitung)
VALUES('Kaffe Rezept','30g Kafee, 1 Tropfen Rahm', 'Mahlen, erhizen und servieren');

-- Hole alle Daten aus dieser Tabelle
SELECT * FROM rezepte;


