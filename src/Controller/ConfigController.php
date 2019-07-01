<?php

namespace Oniti\Docga\ConnectorBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class ConfigController
 * @package Oniti\Docga\ConnectorBundle\Controller
 */
class ConfigController
{
    /**
     * @var string
     */
    protected $docgaUrl;

    /**
     * @var string
     */
    protected $docgaApiKey;

    /**
     * @var string
     */
    protected $docgaApiSecret;

    /**
     * ConfigController constructor.
     * @param $docgaUrl
     * @param $docgaApiKey
     * @param $docgaApiSecret
     */
    public function __construct($docgaUrl, $docgaApiKey, $docgaApiSecret)
    {
        $this->docgaUrl = $docgaUrl;
        $this->docgaApiKey = $docgaApiKey;
        $this->docgaApiSecret = $docgaApiSecret;
    }

    /**
     * @return JsonResponse
     */
    public function getConfigAction()
    {
        return new JsonResponse([
            'docgaUrl' => $this->docgaUrl,
            'docgaApiKey' => $this->docgaApiKey,
            'docgaApiSecret' => $this->docgaApiSecret,
        ]);
    }
}