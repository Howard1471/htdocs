

create table snarc_newsitems (
    newsitem_id INTEGER	PRIMARY KEY AUTO_INCREMENT,
    newstitle varchar (255) NOT NULL,
    newsdate DATETIME NOT NULL,
    newsauthor varchar(50) not null,
    newstext TEXT );