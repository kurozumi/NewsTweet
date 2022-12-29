<?php

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
}
