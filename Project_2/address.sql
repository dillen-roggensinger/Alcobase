create or replace type AddressType AS OBJECT (
	street VARCHAR2(30),
	city   VARCHAR2(15),
	state  CHAR(2),
	zip    VARCHAR2(5)
);
/
