<?php

namespace FS\AppBundle\Entity;

/**
 * UserActivity
 */
class UserActivity
{
    /**
     * @var integer
     */
    private $userId;

    /**
     * @var \DateTime
     */
    private $activity;


    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return UserActivity
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
     * Set activity
     *
     * @param \DateTime $activity
     *
     * @return UserActivity
     */
    public function setActivity($activity)
    {
        $this->activity = $activity;

        return $this;
    }

    /**
     * Get activity
     *
     * @return \DateTime
     */
    public function getActivity()
    {
        return $this->activity;
    }
}

