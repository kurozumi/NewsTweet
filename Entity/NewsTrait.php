<?php

/**
 * This file is part of NewsTweet
 *
 * Copyright(c) Akira Kurozumi <info@a-zumi.net>
 *
 *  https://a-zumi.net
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\NewsTweet\Entity;

use Doctrine\ORM\Mapping as ORM;
use Eccube\Annotation\EntityExtension;

/**
 * @EntityExtension("Eccube\Entity\News")
 */
trait NewsTrait
{
    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", options={"default":false})
     */
    private $tweet;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(type="datetimetz", nullable=true)
     */
    private $tweeted_date;

    /**
     * @return bool
     */
    public function isTweet(): bool
    {
        return $this->tweet;
    }

    /**
     * @param bool $tweet
     * @return NewsTrait
     */
    public function setTweet(bool $tweet): self
    {
        $this->tweet = $tweet;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getTweetedDate(): ?\DateTime
    {
        return $this->tweeted_date;
    }

    /**
     * @param \DateTime|null $dateTime
     * @return $this
     */
    public function setTweetedDate(?\DateTime $dateTime)
    {
        $this->tweeted_date = $dateTime;

        return $this;
    }
}
