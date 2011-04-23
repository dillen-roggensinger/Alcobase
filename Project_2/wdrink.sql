create or replace type WDrinkType under AlcoholBaseType(
	calories integer,
	flavor varchar2(100),
	constructor function WDrinkType(	--WDrinkType constructor
		a_name varchar2,
		a_volume real,
		a_brand varchar2,
		a_alcohol_content real,
		a_country varchar2,
		a_calories integer,
		a_flavor varchar,
		a_rating real
	)return self as result
);
/

CREATE OR REPLACE TYPE BODY WDrinkType IS
	constructor function WDrinkType(
		a_name varchar2,
		a_volume real,
		a_brand varchar2,
		a_alcohol_content real,
		a_country varchar2,
		a_calories integer,
		a_flavor varchar,
		a_rating real
	) RETURN SELF AS RESULT
	IS
	BEGIN
		self.name:=a_name;
		self.drink:='wdrink';
		self.volume:=volume;
		self.brand:=brand;
		self.alcohol_content:=a_alcohol_content;
		self.country:=a_country;
		self.calories:=a_calories;
		self.flavor:=a_flavor;
		self.rating:=a_rating;
		RETURN;
	END;
END;
/
