create table write_comment(
text varchar2(1000) not null,
time date,
aid integer,
did integer,
foreign key (aid) references account(aid) on delete cascade,
foreign key (did) references alcohol(did) on delete cascade
);

alter table write_comment
add primary key(aid,did,time);

INSERT INTO write_comment VALUES('Silly hats only','13-JAN-11',3,1);
INSERT INTO write_comment VALUES('I was hanging with the fellas','23-FEB-11',1,2);
INSERT INTO write_comment VALUES('Saw you with your new boyfriend','03-MAR-11',5,2);
INSERT INTO write_comment VALUES('Made me jealous','15-FEB-11',8,5);
INSERT INTO write_comment VALUES('Who that is at the do','23-FEB-11',2,5);
INSERT INTO write_comment VALUES('See what had happened was','30-MAR-11',4,6);
INSERT INTO write_comment VALUES('Sunday comes afterwards','21-JAN-11',10,7);
INSERT INTO write_comment VALUES('Yesterday was Thursday Thursday.','12-FEB-11',2,8);
INSERT INTO write_comment VALUES('Today it is Friday Friday','05-JAN-11',3,3);
INSERT INTO write_comment VALUES('We, we, we so excited we so excited','08-FEB-11',7,10);
INSERT INTO write_comment VALUES('Tomorrow it is Saturday','13-JAN-11',2,23);
