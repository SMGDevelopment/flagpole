<?php
/**
 * Group Class
 *
 * Used for creating feature flags.
 *
 * @package   wp-feature-flags
 * @author    James Williams <james@jamesrwilliams.ca>
 * @link      https://github.com/jamesrwilliams/wp-feature-flags
 * @copyright 2019 James Williams
 */

namespace FeatureFlag;

/**
 * Class Group
 *
 * @package FeatureFlag
 */
class Group {

	/**
	 * Key of the group.
	 *
	 * @var string
	 */
	public $key;

	/**
	 * The human readable name of the group.
	 *
	 * @var string
	 */
	public $name;

	/**
	 * Optional description of the group.
	 *
	 * @var string
	 */
	public $description;

	/**
	 * Array of flags that make up the group.
	 *
	 * @var array The flags of this group.
	 */
	public $flags;

	/**
	 * Group constructor.
	 *
	 * @param string $_key key for the new group.
	 * @param string $_name Name of the group.
	 * @param string $_description The description of the group.
	 * @param array  $_flags The array of the flags within the group.
	 */
	public function __construct( $_key, $_name, $_description = '', $_flags = [] ) {

		$this->name        = ( $_name ? $_name : '' );
		$this->key         = $_key;
		$this->flags       = $_flags;
		$this->description = $_description;

	}

	/**
	 * Return the group's key.
	 *
	 * @return mixed
	 */
	public function get_key() {
		return $this->key;
	}

	/**
	 * Return the group's name.
	 *
	 * @return string
	 */
	public function get_name() {
		return $this->name;
	}

	/**
	 * Return the group's description.
	 *
	 * @return string
	 */
	public function get_description() {
		return $this->description;
	}

	/**
	 * Return an array of this group's flags.
	 *
	 * @return array
	 */
	public function get_flags() {
		return $this->flags;
	}

	/**
	 * Add a flag to the group's object property.
	 *
	 * @param Flag $flag The flag we're adding.
	 */
	public function add_flag( $flag ) {
		$this->flags[] = $flag;
	}
}
