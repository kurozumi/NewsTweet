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

namespace Plugin\NewsTweet;

use Eccube\Common\EccubeNav;

class Nav implements EccubeNav
{
    public static function getNav()
    {
        return [
            'setting' => [
                'children' => [
                    'shop' => [
                        'children' => [
                            'twitter_config' => [
                                'name' => 'Twitter投稿設定',
                                'url' => 'news_tweet_admin_config'
                            ]
                        ]
                    ]
                ]
            ]
        ];
    }
}
