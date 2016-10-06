<?php

namespace FS\AppBundle\Component;

use Pagerfanta\Pagerfanta;

class ApiListContainer
{
    /**
     * @var array
     */
    private $list;

    /**
     * @var Pagerfanta
     */
    private $pager;

    /**
     * ApiListContainer constructor.
     * @param array $list
     * @param Pagerfanta $pager
     */
    public function __construct(array $list, Pagerfanta $pager)
    {
        $this->list = $list;
        $this->pager = $pager;
    }

    /**
     * @return array
     */
    public function getList()
    {
        return $this->list;
    }

    /**
     * @return Pagerfanta
     */
    public function getPager()
    {
        return $this->pager;
    }
}