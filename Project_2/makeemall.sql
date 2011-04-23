create or replace type alcohol_base as object (
	name varchar2(100),
	drink varchar2(10),
	volume real,
	brand varchar2(100),
	did integer,
	alcohol_content real,
	country varchar2(100),
	calories integer,
	type varchar2(100),
	year integer,
	flavor varchar2(100),
	rating real,
	constructor function alcohol_base(	--Beer constructor
		a_name varchar2,
		a_drink varchar2,
		a_volume real,
		a_brand varchar2,
		a_did integer,
		a_alcohol_content real,
		a_country varchar2,
		a_calories integer,
		a_type varchar2
	)return self as result,
	constructor function alcohol_base(	--Wine/Liquor constructor
		a_name varchar2,
		a_drink varchar2,
		a_volume real,
		a_brand varchar2,
		a_did integer,
		a_alcohol_content real,
		a_country varchar2,
		a_type varchar2,
		a_year integer
	)return self as result,
	constructor function alcohol_base(	--WDrink constructor
		a_name varchar2,
		a_drink varchar2,
		a_volume real,
		a_brand varchar2,
		a_did integer,
		a_alcohol_content real,
		a_country varchar2,
		a_calories integer,
		a_flavor varchar2
	)return self as result,
	MEMBER PROCEDURE display (SELF IN OUT NOCOPY alcohol_base)
);
/

CREATE OR REPLACE TYPE BODY alcohol_base IS
	CONSTRUCTOR FUNCTION alcohol_base(	--Beer constructor
		a_name varchar2,
		a_drink varchar2,
		a_volume real,
		a_brand varchar2,
		a_did integer,
		a_alcohol_content real,
		a_country varchar2,
		a_calories integer,
		a_type varchar2
	) RETURN SELF AS RESULT
	IS
	BEGIN
		self.name:=a_name;
		self.drink:=a_drink;
		self.volume:=volume;
		self.brand:=brand;
		self.alcohol_content:=a_alcohol_content;
		self.country:=a_country;
		self.calories:=a_calories;
		self.type:=a_type;
		self.year:=null;
		self.flavor:=null;
		RETURN;
	END;
	CONSTRUCTOR FUNCTION alcohol_base(	--Wine/Liquor constructor
		a_name varchar2,
		a_drink varchar2,
		a_volume real,
		a_brand varchar2,
		a_did integer,
		a_alcohol_content real,
		a_country varchar2,
		a_type varchar2,
		a_year integer
	) RETURN SELF AS RESULT
	IS
	BEGIN
		self.name:=a_name;
		self.drink:=a_drink;
		self.volume:=volume;
		self.brand:=brand;
		self.alcohol_content:=a_alcohol_content;
		self.country:=a_country;
		self.type:=a_type;
		self.year:=a_year;
		self.calories:=null;
		self.flavor:=null;
		RETURN;
	END;
	CONSTRUCTOR FUNCTION alcohol_base(	--WDrink constructor
		a_name varchar2,
		a_drink varchar2,
		a_volume real,
		a_brand varchar2,
		a_did integer,
		a_alcohol_content real,
		a_country varchar2,
		a_calories integer,
		a_flavor varchar2
	) RETURN SELF AS RESULT
	IS
	BEGIN
		self.name:=a_name;
		self.drink:=a_drink;
		self.volume:=volume;
		self.brand:=brand;
		self.alcohol_content:=a_alcohol_content;
		self.country:=a_country;
		self.calories:=a_calories;
		self.flavor:=a_flavor;
		self.type:=null;
		self.year:=null;
		RETURN;
	END;
	MEMBER PROCEDURE display (SELF IN OUT NOCOPY alcohol_base) IS
	BEGIN
		DBMS_OUTPUT.PUT_LINE('Alcohol ' || did || ' is a ' || drink);
		DBMS_OUTPUT.PUT_LINE('Name: ' || name || ' - Volume: ' || volume || ' - Brand: ' ||
			brand || ' - Alc_Cnt: ' || alcohol_content || ' - Country: ' || country ||
			' - Rating: ' || rating);
		IF drink='Beer' THEN
			DBMS_OUTPUT.PUT_LINE('Calories: ' || calories || ' - Type: ' || type);
		ELSIF drink='Wine' or drink='Liquor' THEN
			DBMS_OUTPUT.PUT_LINE('Type: ' || type || ' - Year: ' || year);
		ELSIF drink='WDrink' THEN
			DBMS_OUTPUT.PUT_LINE('Calories: ' || calories || ' - Flavor: ' || flavor);
		END IF;
	END;
END;
/
