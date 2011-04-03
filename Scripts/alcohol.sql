create table alcohol(
name varchar2(100) not null,
drink varchar2(10) not null,
volume real,
brand varchar2(100),
did integer primary key,
alcohol_content real,
country varchar2(100),
calories integer,
type varchar2(100),
year integer,
flavor varchar2(100),
rating real
);



INSERT INTO alcohol VALUES('Abadia Retuerta Seleccion Especial','Wine',750,'Abadia Retuerta',2,11.5,'Spain',null,'Sardon De Duero',2007,null,3.938);
INSERT INTO alcohol VALUES('Aardvark Cameros Pinot Noir','Wine',750,'Aardvark',1,12.5,'France',null,'Pinot Noir',2005,null,4.292);
INSERT INTO alcohol VALUES('Abbaye Saint Hilarie Cuvee du Prieur','Wine',750,'Abbaye Saint',3,12,'France',null,'Bordeaux',2006,null,4.212);
INSERT INTO alcohol VALUES('Acinum Chianti DOCG','Wine',750,'Acinum',4,11.75,'Italy',null,'Sangiovese',2009,null,3.437);
INSERT INTO alcohol VALUES('Adega de Pegoes Red','Wine',750,'Adega de Pegoes',5,12.5,'Spain',null,'Red',2007,null,3.582);
INSERT INTO alcohol VALUES('Alfredo Prunotto Barolo Bussia','Wine',750,'Alfredo Prunotto',6,12.5,'Italy',null,'Nebbiolo',2001,null,4.692);
INSERT INTO alcohol VALUES('Allegrini Amarone Classico','Wine',750,'Amarone',7,12,'Italy',null,'Red',2005,null,4.421);
INSERT INTO alcohol VALUES('Alma Rosa Pinot Noir','Wine',750,'Alma Rosa',8,11.4,'America',null,'Pinot Noir',2006,null,4.358);
INSERT INTO alcohol VALUES('The Lash Spiced Rum','Liquor',750,'The Lash',25,35,'Brazil',null,'Rum',2010,null,4.056);
INSERT INTO alcohol VALUES('Dewars Signature Blend','Liquor',750,'Dewars',26,43,'Ireland',null,'Scotch',2001,null,4.219);
INSERT INTO alcohol VALUES('Johnnie Walker Black Label','Liquor',750,'Johnnie Walker',27,43,'Scotland',null,'Scotch',1996,null,4.551);
INSERT INTO alcohol VALUES('Don Julio Silver','Liquor',750,'Don Julio',28,40,'Spain',null,'Tequila',2005,null,4.651);
INSERT INTO alcohol VALUES('Bakon Vodka','Liquor',750,'Black Rock Spirits',29,40,'America',null,'Vodka',2010,null,4.912);
INSERT INTO alcohol VALUES('Grey Goose Vodka','Liquor',750,'Grey Goose',30,40,'France',null,'Vodka',2010,null,4.652);
INSERT INTO alcohol VALUES('Elmer T. Lee Single Barrel Bourbon','Liquor',750,'Elmer T. Lee',31,45,'Ireland',null,'Whiskey',2005,null,4.132);
INSERT INTO alcohol VALUES('Altesino Brunello di Montalcino','Wine',750,'Altesino',9,11.9,'Italy',null,'Brunello',2005,null,4.558);
INSERT INTO alcohol VALUES('Red Dog','Beer',12,'Miller',11,5,'America',130,'Lager',null,null,3.543);
INSERT INTO alcohol VALUES('Molson XXX','Beer',12,'Molson',12,4.8,'Canada',120,'Lager',null,null,3.913);
INSERT INTO alcohol VALUES('Bass Ale','Beer',12,'Bass Brewery',13,4.9,'England',125,'Ale',null,null,4.032);
INSERT INTO alcohol VALUES('Carlsberg Elephant','Beer',12,'Carlsberg Group',14,5,'Denmark',140,'Lager',null,null,4.123);
INSERT INTO alcohol VALUES('Fischer Amber','Beer',12,'Heinken',15,6,'France',135,'Lager',null,null,4.346);
INSERT INTO alcohol VALUES('Becks','Beer',12,'Becks Brewery',16,5,'Germany',130,'Pale Lager',null,null,4.132);
INSERT INTO alcohol VALUES('Schneider Weisse Original','Beer',12,'Schneider Weisse',17,5.4,'Germany',130,'Ale',null,null,4.231);
INSERT INTO alcohol VALUES('Kingfischer Lager','Beer',12,'United Breweries Group',18,5,'India',120,'Lager',null,null,4.321);
INSERT INTO alcohol VALUES('Sapporo Draft','Beer',12,'Sapporo Brewery',19,4.9,'Japan',125,'Lager',null,null,4.172);
INSERT INTO alcohol VALUES('Corona','Beer',12,'Cerveceria Modelo',20,4.6,'Mexico',120,'Light',null,null,3.98);
INSERT INTO alcohol VALUES('Alexander Platinum Grappa Veneto','Liquor',750,'Alexander',21,40,'Italy',null,'Brandy',2010,null,4.56);
INSERT INTO alcohol VALUES('Bauchant Orange Liqueur France','Liquor',750,'Bauchant',22,20,'France',null,'Cognac',2009,null,4.102);
INSERT INTO alcohol VALUES('Tub Dry Gin','Liquor',750,'Tub',23,40,'America',null,'Gin',2010,null,3.919);
INSERT INTO alcohol VALUES('10 Cane Rum','Liquor',750,'10 Cane',24,40,'Jamaica',null,'Rum',2011,null,4.19);
INSERT INTO alcohol VALUES('Altesino Brunello di Montalcino Riserva','Wine',750,'Altesino',10,11,'Italy',null,'Brunello',2003,null,4.582);
INSERT INTO alcohol VALUES('Smirnoff Ice Triple Black','WDrink',12,'Diageo',32,4.5,'England',220,null,null,'Lime',4.135);
INSERT INTO alcohol VALUES('Smirnoff Ice Watermelon','WDrink',12,'Diageo',33,4.5,'England',215,null,null,'Watermelon',4.612);
INSERT INTO alcohol VALUES('Smirnoff Ice Pomegranate','WDrink',12,'Diageo',34,5.5,'England',220,null,null,'Pomegranate',3.819);
INSERT INTO alcohol VALUES('Smirnoff Black Ice','WDrink',12,'Diageo',35,7,'England',220,null,null,'Blackberry',4.192);
INSERT INTO alcohol VALUES('Smirnoff Ice Raspberry Burst','WDrink',12,'Diageo',36,5,'England',225,null,null,'Raspberry',3.913);
INSERT INTO alcohol VALUES('Mikes Hard Lemonade','WDrink',12,'Mikes Hard Lemonade Co.',37,5,'America',222,null,null,'Lemonade',3.991);
INSERT INTO alcohol VALUES('Mikes Harder Lemonade','WDrink',12,'Mikes Hard Lemonade Co.',38,8,'America',230,null,null,'Lemonade',4.155);
INSERT INTO alcohol VALUES('Mikes Mike-arita','WDrink',12,'Mikes Hard Lemonade Co.',39,10,'America',225,null,null,'Lime',4.231);
INSERT INTO alcohol VALUES('Mikes Hard Mango Punch','WDrink',12,'Mikes Hard Lemonade Co.',40,5.5,'America',225,null,null,'Mango',4.291);
INSERT INTO alcohol VALUES('Mikes Hard Fruit Punch','WDrink',12,'Mikes Hard Lemonade Co.',41,5.5,'America',225,null,null,'Fruit Punch',4.173);
