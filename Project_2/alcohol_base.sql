create or replace type AlcoholBaseType as object (
	name varchar2(100),
	drink varchar2(10),
	volume real,
	brand varchar2(100),
	alcohol_content real,
	country varchar2(100),
	rating real,
	MEMBER PROCEDURE display (SELF IN OUT NOCOPY AlcoholBaseType)
) NOT FINAL;
/

CREATE OR REPLACE TYPE BODY AlcoholBaseType IS
	MEMBER PROCEDURE display (SELF IN OUT NOCOPY AlcoholBaseType) IS
	BEGIN
		DBMS_OUTPUT.PUT_LINE('Alcohol ' || name || 'is a ' || drink);
	END;
END;
/
