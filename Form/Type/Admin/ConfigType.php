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

namespace Plugin\NewsTweet\Form\Type\Admin;

use Plugin\NewsTweet\Entity\Config;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ConfigType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('consumerKey', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                    new Length(['max' => 255]),
                ],
            ])
            ->add('consumerSecret', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                    new Length(['max' => 255]),
                ],
            ])
            ->add('accessToken', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                    new Length(['max' => 255]),
                ],
            ])
            ->add('accessTokenSecret', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                    new Length(['max' => 255]),
                ],
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Config::class,
        ]);
    }
}
