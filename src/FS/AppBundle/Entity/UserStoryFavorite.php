<?php

namespace FS\AppBundle\Entity;

/**
 * UserStoryFavorite
 */
class UserStoryFavorite
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var \FS\AppBundle\Entity\User
     */
    private $user;

    /**
     * @var \FS\AppBundle\Entity\Story
     */
    private $story;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return UserStoryFavorite
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return UserStoryFavorite
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set user
     *
     * @param \FS\AppBundle\Entity\User $user
     *
     * @return UserStoryFavorite
     */
    public function setUser(\FS\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \FS\AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set story
     *
     * @param \FS\AppBundle\Entity\Story $story
     *
     * @return UserStoryFavorite
     */
    public function setStory(\FS\AppBundle\Entity\Story $story = null)
    {
        $this->story = $story;

        return $this;
    }

    /**
     * Get story
     *
     * @return \FS\AppBundle\Entity\Story
     */
    public function getStory()
    {
        return $this->story;
    }
}

