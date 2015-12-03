<?php

namespace Nht\Hocs\Core\Metadata;

use Nht\Hocs\Settings\Setting;

class Metadata {
	protected $logo;
	protected $name;
	protected $address;
	protected $email_1, $email_2, $email_3;
	protected $phone_1, $phone_2, $phone_3;
	protected $skype_1, $skype_2, $skype_3;
	protected $yahoo_1, $yahoo_2, $yahoo_3;
	protected $short_description;
	protected $description;
	protected $contact;
	protected $meta_title;
	protected $meta_keyword;
	protected $meta_description;
	protected $js_codes;
	protected $facebook;
	protected $googleplus;
	protected $twitter;
	protected $linkin;
	protected $youtube;

	public function __construct() {
		if($setting = Setting::find(1)) {
			$this->logo = $setting->logo;
			$this->name = $setting->name;
			$this->address = $setting->address;
			$this->email_1 = $setting->email_1;
			$this->email_2 = $setting->email_2;
			$this->email_3 = $setting->email_3;
			$this->phone_1 = $setting->phone_1;
			$this->phone_2 = $setting->phone_2;
			$this->phone_3 = $setting->phone_3;
			$this->skype_1 = $setting->skype_1;
			$this->skype_2 = $setting->skype_2;
			$this->skype_3 = $setting->skype_3;
			$this->yahoo_1 = $setting->yahoo_1;
			$this->yahoo_2 = $setting->yahoo_2;
			$this->yahoo_3 = $setting->yahoo_3;
			$this->short_description = $setting->short_description;
			$this->description = $setting->description;
			$this->contact = $setting->contact;
			$this->meta_title = $setting->meta_title;
			$this->meta_keyword = $setting->meta_keyword;
			$this->meta_description = $setting->meta_description;
			$this->js_codes = $setting->js_codes;
			$this->facebook = $setting->facebook;
			$this->googleplus = $setting->googleplus;
			$this->twitter = $setting->twitter;
			$this->linkin = $setting->linkin;
			$this->youtube = $setting->youtube;
		}
	}

	/**
	 * Set logo site
	 * @param string $logo
	 */
	public function setLogo($logo) {
		$this->logo = $logo;
	}

	/**
	 * Get name of logo site
	 * @return string
	 */
	public function getLogo() {
		return $this->logo;
	}

	/**
	 * Set site name
	 * @param string $name
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Get site name
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Set site address
	 * @param string $address
	 */
	public function setAddress($address) {
		$this->address = $address;
	}

	/**
	 * Get site address
	 * @return string
	 */
	public function getAddress() {
		return $this->address;
	}

	/**
	 * Get site email contact
	 * @param string $email_1
	 */
	public function setEmail_1($email_1) {
		$this->email_1 = $email_1;
	}

	/**
	 * Get site email
	 * @return string
	 */
	public function getEmail_1() {
		return $this->email_1;
	}

	// Email 2
	public function setEmail_2($email_2) {
		$this->email_2 = $email_2;
	}

	/**
	 * Get site email
	 * @return string
	 */
	public function getEmail_2() {
		return $this->email_2;
	}

	// Email 3
	public function setEmail_3($email_3) {
		$this->email_3 = $email_3;
	}

	/**
	 * Get site email
	 * @return string
	 */
	public function getEmail_3() {
		return $this->email_3;
	}

	// Phone 1
	public function setPhone_1($phone_1) {
		$this->phone_1 = $phone_1;
	}

	/**
	 * Get site phone
	 * @return string
	 */
	public function getPhone_1() {
		return $this->phone_1;
	}
	// Phone 2
	public function setPhone_2($phone_2) {
		$this->phone_2 = $phone_2;
	}

	/**
	 * Get site email
	 * @return string
	 */
	public function getPhone_2() {
		return $this->phone_2;
	}

	// Phone 3
	public function setPhone_3($phone_3) {
		$this->phone_3 = $phone_3;
	}

	/**
	 * Get site email
	 * @return string
	 */
	public function getPhone_3() {
		return $this->phone_3;
	}

	// Skype 1
	public function setSkype_1($skype_1) {
		$this->skype_1 = $skype_1;
	}

	/**
	 * Get site skype
	 * @return string
	 */
	public function getSkype_1() {
		return $this->skype_1;
	}

	// Skype 2
	public function setSkype_2($skype_2) {
		$this->skype_2 = $skype_2;
	}

	/**
	 * Get site skype
	 * @return string
	 */
	public function getSkype_2() {
		return $this->skype_2;
	}

	// Skype 3
	public function setSkype_3($skype_3) {
		$this->skype_3 = $skype_3;
	}

	/**
	 * Get site skype
	 * @return string
	 */
	public function getSkype_3() {
		return $this->skype_3;
	}

	// Yahoo
	public function setYahoo_1($yahoo_1) {
		$this->yahoo_1 = $yahoo_1;
	}

	/**
	 * Get site yahoo
	 * @return string
	 */
	public function getYahoo_1() {
		return $this->yahoo_1;
	}

	// Yahoo 2
	public function setYahoo_2($yahoo_2) {
		$this->yahoo_2 = $yahoo_2;
	}

	/**
	 * Get site yahoo
	 * @return string
	 */
	public function getYahoo_2() {
		return $this->yahoo_2;
	}

	// Yahoo 3
	public function setYahoo_3($yahoo_3) {
		$this->yahoo_3 = $yahoo_3;
	}

	/**
	 * Get site yahoo
	 * @return string
	 */
	public function getYahoo_3() {
		return $this->yahoo_3;
	}

	// Sort Description
	public function setShortDescription($short_description) {
		$this->short_description = $short_description;
	}

	/**
	 * Get site short description
	 * @return string
	 */
	public function getShortDescription() {
		return $this->short_description;
	}

	// Description
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Get site description
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}

	// Contact
	public function setContact($contact) {
		$this->contact = $contact;
	}

	/**
	 * Get site contact
	 * @return string
	 */
	public function getContact() {
		return $this->contact;
	}

	// Meta Title
	public function setMetaTitle($meta_title) {
		$this->meta_title = $meta_title;
	}

	/**
	 * Get site metatitle
	 * @return string
	 */
	public function getMetaTitle() {
		return $this->meta_title;
	}

	// Meta Keyword
	public function setMetaKeyword($meta_keyword) {
		$this->meta_keyword = $meta_keyword;
	}

	/**
	 * Get site meta title
	 * @return string
	 */
	public function getMetaKeyword() {
		return $this->meta_keyword;
	}

	// Meta Description
	public function setMetaDescription($meta_description) {
		$this->meta_description = $meta_description;
	}

	/**
	 * Get site meta description
	 * @return string
	 */
	public function getMetaDescription() {
		return $this->meta_description;
	}

	// Js Codes
	public function setJsCodes($js_codes) {
		$this->js_codes = $js_codes;
	}

	/**
	 * Get site js code
	 * @return string
	 */
	public function getJsCodes() {
		return $this->js_codes;
	}

	// Facebook
	public function setFacebook($facebook) {
		$this->facebook = $facebook;
	}

	/**
	 * Get site facebook
	 * @return string
	 */
	public function getFacebook() {
		return $this->facebook;
	}

	// Google plus
	public function setGooglePlus($googleplus) {
		$this->googleplus = $googleplus;
	}

	/**
	 * Get site g+
	 * @return string
	 */
	public function getGooglePlus() {
		return $this->googleplus;
	}

	// Twitter
	public function setTwitter($twitter) {
		$this->twitter = $twitter;
	}

	/**
	 * Get site twitter
	 * @return string
	 */
	public function getTwitter() {
		return $this->twitter;
	}

	// Linkin
	public function setLinkin($linkin) {
		$this->linkin = $linkin;
	}

	/**
	 * Get site linkedin
	 * @return string
	 */
	public function getLinkin() {
		return $this->linkin;
	}

	// Youtube
	public function setYoutube($youtube) {
		$this->youtube = $youtube;
	}

	/**
	 * Get site youtube
	 * @return string
	 */
	public function getYoutube() {
		return $this->youtube;
	}
}