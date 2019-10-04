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
    protected $description = 'Yeah!!! Let\'s go!!!';

    /**
     * {@inheritdoc}
     */
    public function handle()
    {
         $this->replyWithChatAction(['action' => Actions::TYPING]);
         $this->replyWithMessage(['text' => 'Text of start command!']);

        $commands = $this->getTelegram()->getCommands();

        // Build the list
        $response = '';
        foreach ($commands as $name => $command) {
            $response .= sprintf('/%s - %s' . PHP_EOL, $name, $command->getDescription());
        }

        // Reply with the commands list
        $this->replyWithMessage(['text' => $response]);
        $this->triggerCommand('subscribe');
    }
}
