<?php
namespace FacturationPro\Route;

/**
 * Created by PhpStorm.
 * User: remi
 * Date: 12/29/16
 * Time: 2:55 PM
 */
class Category
{
    /** @var string */
    protected $url = "categories";

    /** @var bool */
    protected $firm = true;

    /** @var int **/
    protected $page;

    /** @var string **/
    protected $title;

    /** @var string **/
    protected $status;

    protected $master;
    protected $entity;

    public function __construct(\FacturationPro\FacturationPro $master)
    {
        $this->master = $master;
        $this->entity = \FacturationPro\Entity\Category::class;
    }

    public function getAll()
    {
        $params = array(
            "page" => $this->page,
            "title" => $this->title,
            "status" => $this->status
        );
        return $this->master->getAll($this->firm,$this->url, $this->entity,$params);
    }

    public function get($id)
    {
        $params = array();
        return $this->master->get($this->firm,$this->url,$id,$this->entity,"json",$params);
    }

    public function post(\FacturationPro\Entity\Category $category)
    {
        if($category->getStatus()) $category->setStatus($category->getStatus()->getReference());
        return $this->master->post($this->firm,$this->url,$category,$this->entity,$this);
    }

    public function patch(\FacturationPro\Entity\Category $category)
    {
        if($category->getStatus()) $category->setStatus($category->getStatus()->getReference());
        return $this->master->patch($this->firm,$this->url,$category->getId(),$category,$this->entity,$this);
    }

    public function remove(\FacturationPro\Entity\Category $category)
    {
        return $this->master->remove($this->firm,$this->url,$category->getId());
    }

    /**
     * @param int $page
     * @return Category
     */
    public function setPage($page)
    {
        $this->page = $page;
        return $this;
    }

    /**
     * @param string $title
     * @return Category
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param string $status
     * @return Category
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return Category
     */
    public function reset()
    {
        $this->setPage(null);
        $this->setTitle(null);
        $this->setStatus(null);
        return $this;
    }
}