<?php

namespace App\Telegram;


use \Telegram\Bot\Commands\Command;

/**
 * Class HelpCommand.
 */
class TestCommands extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = 'test';

    /**
     * @var array Command Aliases
     */
    protected $aliases = ['listcommands'];

    /**
     * @var string Command Description
     */
    protected $description = 'You pushed test';

    /**
     * {@inheritdoc}
     */
    public function handle()
    {
         $this->replyWithChatAction(['action' => Actions::TYPING]);
    }
}
