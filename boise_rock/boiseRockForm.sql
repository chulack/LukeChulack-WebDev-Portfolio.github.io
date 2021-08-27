#********************************************************************
#
#
# This will create the database for the boise rock website. It will have test data,
# Name                   Date              Description
# LukeChulack             8/27/2021         Initial depoyment. 
#********************************************************************
DROP DATABASE IF EXISTS boiseRockForm;                             
CREATE DATABASE boiseRockForm;                   
USE boiseRockForm;

#making objects

CREATE TABLE IF NOT EXISTS employee 
(
	employeeID INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
	firstName VARCHAR (255) NOT NULL, 
	lastName VARCHAR (255) NOT NULL,
	emailAddress VARCHAR (255) NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS contactMSG 
(
	contactMSGID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR (255) NOT NULL,
	userEmail VARCHAR (255) NOT NULL, 
	userMSG VARCHAR (500) NOT NULL,
	msgDate DATETIME NOT NULL,
	employeeID INT NOT NULL,
	FOREIGN KEY (employeeID) REFERENCES employee(employeeID )
);
 


# all pre made data to INSERT in the employee table
INSERT INTO employee 
	(firstName, lastName, emailAddress)
VALUES
	("Luke", "Chulack", "Luke@boiserock.com");
	
INSERT INTO employee 
	(firstName, lastName, emailAddress)
VALUES
	("Admin", "Admin", "Admin@boiserock.com");
	
INSERT INTO employee 
	(firstName, lastName, emailAddress)
VALUES
	("Support", "Support", "Support@boiserock.com");
	
INSERT INTO employee 
	(firstName, lastName, emailAddress)
VALUES
	("WebMaster", "WebMaster", "Webmaster@boiserock.com");
	
INSERT INTO employee 
	(firstName, lastName, emailAddress)
VALUES
	("Tickets", "Tickets", "Tickets@boiserock.com");
	

INSERT INTO employee 
	(firstName, lastName, emailAddress)
VALUES
	("Spongbob", "Squarepants", "spongbob@boiserock.com");
	
INSERT INTO employee 
	(firstName, lastName, emailAddress)
VALUES
	("Squidward", "Tentacles", "squidward@boiserock.com");

INSERT INTO employee 
	(firstName, lastName, emailAddress)
VALUES
	("Eugene", "Karbs", "mrkrabs@boiserock.com");
	
INSERT INTO employee 
	(firstName, lastName, emailAddress)
VALUES
	("Patrick", "Star", "patrick@boiserock.com");
	
INSERT INTO employee 
	(firstName, lastName, emailAddress)
VALUES
	("Sheldon", "plankton", "plankton@boiserock.com");
	
INSERT INTO employee 
	(firstName, lastName, emailAddress)
VALUES
	("Popeye", "Sailorman", "sailorman@boiserock.com");
	
INSERT INTO employee 
	(firstName, lastName, emailAddress)
VALUES
	("Marvin", "Martian", "marvin@boiserock.com");

INSERT INTO employee 
	(firstName, lastName, emailAddress)
VALUES
	("Daffy", "Duck", "daffyduck@boiserock.com");
	
	
INSERT INTO employee 
	(firstName, lastName, emailAddress)
VALUES
	("Bugs", "Bunny", "bugsbunny@boiserock.com");

INSERT INTO employee 
	(firstName, lastName, emailAddress)
VALUES
	("Mickey", "Mouse", "mickeymouse@boiserock.com");	

INSERT INTO employee 
	(firstName, lastName, emailAddress)
VALUES
	("Minnie", "Mouse", "minniemouse@boiserock.com");	
	
INSERT INTO employee 
	(firstName, lastName, emailAddress)
VALUES
	("Oswald", "Rabbit", "oswald@boiserock.com");	
	
INSERT INTO employee 
	(firstName, lastName, emailAddress)
VALUES
	("Steve", "Jobs", "jobs@boiserock.com");	
	
INSERT INTO employee 
	(firstName, lastName, emailAddress)
VALUES
	("Sonic", "HedgeHog", "sonic@boiserock.com");	
	
	
INSERT INTO employee 
	(firstName, lastName, emailAddress)
VALUES
	("Ivo", "Robotnik", "drrobotnik@boiserock.com");	
	
	
# insert for user message
	
INSERT INTO contactMSG 
	(name, userEmail, userMSG, msgDate, employeeID)
VALUES
	("Darth Vader", "darthvader@deathstar.com", "If you only new the power of the dark side", NOW(), 3);
	
INSERT INTO contactMSG 
	(name, userEmail, userMSG, msgDate, employeeID)
VALUES
	("Han Solo", "HanSolo@millenniumfalcon.com", "greedo shot first", NOW(), 3);
	
INSERT INTO contactMSG 
	(name, userEmail, userMSG, msgDate, employeeID)
VALUES
	("Chewbacca", "chewbacca@millenniumfalcon.com", "hello", NOW(), 3);
	
INSERT INTO contactMSG 
	(name, userEmail, userMSG, msgDate, employeeID)
VALUES
	("Emperor Palpatine", "palpatine@deathstar.com", "I am the senate", NOW(), 3);
	
	
INSERT INTO contactMSG 
	(name, userEmail, userMSG, msgDate, employeeID)
VALUES
	("Governor Tarkin", "grandmofftarkin@deathstar.com", "you may fire when ready", NOW(), 3);
	
INSERT INTO contactMSG 
	(name, userEmail, userMSG, msgDate, employeeID)
VALUES
	("Mario Mario", "mario@themushroonkingdom.com", "its a me mario ", NOW(), 3);
	
	
INSERT INTO contactMSG 
	(name, userEmail, userMSG, msgDate, employeeID)
VALUES
	("Luigi Mario", "luigi@themushroonkingdom.com", "Mario!!!!!", NOW(), 3);
	
INSERT INTO contactMSG 
	(name, userEmail, userMSG, msgDate, employeeID)
VALUES
	("Paul", "paul@arrakis.com", "hello", NOW(), 3);
	
INSERT INTO contactMSG 
	(name, userEmail, userMSG, msgDate, employeeID)
VALUES
	("The Hacker", "thehacker@cyberspace.com", "It is The Hacker to you", NOW(), 3);
INSERT INTO contactMSG 
	(name, userEmail, userMSG, msgDate, employeeID)
VALUES
	("Mother Board", "MotherBoard@cyberspace.com", "defend cyberspace", NOW(), 3);
INSERT INTO contactMSG 
	(name, userEmail, userMSG, msgDate, employeeID)
VALUES
	("Zoboomafoo", "zoboomafoo@animaljunction.com", "zoboomafooooooo!", NOW(), 3);
INSERT INTO contactMSG 
	(name, userEmail, userMSG, msgDate, employeeID)
VALUES
	("Phineas Flynn", "phineasflynn@tristatearea.com", "Freb I know what we are going to do today", NOW(), 3);
INSERT INTO contactMSG 
	(name, userEmail, userMSG, msgDate, employeeID)
VALUES
	("Fren Flynn", "Frebflynn@tristatearea.com", "....", NOW(), 3);
INSERT INTO contactMSG 
	(name, userEmail, userMSG, msgDate, employeeID)
VALUES
	("batman", "darkkinght@thebatcave.com", "I am batman!", NOW(), 3);
INSERT INTO contactMSG 
	(name, userEmail, userMSG, msgDate, employeeID)
VALUES
	("Tony Stark", "ironman@stark.com", "I am Iron man!", NOW(), 3);
	
INSERT INTO contactMSG 
	(name, userEmail, userMSG, msgDate, employeeID)
VALUES
	("Ash Ketchum", "ashketchum@pallettown.com", "I am going to become a pokemon master!", NOW(), 3);
INSERT INTO contactMSG 
	(name, userEmail, userMSG, msgDate, employeeID)
VALUES
	("Red", "red@pallettown.com", "....", NOW(), 3);
INSERT INTO contactMSG 
	(name, userEmail, userMSG, msgDate, employeeID)
VALUES
	("Blue", "blue@pallettown.com", "I am the better Red and Ash", NOW(), 3);
INSERT INTO contactMSG 
	(name, userEmail, userMSG, msgDate, employeeID)
VALUES
	("Lighting McQueen", "lighting@mchqueen.com", "Ka-chow!", NOW(), 3);

INSERT INTO contactMSG 
	(name, userEmail, userMSG, msgDate, employeeID)
VALUES
	("Green goblen", "ceo@osborn.com", "you have spun your last web spiderman", NOW(), 3);

	
