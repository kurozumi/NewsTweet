<?php

namespace Plugin\NewsTweet\Form\Extension\Admin;

use Eccube\Form\Type\Admin\NewsType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;

class NewsTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tweet', CheckboxType::class, [
                'required' => false,
                'label_format' => 'ツイートする',
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
