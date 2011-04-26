create or replace type StoreType AS OBJECT (
	sid integer,
	store_name varchar2(100),
	store_hours varchar2(200),
	store_type varchar2(100),
	address AddressType,
	MEMBER PROCEDURE display,
	MEMBER FUNCTION isequalto(other StoreType) RETURN NUMBER
) INSTANTIABLE NOT FINAL;
/

CREATE OR REPLACE TYPE BODY StoreType IS
	MEMBER PROCEDURE display (SELF IN OUT NOCOPY AddressType) IS
	BEGIN
		DBMS_OUTPUT.PUT_LINE(store_name || ' is a ' || store_type);
		DBMS_OUTPUT.PUT_LINE(store_hours);
		address.display;
	END;
	MEMBER FUNCTION isequalto(other StoreType)RETURN NUMBER IS
		false_value NUMBER := 0;
		true_value  NUMBER := 1;
	BEGIN
		IF SELF.store_name = other.store_name AND SELF.address.isequalto(other.address) = true_value THEN
			RETURN true_value;
		ELSE
			RETURN false_value;
		END IF;
	END;
END;
/
