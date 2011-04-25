create or replace type AddressType AS OBJECT (
	street VARCHAR2(100),
	city VARCHAR2(100),
	state CHAR(2),
	zip VARCHAR2(10)
	MEMBER FUNCTION chkAddrs(addr1 AddressType, addr2 AddressType)
);
/

CREATE OR REPLACE TYPE BODY AddressTypeFUNCTION chkAddrs (addr1 address, addr2 address)
    RETURN BOOLEAN
    IS
BEGIN
    RETURN (addr1.zip_code == addr2.zip_code) AND (addr1.street == addr2.street)
END chkAddrs; 
