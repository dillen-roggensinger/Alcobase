create table write_comment(
text varchar2(1000) not null,
time date,
username varchar2(20),
did integer,
foreign key (username) references account(username) on delete cascade,
foreign key (did) references alcohol(did) on delete cascade
);

alter table write_comment
add primary key(username,did,time);

INSERT INTO write_comment VALUES('Silly hats only',to_date('2010/01/23:12:00:00AM', 'yyyy/mm/dd:hh:mi:ssam'),'ninjaturtles',1);
INSERT INTO write_comment VALUES('I was hanging with the fellas',to_date('2010/05/31:12:00:00AM', 'yyyy/mm/dd:hh:mi:ssam'),'friday',2);
INSERT INTO write_comment VALUES('Saw you with your new boyfriend',to_date('2011/01/12:03:23:00PM', 'yyyy/mm/dd:hh:mi:ssam'),'bigdaddy',2);
INSERT INTO write_comment VALUES('Made me jealous',to_date('2005/05/21:04:34:20PM', 'yyyy/mm/dd:hh:mi:ssam'),'babycakes',5);
INSERT INTO write_comment VALUES('Who that is at the do',to_date('2009/08/01:02:34:35PM', 'yyyy/mm/dd:hh:mi:ssam'),'babycakes',5);
INSERT INTO write_comment VALUES('See what had happened was',to_date('2009/10/21:09:20:05PM', 'yyyy/mm/dd:hh:mi:ssam'),'trollolol',6);
INSERT INTO write_comment VALUES('Sunday comes afterwards',to_date('2010/02/20:07:00:00AM', 'yyyy/mm/dd:hh:mi:ssam'),'ninjaturtles',7);
INSERT INTO write_comment VALUES('Yesterday was Thursday Thursday.',to_date('2001/05/28:12:34:00AM', 'yyyy/mm/dd:hh:mi:ssam'),'ragingbull',8);
INSERT INTO write_comment VALUES('Today it is Friday Friday',to_date('2008/02/21:04:12:00PM', 'yyyy/mm/dd:hh:mi:ssam'),'friday',3);
INSERT INTO write_comment VALUES('We, we, we so excited we so excited',to_date('2011/03/24:11:23:11AM', 'yyyy/mm/dd:hh:mi:ssam'),'trollolol',10);
INSERT INTO write_comment VALUES('Tomorrow it is Saturday',to_date('2009/01/11:10:30:10AM', 'yyyy/mm/dd:hh:mi:ssam'),'sexytime',23);
