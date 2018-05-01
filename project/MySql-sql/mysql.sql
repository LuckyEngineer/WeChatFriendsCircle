create table admin(
	id int primary key auto_increment,
	username char(240) not null,
	password char(240) not null
);
//用户数据表
create table user(
	id int primary key auto_increment,
	username char(240) not null,
	password char(240) not null,
	area char(240) not null,
	telephone char(240) not null,
	head varchar(2400) not null
);

//朋友圈数据表
create table item(
	id int primary key auto_increment,
	user_id int not null,
	content text not null,
	time int not null
);

//朋友圈图片数据表
create table imgs(
	id int primary key auto_increment,
	item_id int not null,
	href varchar(2400) not null
);

//评论数据表
create table comments(
	id int primary key auto_increment,
	item_id int not null comment"评论了哪条朋友圈",
	content text not null,
	user_id int not null comment"关联到用户的id",
	time int not null
);

//点赞数据表
create table likes(
	id int primary key auto_increment,
	item_id int not null comment"点赞了哪条朋友圈",
	user_id int not null comment"关联到用户的id",
	time int not null
);