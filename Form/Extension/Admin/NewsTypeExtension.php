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

namespace Plugin\NewsTweet\Form\Extension\Admin;

use Eccube\Entity\News;
use Eccube\Form\Type\Admin\NewsType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;

class NewsTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /** @var News $news */
        $news = $options['data'];
        $tweetedDate = $news->getTweetedDate() ? ' '.$news->getTweetedDate()->format('Y/m/d H:i:s') : '';
        $builder
            ->add('tweet', CheckboxType::class, [
                'required' => false,
                'label_format' => 'ツイートする' . $tweetedDate,
                'eccube_form_options' => [
                    'auto_render' => true,
                ],
            ]);

    }

    /**
     * @return iterable
     */
    public static function getExtendedTypes(): iterable
    {
        yield NewsType::class;
    }
}
