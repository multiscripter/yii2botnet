create table ticket (
id int unsigned not null primary key auto_increment,
user_id int not null,
type tinyint not null
);

insert into ticket (user_id, type) values (1, 1);
insert into ticket (user_id, type) values (1, 2);
insert into ticket (user_id, type) values (1, 3);
insert into ticket (user_id, type) values (1, 4);
insert into ticket (user_id, type) values (2, 1);
insert into ticket (user_id, type) values (2, 2);
insert into ticket (user_id, type) values (2, 3);
insert into ticket (user_id, type) values (3, 1);
insert into ticket (user_id, type) values (3, 2);
insert into ticket (user_id, type) values (4, 4);/* only PRE-PARTY */
insert into ticket (user_id, type) values (5, 2);
insert into ticket (user_id, type) values (5, 3);
insert into ticket (user_id, type) values (6, 3);/* only VIP */
insert into ticket (user_id, type) values (7, 1);/* only Standard */

/* Select users having tickets including VIP (type 3). */
select user_id from ticket where type in (3) group by user_id;

/* Select users having tickets except specified (PRE-PARTY). */
select user_id from ticket where user_id not in (
       select user_id from ticket where type in (4) group by user_id
) 
group by user_id;

/* Select users which do not have tickets PRE-PARTY (type 4) 
and have any combinations of others. */
select user_id from ticket where user_id not in (
       select user_id from ticket where type in (4) group by user_id
) 
group by user_id;

/* Select users which do not have tickets VIP and PRE-PARTY (types 3, 4)
and have any combinations of others. */
select user_id from ticket where user_id not in (
       select user_id from ticket where type in (3, 4) group by user_id
) 
group by user_id;

/* Universal */
SELECT `user_id`
FROM `ticket`
WHERE 
`user_id` not IN (SELECT `user_id` FROM `ticket` WHERE `type` = 1)
AND `user_id` IN (SELECT `user_id` FROM `ticket` WHERE `type` = 2)
AND `user_id` IN (SELECT `user_id` FROM `ticket` WHERE `type` = 3)
AND 
`user_id` not IN (SELECT `user_id` FROM `ticket` WHERE `type` = 4)
group by user_id;

select * from ticket;