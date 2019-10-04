<?php

namespace App\Telegram;


use \Telegram\Bot\Commands\Command;
use Telegram\Bot\Actions;
use Telegram\Bot\Laravel\Facades\Telegram;

/**
 * Class HelpCommand.
 */
class KeyboardCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = 'keyboard_please';

    /**
     * @var string Command Description
     */
    protected $description = 'The keyboard for answers';

    /**
     * {@inheritdoc}
     */
    public function handle()
    {
        $this->replyWithChatAction(['action' => Actions::TYPING]);
        $this->replyWithMessage(['text' => 'Here is the keyboard for you:']);

        $info = Telegram::getWebhookUpdates();
        $chatId = $info['message']['chat']['id'];

        $keyboard = [
            ['7', '8', '9'],
            ['4', '5', '6'],
            ['1', '2', '3'],
            ['0']
        ];

        $reply_markup = Telegram::replyKeyboardMarkup([
            'keyboard' => $keyboard,
            'resize_keyboard' => true,
            'one_time_keyboard' => true
        ]);

        $response = Telegram::sendMessage([
            'chat_id' => $chatId,
            'text' => 'Hello World',
            'reply_markup' => $reply_markup
        ]);

    }
}
