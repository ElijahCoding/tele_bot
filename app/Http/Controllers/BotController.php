<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Inspiring;
use Telegram\Bot\Api;

/**
 * Class BotController
 */
class BotController extends Controller
{
    /** @var Api */
    protected $telegram;

    /**
     * BotController constructor.
     *
     * @param Api $telegram
     */
    public function __construct(Api $telegram)
    {
        $this->telegram = $telegram;
    }

    /**
     * Get updates from Telegram.
     */
    public function getUpdates()
    {
        $updates = $this->telegram->getUpdates();
    }

    /**
     * Set a webhook.
     */
    public function setWebhook()
    {
        $url = "https://fe4bd30e.ngrok.io";
        return $this->telegram->setWebhook(['url' => $url]);
    }

    /**
     * Remove webhook.
     *
     * @return array
     */
    public function removeWebhook()
    {
        $response = $this->telegram->removeWebhook();

        return $response->getDecodedBody();
    }

    /**
     * Handles incoming webhook updates from Telegram.
     *
     * @return string
     */
    public function webhookHandler()
    {
        $this->telegram->commandsHandler(true);
    }
}
