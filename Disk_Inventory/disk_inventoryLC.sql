-- project2 by Luke Chulackc

-- ******************************************************************************************** --
--    Date          Programer           Description
-- ------------    ----------       -----------------
--  10/8/2021       Luke Chulack     -- Creating the database, -- uses/login, and tables for the disk_inventorylc project --
-- ******************************************************************************************** --

-- create database
use master;
go

Drop database if exists disk_inventorylc;
go
create database disk_inventorylc;

go

-- create login for new database user

Use master;
go

If SUSER_ID('diskUserLC') is null
	Create Login diskUserLC WITH PASSWORD = 'MSPress#1',
		 DEFAULT_DATABASE = disk_inventorylc;
go

-- create new database user

use disk_inventorylc;
go
CREATE USER diskUserLC;
go

-- add privileges for  user

use disk_inventorylc;
go

ALTER ROLE db_datareader ADD MEMBER diskUserLC;
go


-- the making of the look up tables mediaType, genre, status, artistType for the Media element
use disk_inventorylc;
go


Create Table mediaType
(mediaTypeID                 INT          NOT NULL IDENTITY primary key,
description            char(10)     NOT NULL);
go


Create Table genre
(genreID                 INT          NOT NULL IDENTITY primary key,
description            char(10)     NOT NULL);
go


Create Table status
(statusID                 INT          NOT NULL IDENTITY primary key,
description            char(10)     NOT NULL);
go


Create Table artistType
(artistTypeID                 INT          NOT NULL IDENTITY primary key,
description            char(10)     NOT NULL);
go



-- The making of the meida tables which  will have one to many relationships with the lookup tables of mediaType, status, and genre. This is also with 2 many to many relationships which are  borrower ( using the mediaIntersectiontable )  and artist ( using the artistIntersectionTable )
use disk_inventorylc;
go


Create Table media
(
mediaID                 INT          NOT NULL Identity primary key,
mediaName            char(10)     NOT NULL,
releseDate DATE NOT NULL,
genreID  INT NOT NULL References genre (genreID) ,
statusID INT NOT NULL References status (statusID),
mediaTypeID INT  NOT NULL References mediaType (mediaTypeID) );
go


-- the making of borrower with 1 many to many relationship with  media ( using the mediaIntersectiontable ) 
 use disk_inventorylc;
 go

 Create Table borrower(
	borrowerID int not null Identity primary key,
	fname char(60) not null,
	lname char(60) not null,
	borrowerPhoneNum char(16) not null
 );
 go
-- the making of aritist  with 1 many to many relationship with  media ( using the artistIntersectionTable )  and a one to many relationship  with artistType

 use disk_inventorylc;
 go

 Create Table artist(
	artistID int not null Identity primary key,
	artistNmae char(60) not null,
	artistTypeID int not null References artistType (artistTypeID)
 );
 go


-- the making  ofthe intersection tables of mediaIntersectiontable and artistIntersectionTable
use disk_inventorylc;
 go


Create Table mediaIntersectiontable(
	mediaIntersectionID int not null Identity primary key,
	mediaID int not null References media (mediaID),
	borrowerID int not null References borrower (borrowerID),
	returnedDate Date null,
	borrowedDate Date not null



);
go

Create Table artistIntersectionTable(
	artistIntersectionID int not null Identity primary key,
	mediaID int not null References media (mediaID),
	artistID int not null References artist (artistID)

);
go