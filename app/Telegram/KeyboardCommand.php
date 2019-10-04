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

         $keyboard = [
             ['A', 'B'],
             ['C', 'D']
         ];

        $reply_markup = Telegram::replyKeyboardMarkup([
            'keyboard' => $keyboard,
            'resize_keyboard' => true,
            'one_time_keyboard' => true
        ]);

        $this->replyWithMessage(['reply_markup' => $reply_markup]);
    }
}
