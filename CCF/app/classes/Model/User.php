<?php
/**
 * ClanCats Model
 *
 * @package 			ClanCats-Framework
 * @author     		Mario Döring <mariodoering@me.com>
 * @version 			0.7
 * @copyright 		2010 - 2013 ClanCats GmbH 
 *
 */
class Model_User extends CCModel {

	/*
	 * defaults
	 */
	protected static $_defaults = array(
		'id',
		'group_id',
		'name',
		'email',
		'username',
		'password',
		'last_login',
		'client_ip',
		'created_at',
	);
}
?>