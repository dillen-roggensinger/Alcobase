create table bought(
username varchar2(20),
did integer,
quantity integer,
time date,
foreign key (did) references alcohol(did),
foreign key (username) references account(username)
);

alter table bought
add primary key(did,username);

INSERT INTO bought VALUES('ninjaturtles',3,1,to_date('2000/01/23:12:00:00AM', 'yyyy/mm/dd:hh:mi:ssam'));
INSERT INTO bought VALUES('sexytime',4,2,to_date('2010/02/21:12:00:00AM', 'yyyy/mm/dd:hh:mi:ssam'));
INSERT INTO bought VALUES('sexytime',8,1,to_date('2009/01/23:10:00:00PM', 'yyyy/mm/dd:hh:mi:ssam'));
INSERT INTO bought VALUES('ragingbull',10,3,to_date('2011/03/18:11:32:00AM', 'yyyy/mm/dd:hh:mi:ssam'));
INSERT INTO bought VALUES('ragingbull',12,2,to_date('2009/02/11:02:11:20AM', 'yyyy/mm/dd:hh:mi:ssam'));
INSERT INTO bought VALUES('cookiemonster',19,1,to_date('2008/08/02:03:23:12PM', 'yyyy/mm/dd:hh:mi:ssam'));
INSERT INTO bought VALUES('friday',20,5,to_date('2008/09/22:02:53:23PM', 'yyyy/mm/dd:hh:mi:ssam'));
INSERT INTO bought VALUES('mysticshadow',25,6,to_date('2010/08/12:03:43:12AM', 'yyyy/mm/dd:hh:mi:ssam'));
INSERT INTO bought VALUES('cookiemonster',35,1,to_date('2009/06/22:04:13:12PM', 'yyyy/mm/dd:hh:mi:ssam'));
INSERT INTO bought VALUES('bigdaddy',39,1,to_date('2011/02/21:12:54:16PM', 'yyyy/mm/dd:hh:mi:ssam'));
INSERT INTO bought VALUES('trollolol',41,1,to_date('2009/03/01:01:12:32PM', 'yyyy/mm/dd:hh:mi:ssam'));
