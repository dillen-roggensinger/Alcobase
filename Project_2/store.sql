create or replace type StoreType AS OBJECT (
	store_name varchar2(100),
	store_hours varchar2(200),
	store_type varchar2(100),
	address AddressType
);
/
