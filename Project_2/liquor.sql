create or replace type LiquorType under AlcoholBaseType(
	type varchar2(100),
	year integer,
	constructor function LiquorType(	--LiquorType constructor
		a_name varchar2,
		a_volume real,
		a_brand varchar2,
		a_alcohol_content real,
		a_country varchar2,
		a_type varchar2,
		a_year integer,
		a_rating real
	)return self as result
);
/

CREATE OR REPLACE TYPE BODY LiquorType IS
	constructor function LiquorType(
		a_name varchar2,
		a_volume real,
		a_brand varchar2,
		a_alcohol_content real,
		a_country varchar2,
		a_type varchar2,
		a_year integer,
		a_rating real
	) RETURN SELF AS RESULT
	IS
	BEGIN
		self.name:=a_name;
		self.drink:='liquor';
		self.volume:=volume;
		self.brand:=brand;
		self.alcohol_content:=a_alcohol_content;
		self.country:=a_country;
		self.type:=a_type;
		self.year:=a_year;
		self.rating:=a_rating;
		RETURN;
	END;
END;
/
