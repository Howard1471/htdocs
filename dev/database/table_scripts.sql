
DROP TABLE IF EXISTS snarc_newsitems;
create table snarc_newsitems (
    newsitem_id INTEGER	PRIMARY KEY AUTO_INCREMENT,
    newstitle varchar (255) NOT NULL,
    newsdate DATETIME NOT NULL,
    newsauthor varchar(50) not null,
    newstext TEXT
    );


DROP TABLE IF EXISTS snarc_usernames;
CREATE TABLE snarc_usernames (
    username_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    callsign VARCHAR(20) NOT NULL,
    firstname VARCHAR(20) NOT NULL,
    secondname VARCHAR(20),
    emailaddr VARCHAR(50) NOT NULL,
    homeclub INTEGER NOT NULL,
    snarcmember INT(1) NOT NULL,
    emailnotifications INT(1) NOT NULL,
    password VARCHAR(255) NOT NULL,
    validationCode VARCHAR(255) NOT NULL,
    accountvalidated INT(1) NOT NULL
    );
DROP TABLE IF EXISTS narc_clubnames;
CREATE TABLE snarc_clubnames (
    clubname_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    clubname VARCHAR(100)
    );

INSERT INTO snarc_clubnames (clubname) VALUES ('South Notts ARC');


DROP TABLE IF EXISTS snarc_articles;
CREATE TABLE snarc_articles (
    article_id INTEGER  PRIMARY KEY AUTO_INCREMENT,
    articletitle VARCHAR(255) NOT NULL,
    articleauthor VARCHAR(50) NOT NULL,
    articledate DATETIME NOT NULL,
    articlefile VARCHAR(50) NOT NULL,
    articlelevel INTEGER NOT NULL,
    articletype INTEGER NOT NULL
    )