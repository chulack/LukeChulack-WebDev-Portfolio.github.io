-- project3 by Luke Chulackc

-- ******************************************************************************************** --
--    Date          Programer           Description
-- ------------    ----------       -----------------
--  10/8/2021       Luke Chulack     -- Creating the database, -- uses/login, and tables for the disk_inventorylc project --
--  10/15/2021       Luke Chulack     -- fixed proplems pointed out in feed back, add inserts for intersection tables  and all other tables --

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
description            char(16)     NOT NULL);
go


Create Table genre
(genreID                 INT          NOT NULL IDENTITY primary key,
description            char(16)     NOT NULL);
go


Create Table status
(statusID                 INT          NOT NULL IDENTITY primary key,
description            char(16)     NOT NULL);
go


Create Table artistType
(artistTypeID                 INT          NOT NULL IDENTITY primary key,
description            char(16)     NOT NULL);
go



-- The making of the meida tables which  will have one to many relationships with the lookup tables of mediaType, status, and genre. This is also with 2 many to many relationships which are  borrower ( using the mediaIntersectiontable )  and artist ( using the artistIntersectionTable )
use disk_inventorylc;
go


Create Table media
(
mediaID                 INT          NOT NULL Identity primary key,
mediaName            varchar(60)     NOT NULL,
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
	artistFname nchar(60) not null,
	artistLname nchar(60) null,
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

-- the inserts


-- look up table inserts 

INSERT INTO mediaType (description)
VALUES 
  ('CD'),
  ('Vinyl'),
  ('8Track'),
  ('Cassette'),
  ('DVD'),
  ('Digital');
go

 INSERT INTO genre (description)
VALUES 
  ('Pop'),
  ('Techno'),
  ('Rock'),
  ('jazz'),
  ('Indie'),
  ('Country');
go

 INSERT INTO status (description)
VALUES 
  ('Available'),
  ('On loan'),
  ('Damaged'),
  ('Missing'),
  ('Out of stock');
go


 INSERT INTO artistType (description)
VALUES 
  ('solo'),
  ('group');
go


--  media table insert



 INSERT INTO media (mediaName,releseDate,genreID,statusID,mediaTypeID)
VALUES 
  ('Thank God Im a Country Boy',
  '8/26/1976',
  6, 
  1,
  1), -- 1
  
  ('Sk8ter boy',
  '8/27/2002',
  1, 
  1,
  1), -- 2
   ('Dynamite',
  '5/30/2010',
  1, 
  2,
  1), --3
    ('Fiji Water',
  '7/01/2017',
  1, 
  1,
  1),  -- 4
     ('Jabberjaw',
  '5/31/2001',
  5, 
  1,
  1), -- 5
   ('Sweet Home Alabama',
  '6/24/1974',
  6, 
  1,
  1), -- 6
  
  ('House Of The Rising Sun',
  '8/08/1964',
  6, 
  1,
  1), -- 7
   ('Dont Fear The Reaper',
  '7/30/1975',
  1, 
  1,
  1), --8
    ('More Than a Feeling',
  '9/15/1976',
  1, 
  1,
  1),  -- 9
     ('American Pie',
  '5/26/1971',
  3, 
  1,
  1), -- 10
  ('Little Willy',
  '9/08/1972',
  3, 
  1,
  1), -- 11
   ('Lifes Been Good',
  '5/15/1978',
  3, 
  1,
  1), --12
    (' Dreamscape',
  '6/06/2009',
  2, 
  1,
  1),  -- 13
     ('Walking on Broken Glass',
  '8/22/1992',
  1, 
  1,
  1),  -- 14
       ('Cyberchase Theme Song',
  '1/21/2002',
  2, 
  1,
  1), -- 15
  ('September',
  '11/23/1978',
  3, 
  1,
  1), -- 16
   ('Mr. Blue Sky',
  '11/13/1977',
  3, 
  1,
  1), --17
    (' Everybody Wants To Rule',
  '3/18/1985',
  1, 
  1,
  1),  -- 18
     ('Take On Me',
  '10/19/1984',
  1, 
  1,
  1),  -- 19
     ('Mad World',
  '8/22/2004',
  1, 
  1,
  1),  -- 20
     ('Forgotten',
  '8/22/2004',
  1, 
  1,
  1)  -- 21
    ;
go


update media SET media.releseDate = '8/22/2003' where media.mediaName = 'Mad World';
go

--  borrower table insert


 INSERT INTO borrower(fname,lname,borrowerPhoneNum)
VALUES 
  ('Mickey',
  'mouse', '555-555-5555'), -- 1

   ('Darth',
  'Vader', '800-123-4567'), -- 2

  ('Elon',
  'Musk', '877-798-3752'), -- 3

  ('The', 'Hacker', '292-372-4273'), -- 4

  ('Spongbob', 'Sqarepants', '746-327-7537'), -- 5

 ('Marvin',
  'martian', '555-123-6277'), -- 6

   ('Sheev',
  'Palpatine', '142-673-6283'), -- 7

  ('Wilhuff',
  'Tarkin', '333-284-7827'), -- 8

  ('Ivo', 'Robotnik', '123-777-2642'), -- 9

  ('Sheldon', 'Plankton', '248-628-2538'), -- 10 ;

  ('Blue', 'Clues', '258-325-8370'), -- 11

 ('Eugene',
  'Krabs', '578-789-5722'), -- 12

   ('Steve',
  'Jobs', '800-275-2273'), -- 13

  ('Stephen',
  'Hillenburg', '924-777-7753'), -- 14

  ('Tom', 'Kenny', '193-964-7542'), -- 15

  ('Squidward', 'Tentacles', '321-278-4787'), -- 16 ;
  ('Gavin',
  'Lee', '408-560-9460'), -- 17

  ('Tom',
  'Anderson', '920-697-7223'), -- 18

  ('William', 'Wallace', '243-246-1863'), -- 19

  ('Bill', 'Cypher', '228-927-9786') -- 20 ;


go

-- delete statment for borrower whos id is 6 
DELETE borrower
WHERE borrowerID = 6;
go

--  artist table insert


 INSERT INTO artist(artistFname, artistLname, artistTypeID)
VALUES 
  ('John',
  'Denver',
  1), -- 1
   ('Avril',
  'Lavigne',
  1), -- 2
   ('Taio',
  'Cruz',
  1), -- 3
   ('Owl City',
  '',
  1), --4
   ('Pain',
  '',
  2), --5
   ('Lynyrd Skynyrd',
  '',
  2), -- 6
   ('Animals',
  '',
  2), -- 7
   ('Blue Öyster Cult',
  '',
 2), -- 8
   ('Boston',
  '',
  2), --9
   ('Don',
  'McLean',
  1), --10 

  ('The Sweet',
  '',
  2), -- 11
   ('Joe',
  'Walsh',
  1), -- 12
   ('Alexanderc',
  'Perls
  ',
  1), -- 13
   ('Annie',
  'Lennox',
  1), -- 14
   ('Steve ',
  'Pecile',
  1), -- 15
   ('Earth, Wind & Fire',
  '',
  2), -- 16
   ('Electric Light Orchestra',
  '',
  2), -- 17
   ('Tears For Fears',
  '',
 2), -- 18
   ('a-ha',
  '',
  2), -- 19
   ('Gary 
',
  'Jules',
  1), -- 20
   ('David 
',
  'Shaw',
  1) -- 21
  ;
go


--  media Intersection table insert


 INSERT INTO mediaIntersectiontable(borrowerID,mediaID,borrowedDate,returnedDate)
VALUES 
  (1,
  1,
  '1-2-2012', 
  '2-15-2012'), -- 1
   (2,
  2,
  '8-2-2019', 
  '9-15-2019'), -- 2 
   (5,
  11,
  '12-22-2014', 
  '1-2-2015'), --  3 
   (7,
  3,
  '9-15-2021', 
  null), -- 4
   (17,
  13,
  '5-8-2019', 
  '6-22-2019'), -- 5 
   (13,
  10,
  '12-29-2016', 
  '2-15-2017'), -- 6
  (13,
  10,
  '3-2-2017', 
  '3-14-2017'), -- 7
   (16,
  16,
  '2-7-2012', 
  '2-17-2012'), -- 8
   (13,
  11,
  '5-5-2012', 
  '6-15-2012'), --  9
   (13,
  11,
  '12-2-2013', 
  '12-19-2013'), -- 10
  (10,
  1,
  '12-4-2020', 
  '1-1-2021'), -- 11
   (10,
  5,
  '1-6-2002', 
  '2-3-2002'), -- 12 
   (4,
  4,
  '8-4-2018', 
  '10-5-2018'), --  13 
   (1,
  1,
  '1-2-2003', 
  '2-15-2004'), -- 14
   (1,
  2,
  '3-2-2014', 
  '3-7-2014'), -- 15 
   (7,
  1,
  '12-2-1999', 
  '2-15-2000'), -- 16
  (2,
  10,
  '12-29-1998', 
  '1-15-1999'), -- 17
   (3,
  17,
  '7-30-2005', 
  '8-3-2005'), -- 18
   (3,
  17,
  '11-30-2008', 
  '1-2-2009'), --  19
   (1,
  1,
  '11-2-1999', 
  '11-5-1999'), -- 20
    (20,
  21,
  '12-8-2006', 
  '12-12-2006') -- 21
  ;
go


--  media Intersection table insert


 INSERT INTO artistIntersectionTable(mediaID,artistID)
VALUES 
  (1,
  1), -- 1
   (2,
  2), -- 2
   (3,
  3), -- 3
   (4,
  4), -- 4
   (5,
  5), -- 5
   (6,
  6), -- 6
   (7,
  7), -- 7
   (8,
  8), -- 8
   (9,
  9), -- 9
   (10,
  10), -- 10

  (11,
  11), -- 11
   (12,
  12), -- 12
   (13,
  13), -- 13
   (14,
  14), -- 14
   (15,
  15), -- 15
   (16,
  16), -- 16
   (17,
  17), -- 17
   (18,
  18), -- 18
   (19,
  19), -- 19
   (20,
  20), -- 20
(15,
21), -- 21
(21,
2) --22
  ;
go

select * from mediaIntersectiontable where returnedDate  is null; 
