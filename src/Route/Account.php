<?php
namespace FacturationPro\Route;

/**
 * Created by PhpStorm.
 * User: remi
 * Date: 12/29/16
 * Time: 2:55 PM
 */
class Account
{
    /** @var string */
    protected $url = "account";

    /** @var bool */
    protected $firm = false;

    /** @var string */
    protected $entity;

    protected $master;

    public function __construct(\FacturationPro\FacturationPro $master)
    {
        $this->master = $master;
        $this->entity = \FacturationPro\Entity\Account::class;
    }

    public function get()
    {
        return $this->master->getAll($this->firm,$this->url, $this->entity);
    }
}