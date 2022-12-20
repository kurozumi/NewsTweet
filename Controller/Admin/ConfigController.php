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

namespace Plugin\NewsTweet\Controller\Admin;

use Eccube\Controller\AbstractController;
use Eccube\Util\CacheUtil;
use Eccube\Util\StringUtil;
use Plugin\NewsTweet\Entity\Config;
use Plugin\NewsTweet\Form\Type\Admin\ConfigType;
use Plugin\NewsTweet\Repository\ConfigRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ConfigController extends AbstractController
{
    /**
     * @var ConfigRepository
     */
    protected $configRepository;

    /**
     * ConfigController constructor.
     *
     * @param ConfigRepository $configRepository
     */
    public function __construct(ConfigRepository $configRepository)
    {
        $this->configRepository = $configRepository;
    }

    /**
     * @Route("/%eccube_admin_route%/news_tweet/config", name="news_tweet_admin_config")
     * @Template("@NewsTweet/admin/config.twig")
     */
    public function index(Request $request, CacheUtil $cacheUtil)
    {
        $Config = $this->configRepository->get();
        $form = $this->createForm(ConfigType::class, $Config);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Config $Config */
            $Config = $form->getData();
            $this->entityManager->persist($Config);
            $this->entityManager->flush();

            $envFile = $this->getParameter('kernel.project_dir') . '/.env';
            $env = file_get_contents($envFile);

            $env = StringUtil::replaceOrAddEnv($env, [
                'TWITTER_CONSUMER_KEY' => $Config->getConsumerKey(),
                'TWITTER_CONSUMER_SECRET' => $Config->getConsumerSecret(),
                'TWITTER_ACCESS_TOKEN' => $Config->getAccessToken(),
                'TWITTER_ACCESS_TOKEN_SECRET' => $Config->getAccessTokenSecret(),
            ]);

            file_put_contents($envFile, $env);

            $cacheUtil->clearCache();

            $this->addSuccess('登録しました。', 'admin');

            return $this->redirectToRoute('news_tweet_admin_config');
        }

        return [
            'form' => $form->createView(),
        ];
    }
}
