create or replace type AlcoholBaseType as object (
	name varchar2(100),
	drink varchar2(10),
	did integer,
	volume real,
	brand varchar2(100),
	alcohol_content real,
	country varchar2(100),
	rating real,
	MEMBER PROCEDURE display,
	MEMBER FUNCTION isequalto(other AlcoholBaseType) RETURN NUMBER,
	MEMBER FUNCTION ispopular RETURN NUMBER
)INSTANTIABLE NOT FINAL;
/

CREATE OR REPLACE TYPE BODY AlcoholBaseType IS
	MEMBER PROCEDURE display (SELF IN OUT NOCOPY AlcoholBaseType) IS
	BEGIN
		DBMS_OUTPUT.PUT_LINE('Alcohol ' || did || ', ' || name || ' is a ' || drink);
	END;
	MEMBER FUNCTION isequalto(other AlcoholBaseType)RETURN NUMBER IS
		false_value NUMBER := 0;
		true_value  NUMBER := 1;
	BEGIN
		IF SELF.name = other.name AND SELF.drink = other.drink THEN
			RETURN true_value;
		ELSE
			RETURN false_value;
		END IF;
	END;
	MEMBER FUNCTION ispopular RETURN NUMBER IS
		false_value NUMBER := 0;
		true_value  NUMBER := 1;
	BEGIN
		IF SELF.rating > 4 THEN
			RETURN true_value;
		ELSE
			RETURN false_value;
		END IF;
	END;
END;
/
