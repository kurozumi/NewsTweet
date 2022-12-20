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

if (!class_exists(Config::class, false)) {
    /**
     * Config
     *
     * @ORM\Table(name="plg_news_tweet_config")
     * @ORM\Entity(repositoryClass="Plugin\NewsTweet\Repository\ConfigRepository")
     * @ORM\HasLifecycleCallbacks()
     */
    class Config
    {
        /**
         * @var int
         *
         * @ORM\Column(type="integer", options={"unsigned":true})
         * @ORM\Id
         * @ORM\GeneratedValue(strategy="IDENTITY")
         */
        private $id;

        /**
         * @var string
         *
         * @ORM\Column(type="string", length=255, nullable=true)
         */
        private $consumerKey;

        /**
         * @var string
         *
         * @ORM\Column(type="string", length=255, nullable=true)
         */
        private $consumerSecret;

        /**
         * @var string
         *
         * @ORM\Column(type="string", length=255, nullable=true)
         */
        private $accessToken;

        /**
         * @var string
         *
         * @ORM\Column(type="string", length=255, nullable=true)
         */
        private $accessTokenSecret;

        /**
         * @return int
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @return string|null
         */
        public function getConsumerKey(): ?string
        {
            return $this->consumerKey;
        }

        /**
         * @param string $consumerKey
         * @return $this
         */
        public function setConsumerKey(string $consumerKey): self
        {
            $this->consumerKey = $consumerKey;

            return $this;
        }

        /**
         * @return string|null
         */
        public function getConsumerSecret(): ?string
        {
            return $this->consumerSecret;
        }

        /**
         * @param string $consumerSecret
         * @return $this
         */
        public function setConsumerSecret(string $consumerSecret): self
        {
            $this->consumerSecret = $consumerSecret;

            return $this;
        }

        /**
         * @return string|null
         */
        public function getAccessToken(): ?string
        {
            return $this->accessToken;
        }

        /**
         * @param string $accessToken
         * @return $this
         */
        public function setAccessToken(string $accessToken): self
        {
            $this->accessToken = $accessToken;

            return $this;
        }

        /**
         * @return string|null
         */
        public function getAccessTokenSecret(): ?string
        {
            return $this->accessTokenSecret;
        }

        /**
         * @param string $accessTokenSecret
         * @return $this
         */
        public function setAccessTokenSecret(string $accessTokenSecret): self
        {
            $this->accessTokenSecret = $accessTokenSecret;

            return $this;
        }
    }
}
