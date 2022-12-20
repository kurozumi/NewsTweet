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

namespace Plugin\NewsTweet\EventListener;

use Abraham\TwitterOAuth\TwitterOAuth;
use Eccube\Common\EccubeConfig;
use Eccube\Entity\News;
use Eccube\Event\EccubeEvents;
use Eccube\Event\EventArgs;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class NewTweetListener implements EventSubscriberInterface
{
    /**
     * @var EccubeConfig
     */
    private $eccubeConfig;

    public function __construct(EccubeConfig $eccubeConfig)
    {
        $this->eccubeConfig = $eccubeConfig;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            EccubeEvents::ADMIN_CONTENT_NEWS_EDIT_COMPLETE => 'onAdminContentNewsEditComplete',
        ];
    }

    public function onAdminContentNewsEditComplete(EventArgs $event)
    {
        /** @var News $news */
        $news = $event->getArgument('News');

        if ($news->isVisible() && $news->getPublishDate() < new \DateTime()) {
            $connection = new TwitterOAuth(
                $this->eccubeConfig->get('twitter.consumer_key'),
                $this->eccubeConfig->get('twitter.consumer_secret'),
                $this->eccubeConfig->get('twitter.access_token'),
                $this->eccubeConfig->get('twitter.access_token_secret')
            );
            $connection->post("statuses/update", ["status" => $news->getTitle() . " " . $news->getUrl()]);
        }
    }
}
