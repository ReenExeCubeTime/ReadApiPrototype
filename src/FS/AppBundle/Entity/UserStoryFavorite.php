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
    /**
     * @var integer
     */
    private $userId;

    /**
     * @var integer
     */
    private $storyId;


    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return UserStoryFavorite
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set storyId
     *
     * @param integer $storyId
     *
     * @return UserStoryFavorite
     */
    public function setStoryId($storyId)
    {
        $this->storyId = $storyId;

        return $this;
    }

    /**
     * Get storyId
     *
     * @return integer
     */
    public function getStoryId()
    {
        return $this->storyId;
    }
}
