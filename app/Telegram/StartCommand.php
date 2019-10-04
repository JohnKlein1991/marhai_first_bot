<?php

namespace App\Telegram;


use \Telegram\Bot\Commands\Command;
use Telegram\Bot\Actions;

/**
 * Class HelpCommand.
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
    protected $description = 'Run your app';

    /**
     * {@inheritdoc}
     */
    public function handle()
    {
         $this->replyWithChatAction(['action' => Actions::TYPING]);
         $this->replyWithMessage(['text' => 'Let\' go!!!']);
    }
}
