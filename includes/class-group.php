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
	 * The access state of this group.
	 *
	 * @var bool Is the Group accessible for the public.
	 */
	public $private;

	/**
	 * Group constructor.
	 *
	 * @param string $_key key for the new group.
	 * @param string $_name Name of the group.
	 * @param string $_description The description of the group.
	 * @param bool   $_private Is the group private.
	 */
	public function __construct( $_key, $_name, $_description = '', $_private = true ) {

		$this->name        = ( $_name ? $_name : $_key );
		$this->key         = $_key;
		$this->flags       = [];
		$this->private     = $_private;
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
	 * Return the group's private status.
	 *
	 * @return bool
	 */
	public function is_private() {
		return $this->private;
	}

	/**
	 * Add a flag to the group's object property.
	 *
	 * @param Flag $flag The flag we're adding.
	 *
	 * @return bool Result has the flag been added.
	 */
	public function add_flag( $flag ) {

		if ( false === $this->has_flag( $flag ) ) {
			$this->flags[] = $flag;
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Check if this group has this flag enabled.
	 *
	 * @param string $flag_key The flag key we're checking.
	 *
	 * @return bool The result of the search.
	 */
	public function has_flag( $flag_key ) {
		$index = array_search( $flag_key, $this->flags, true );

		return $index;
	}

	/**
	 * Remove a specific flag from the array.
	 *
	 * @param string $flag_key The flag key we're going to remove.
	 *
	 * @return bool Response if successful.
	 */
	public function remove_flag( $flag_key ) {

		$index = $this->has_flag( $flag_key );

		if ( false !== $index ) {
			unset( $this->flags[ $index ] );
			return true;
		} else {
			return false;
		}
	}
}
