<?php 

namespace PayPal\Api;
use PayPal\Rest\IResource;
use PayPal\Rest\Call;
use PayPal\Rest\ApiContext;

/**
 * 
 */
class CreditCard extends Resource implements IResource {

	private static $credential;
	
	/**
	 *
	 * @deprected. Pass ApiContext to create/get methods instead
	 */
	public static function setCredential($credential) {
		self::$credential = $credential;
	}
	
	/**
	 * Setter for id
	 * @param string $id
	 */ 
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * Getter for id
	 * @return string
	 */ 
	public function getId() {
		return $this->id;
	}

	/**
	 * Setter for valid_until
	 * @param string $valid_until
	 */ 
	public function setValid_until($valid_until) {
		$this->valid_until = $valid_until;
	}

	/**
	 * Getter for valid_until
	 * @return string
	 */ 
	public function getValid_until() {
		return $this->valid_until;
	}

	/**
	 * Setter for state
	 * @param string $state
	 */ 
	public function setState($state) {
		$this->state = $state;
	}

	/**
	 * Getter for state
	 * @return string
	 */ 
	public function getState() {
		return $this->state;
	}

	/**
	 * Setter for payer_id
	 * @param string $payer_id
	 */ 
	public function setPayer_id($payer_id) {
		$this->payer_id = $payer_id;
	}

	/**
	 * Getter for payer_id
	 * @return string
	 */ 
	public function getPayer_id() {
		return $this->payer_id;
	}

	/**
	 * Setter for type
	 * @param string $type
	 */ 
	public function setType($type) {
		$this->type = $type;
	}

	/**
	 * Getter for type
	 * @return string
	 */ 
	public function getType() {
		return $this->type;
	}

	/**
	 * Setter for number
	 * @param string $number
	 */ 
	public function setNumber($number) {
		$this->number = $number;
	}

	/**
	 * Getter for number
	 * @return string
	 */ 
	public function getNumber() {
		return $this->number;
	}

	/**
	 * Setter for expire_month
	 * @param string $expire_month
	 */ 
	public function setExpire_month($expire_month) {
		$this->expire_month = $expire_month;
	}

	/**
	 * Getter for expire_month
	 * @return string
	 */ 
	public function getExpire_month() {
		return $this->expire_month;
	}

	/**
	 * Setter for expire_year
	 * @param string $expire_year
	 */ 
	public function setExpire_year($expire_year) {
		$this->expire_year = $expire_year;
	}

	/**
	 * Getter for expire_year
	 * @return string
	 */ 
	public function getExpire_year() {
		return $this->expire_year;
	}

	/**
	 * Setter for cvv2
	 * @param string $cvv2
	 */ 
	public function setCvv2($cvv2) {
		$this->cvv2 = $cvv2;
	}

	/**
	 * Getter for cvv2
	 * @return string
	 */ 
	public function getCvv2() {
		return $this->cvv2;
	}

	/**
	 * Setter for first_name
	 * @param string $first_name
	 */ 
	public function setFirst_name($first_name) {
		$this->first_name = $first_name;
	}

	/**
	 * Getter for first_name
	 * @return string
	 */ 
	public function getFirst_name() {
		return $this->first_name;
	}

	/**
	 * Setter for last_name
	 * @param string $last_name
	 */ 
	public function setLast_name($last_name) {
		$this->last_name = $last_name;
	}

	/**
	 * Getter for last_name
	 * @return string
	 */ 
	public function getLast_name() {
		return $this->last_name;
	}

	/**
	 * Setter for billing_address
	 * @param PayPal\Api\Address $billing_address
	 */ 
	public function setBilling_address($billing_address) {
		$this->billing_address = $billing_address;
	}

	/**
	 * Getter for billing_address
	 * @return PayPal\Api\Address
	 */ 
	public function getBilling_address() {
		return $this->billing_address;
	}

	/**
	 * Setter for links
	 * @param PayPal\Api\Link $links
	 */ 
	public function setLinks($links) {
		$this->links = $links;
	}

	/**
	 * Getter for links
	 * @return PayPal\Api\Link
	 */ 
	public function getLinks() {
		return $this->links;
	}

	
	
	/**
	 * @path /v1/vault/credit-card
	 * @method POST
	  
	 * @param PayPal\Rest\ApiContext $apiContext optional
	 */
	public function create( $apiContext=null) {
		$payLoad = $this->toJSON();	
		if($apiContext == null) {
			$apiContext = new ApiContext(self::$credential);
		}
		$call = new \PPRestCall($apiContext);		
		$json = $call->execute( array('PayPal\Rest\RestHandler'),
			"/v1/vault/credit-card", 
			"POST", $payLoad);
		$this->fromJson($json);
 		return $this; 		
 	}
	
	/**
	 * @path /v1/vault/credit-card/:credit-card-id
	 * @method GET
	 * @param string $creditcardid	  
	 * @param PayPal\Rest\ApiContext $apiContext optional
	 */
	public static function get( $creditcardid, $apiContext=null) {
		if (($creditcardid == null) || (strlen($creditcardid) <= 0)) {
			throw new \InvalidArgumentException("creditcardid cannot be null or empty");
		}
		$payLoad = "";
		if($apiContext == null) {
			$apiContext = new ApiContext(self::$credential);
		}
		$call = new \PPRestCall($apiContext);		
		$json = $call->execute( array('PayPal\Rest\RestHandler'),
			"/v1/vault/credit-card/$creditcardid", 
			"GET", $payLoad);
		$ret = new CreditCard();
		$ret->fromJson($json);
		return $ret;
 		 		
 	}
	

}
