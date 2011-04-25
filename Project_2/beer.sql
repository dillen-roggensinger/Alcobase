create or replace type BeerType under AlcoholBaseType(
	calories integer,
	type varchar2(100),
	constructor function BeerType(	--BeerType constructor
		a_name varchar2,
		a_did integer,
		a_volume real,
		a_brand varchar2,
		a_alcohol_content real,
		a_country varchar2,
		a_calories integer,
		a_type varchar2,
		a_rating real
	)return self as result
);
/

CREATE OR REPLACE TYPE BODY BeerType IS
	constructor function BeerType(
		a_name varchar2,
		a_did integer,
		a_volume real,
		a_brand varchar2,
		a_alcohol_content real,
		a_country varchar2,
		a_calories integer,
		a_type varchar2,
		a_rating real
	) RETURN SELF AS RESULT
	IS
	BEGIN
		self.name:=a_name;
		self.drink:='beer';
		self.did:=a_did;
		self.volume:=volume;
		self.brand:=brand;
		self.alcohol_content:=a_alcohol_content;
		self.country:=a_country;
		self.calories:=a_calories;
		self.type:=a_type;
		self.rating:=a_rating;
		RETURN;
	END;
END;
/
