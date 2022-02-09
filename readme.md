# First aid für Deas ITK Projekt

Dieses Projekt ist als Referenz gedacht, damit Dea die basics von html, css, php und sql in ihren Informatik Projekt einsetzen kann.

## Was Du brauchst

Du wirdst sicher folgende Sachen brauchen, um deine Site erstellen zu können:

- **Ein editor:** Am besten benutzt Du der [Visual Studio Code](https://code.visualstudio.com/), der hat viele sogenannte "Extensions" die Du brauchen kannst.
- **Eine SQL Datenbank:** Am besten downloadst Du die [MySQL Community Datenbank](https://dev.mysql.com/downloads/mysql/) Die ist gratis und läuft auf deinen PC. Du musst der zweite Link downloaden, wenn Du es in deinen Mac installieren willst: (macOS 11 (x86, 64-bit), DMG Archive) und es gibt ein kleiner Link in der nächsten Seite, damit Du nicht ein "Oracle login" machen musst...
- **Ein PHP-fähigen Web server:** Da sind die Extentions von VS Code sehr nützlich. Die kannst Du im VS Code drin installieren, indem Du die drey Viereckli auswählst.Dieser [PHP Server Extension]() habe ich in VS Code installiert. Das coole ist, wenn Du rechts-click auf dein html machst, wenn es in VS Code offen ist, zeigt er die Page im Browser, so wie sie im Internet eamgezeigt würde.
- **Eine MySQL Extention:** in den Extentions von VSCode musst Du eine mysql extention installieren, um mit der Datenbank zu kommunizieren (Datenbank generieren, Tabellen erstellen...) Am besten diese Extention da: [MySQL Extnetion](https://marketplace.visualstudio.com/items?itemName=formulahendry.vscode-mysql)
- **Andere Extentions:** Andere VS Code Extentions die nütlzich sein können sind: [HTML Snippets](https://marketplace.visualstudio.com/items?itemName=abusaidm.html-snippets) hilft beim editieren, [HTML Boilerplate](https://marketplace.visualstudio.com/items?itemName=sidthesloth.html5-boilerplate) generiert einen html "Skelett". Andere je nach Bedarf...

## Was hilfreich sein kann

Die html Pages musst Du offenbar selber machen. Heisst das, Du darfst kein html generator benutzen, nehme ich an. Falls eben doch, kannst Du zum Beispiel [Google Web Designer](https://webdesigner.withgoogle.com/) installieren, dann kannst Du der html grafisch generieren und ist alles ein bisschen einfacher als alles "hardcore" selber zu machen...

## Was ich hier gemacht habe

Es sind drei Pages, eine heisst index.html, das ist quasi die "Haupt-Seite", link1.php ist eine HTML Page, wo ein kleiner Teil davon mit PHP generiert wird. Möglichst einfach, zum zeigen was man prinzipiell mit php machen kann. Die dritte ist die "kompliziertere" die hat ein formular und schickt das was drin tust in die Datenbank und die vierte macht das gegenteil, holt die Daten aus der Datenbank und zeigt sie...

## Wie Du es selber machst

Die Pages erstellen und html generieren sollten kein Problem sein, sonst google die Videos von [Web Dev Simplified](https://www.youtube.com/c/WebDevSimplified). Er erklärt viele Konzepte relativ einfach und verständlich...

Was etwas komplizierter ist, ist wenn wir php und Datenbank benutzen.

### Datenbank

Für die Datenbank, musst Du diese zuerst mal installieren und dann musst Du Kommandos wissen, um eine Datenbank zu benutzen, das ist zwar nicht seehr schwierig, aber braucht etwas Uebung.

#### Installation

Du musst die dmg File runterladen und starten, und die Instruktionen befolgen. Wichitg: **Wenn der Installationsprogramm fragt, ob Du starke oder "legacy" Autentifizierung willst, wähle "Legacy"**, sonst ist es schwieriger sich einzuloggen.

#### Benutzung

Um die Datenbank zu benutzen, musst Du Dich mit ihr verbinden und dann Kommandos in der SQL Sprache schreiben (SQL steht für Structured Query Language). Hier ein Beispiel wie Du mit Hilfe von der [MySQL Extnetion](https://marketplace.visualstudio.com/items?itemName=formulahendry.vscode-mysql) eine Datenbank anlegst, eine Tabelle kreierst und Daten in der Tabelle schreibst:

- Nachdem Du die Extention installiert hast, kriegst Du unten rechts in VSCode eine Menu "MYSQL". mit **+** kannst Du dich mit der installierten Datenbank verbinden, die ist im server mit name **localhost**, dein user name ist _root_ und dein Passwort ist das, was Du bei der Installation eingegeben hast. Dann siehst Du ein kleiner blauer Silo mit "localhost" da unten. Mit rechts-click kannst Du dann ein File mit Befehle aufmachen, und diese drauf schreiben.

Wir kreieren eine Datenbank und eine Tabelle darin:

```
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
  ingredienten TEXT,
  zubereitung TEXT
);
-- Zeige die Tabelle (die ist leer...)
SHOW TABLES;
```

Wenn Du diese Befehle ausführst (rechtsclick und _run mySQL query_), bekommst Du so was: |Tables_in_dea_database| |----------------------| |rezepte |

Und jetzt tun wir noch ein paar Rezepte darin schreiben:

```
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
```

Wenn Du diese Befehle ausführst bekommst Du so was: |id|name |zutaten |zubereitung | |--|------------------------|------------------------------------|------------------------------| | 1|Mein super Rezept |1 Kg Mehl, 1 Tasse Zucker |Mischen und Backen | | 2|Mein anderer mega Rezept|500g Brokkoli, 1 Löffel Salz, Wasser|Aufochen und geniessen | | 3|Kaffe Rezept |30g Kafee, 1 Tropfen Rahm |Mahlen, erhizen und servieren |

In dieser [Cheat Sheet](https://www.mysqltutorial.org/mysql-cheat-sheet.aspx) findest Du alle basic Befehle für mySQL...

## PHP

Nun hast Du eine Datenbank mit drei Rezepte drin (man könnte es viel komplizierter machen, mit mehrere Tabellen die miteinander verlinkt sind, aber das ist dann viel zu komplex zum so erklären...), jetzt willst Du damit arbeiten und diese Daten in html anzeigen und auch neue Rezepte darin schreiben, hier ist beschrieben, wie das geht.
