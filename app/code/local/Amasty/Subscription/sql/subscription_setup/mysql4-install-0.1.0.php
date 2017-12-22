<?php
$installer = $this;
$installer->startSetup();
$sql=<<<SQLTEXT
create table subs(subs_id int not null auto_increment, name varchar(100), email varchar(100), phone varchar(100), message varchar(300), primary key(subs_id));
    insert into subs values(1,'Vasya', 'v@gmail.com', '222-333-222', 'Hello');
		
SQLTEXT;

$installer->run($sql);

$installer->endSetup();
	 