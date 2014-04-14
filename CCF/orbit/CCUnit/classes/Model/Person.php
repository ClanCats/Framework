<?php namespace CCUnit;
/**
 * CCUnit Ship
 *
 * @package       CCUnit
 * @author        Mario Döring <mario@clancats.com>
 * @version       1.0.0
 * @copyright     2010 - 2014 ClanCats GmbH
 */
class Model_Person extends \CCModel
{
	/*
	 * Defaults
	 */
	protected static $_defaults = array(
		'name'			=> '',
		'age'			=> 0,
		'library_id'	
	);
}
