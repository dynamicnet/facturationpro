<?php

class Account {
    /** @var int **/
 	protected $id;

    /** @var string **/
  	protected $email;

  	/** @var Firm[] */
  	protected $firms;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return Firm[]
     */
    public function getFirms()
    {
        return $this->firms;
    }
}
?>