<?php

namespace FS\AppBundle\Component\Pager;

use FS\AppBundle\Repository\StoryRepository;
use Pagerfanta\Adapter\AdapterInterface;

class StoryAdapter implements AdapterInterface
{
    /**
     * @var StoryRepository
     */
    private $repository;

    /**
     * @var \DateTimeInterface
     */
    private $begin;

    /**
     * StoryAdapter constructor.
     * @param StoryRepository $repository
     * @param \DateTimeInterface $begin
     */
    public function __construct(StoryRepository $repository, \DateTimeInterface $begin)
    {
        $this->repository = $repository;
        $this->begin = $begin;
    }

    public function getNbResults()
    {
        return $this->repository->getCount($this->begin);
    }

    public function getSlice($offset, $length)
    {
        return $this->repository->getList($this->begin, $offset, $length);
    }

}