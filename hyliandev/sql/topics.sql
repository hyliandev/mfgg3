CREATE TABLE IF NOT EXISTS tsms_topics (
	tid int unsigned not null primary key auto_increment,
	pid int unsigned,
	title varchar(255),
	date int unsigned,
	locked tinyint,
	stickied tinyint,
	poster_uid int unsigned,
	poster_nickname varchar(255),
	last_post_date int unsigned,
	last_post_id int unsigned,
	last_poster_uid int unsigned,
	last_poster_nickname varchar(255)
);