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
        $commands = $this->telegram->getCommands();

        $text = '';
        foreach ($commands as $name => $handler) {
            $text .= sprintf('/%s - %s'.PHP_EOL, $name, $handler->getDescription());
        }
//        $text = json_encode($_POST);
        $this->replyWithMessage(compact('text'));
    }
}
