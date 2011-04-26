create or replace type AddressType AS OBJECT (
	street VARCHAR2(100),
	city VARCHAR2(100),
	state CHAR(2),
	zip VARCHAR2(10),
	MEMBER PROCEDURE display,
	MEMBER FUNCTION isequalto(other AddressType) RETURN NUMBER
) INSTANTIABLE NOT FINAL;
/

CREATE OR REPLACE TYPE BODY AddressType IS
	MEMBER PROCEDURE display (SELF IN OUT NOCOPY AddressType) IS
	BEGIN
		DBMS_OUTPUT.PUT_LINE(street);
		DBMS_OUTPUT.PUT_LINE(city || ', ' || state || ', ' || zip);
	END;
	MEMBER FUNCTION isequalto(other AddressType)RETURN NUMBER IS
		false_value NUMBER := 0;
		true_value  NUMBER := 1;
	BEGIN
		IF SELF.street = other.street AND SELF.zip = other.zip   THEN
			RETURN true_value;
		ELSE
			RETURN false_value;
		END IF;
	END;
END;
/
