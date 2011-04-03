create table sold_at(
location varchar2(200),
store_name varchar2(100),
store_hours varchar2(200),
store_type varchar2(100),
did integer,
quantity integer not null,
price real,
foreign key (did) references alcohol(did)
);

alter table sold_at
add primary key(location,store_name,price,did);


INSERT INTO sold_at VALUES('2903 Broadway New York NY 10025','International Wine and Spirits','Mon-Sat: 11:00 am - 10:00 pm','Liquor Store',2,1,22.99);
INSERT INTO sold_at VALUES('2903 Broadway New York NY 10025','International Wine and Spirits','Mon-Sat: 11:00 am - 10:00 pm','Liquor Store',22,1,24.99);
INSERT INTO sold_at VALUES('2903 Broadway New York NY 10025','International Wine and Spirits','Mon-Sat: 11:00 am - 10:00 pm','Liquor Store',24,1,34.99);
INSERT INTO sold_at VALUES('2903 Broadway New York NY 10025','International Wine and Spirits','Mon-Sat: 11:00 am - 10:00 pm','Liquor Store',31,1,35.99);
INSERT INTO sold_at VALUES('2903 Broadway New York NY 10025','International Wine and Spirits','Mon-Sat: 11:00 am - 10:00 pm','Liquor Store',8,1,40.99);
INSERT INTO sold_at VALUES('3139 Broadway New York NY 10027','Jiminez Ramon','Mon-Sat: 11:00 am - 10:00 pm','Liquor Store',27,1,100);
INSERT INTO sold_at VALUES('3139 Broadway New York NY 10027','Jiminez Ramon','Mon-Sat: 11:00 am - 10:00 pm','Liquor Store',30,1,32);
INSERT INTO sold_at VALUES('3139 Broadway New York NY 10027','Jiminez Ramon','Mon-Sat: 11:00 am - 10:00 pm','Liquor Store',31,1,35);
INSERT INTO sold_at VALUES('3139 Broadway New York NY 10027','Jiminez Ramon','Mon-Sat: 11:00 am - 10:00 pm','Liquor Store',5,1,15);
INSERT INTO sold_at VALUES('3139 Broadway New York NY 10027','Jiminez Ramon','Mon-Sat: 11:00 am - 10:00 pm','Liquor Store',25,1,30);
INSERT INTO sold_at VALUES('2941 Broadway New York NY 10027','Morton Williams','24/7','Grocery Store',6,1,12.99);
INSERT INTO sold_at VALUES('2941 Broadway New York NY 10027','Morton Williams','24/7','Grocery Store',11,6,12.99);
INSERT INTO sold_at VALUES('2941 Broadway New York NY 10027','Morton Williams','24/7','Grocery Store',14,6,13.99);
INSERT INTO sold_at VALUES('2941 Broadway New York NY 10027','Morton Williams','24/7','Grocery Store',18,6,11.99);
INSERT INTO sold_at VALUES('1225 Amsterdam Avenue New York NY 10027','Apple Tree Supermarket','24/7','Grocery Store',11,6,11.99);
INSERT INTO sold_at VALUES('1225 Amsterdam Avenue New York NY 10027','Apple Tree Supermarket','24/7','Grocery Store',12,6,11.99);
INSERT INTO sold_at VALUES('1225 Amsterdam Avenue New York NY 10027','Apple Tree Supermarket','24/7','Grocery Store',17,6,12.99);
INSERT INTO sold_at VALUES('1225 Amsterdam Avenue New York NY 10027','Apple Tree Supermarket','24/7','Grocery Store',3,6,14.99);
INSERT INTO sold_at VALUES('990 Amsterdam Avenue New York NY 10025','Gourmet Deli Inc','24/7','Deli',13,6,10.99);
INSERT INTO sold_at VALUES('990 Amsterdam Avenue New York NY 10025','Gourmet Deli Inc','24/7','Deli',18,6,10.99);
INSERT INTO sold_at VALUES('990 Amsterdam Avenue New York NY 10025','Gourmet Deli Inc','24/7','Deli',15,6,11.99);
INSERT INTO sold_at VALUES('990 Amsterdam Avenue New York NY 10025','Gourmet Deli Inc','24/7','Deli',20,6,10.99);
