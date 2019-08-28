<?php

namespace App\Commands\Telegram;

use Telegram;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

/**
 * Class StartCommand
 */
class StartCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = 'start';

    /**
     * @var string Command Description
     */
    protected $description = 'Start Command to get you started';

    /**
     * {@inheritdoc}
     */
    public function handle($arguments)
    {
       return Telegram::sendMessage([
           'text' => 'Phone number',
           'chat_id' => '593670895',
            'reply_markup' => json_encode(
                array (
                    "keyboard" => array(
                        array(
                            array(
                                "text" => "contact",
                                "request_contact" => true
                            ),
                        )
                    ),
                    "one_time_keyboard" => true, // Can be FALSE (hide keyboard after click)
                    "resize_keyboard" => true // Can be FALSE (vertical resize)
                )
            )
        ]);
    }

}
