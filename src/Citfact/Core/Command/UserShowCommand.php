<?php

/*
 * This file is part of the Studio Fact package.
 *
 * (c) Kulichkin Denis (onEXHovia) <onexhovia@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Citfact\Core\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class UserShowCommand extends Command
{
    /**
     * @inheritdoc
     */
    protected function configure()
    {
        $this
            ->setName('user:show')
            ->setDescription('Show information user')
            ->setDefinition(array(
                new InputArgument('userid', InputArgument::REQUIRED, 'The user identifier'),
            ))
        ;
    }

    /**
     * @inheritdoc
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $userid = $input->getArgument('userid');
        $userShow = \CUser::GetById($userid)->Fetch();

        $tableHelper = $this->getHelper('table');
        $tableHelper->setLayout($tableHelper::LAYOUT_DEFAULT);

        foreach ($userShow as $key => $value) {
            $tableHelper->addRows(array(array($key, $value)));
        }

        $tableHelper->render($output);
    }

    /**
     * @inheritdoc
     */
    protected function interact(InputInterface $input, OutputInterface $output)
    {
        if (!$input->getArgument('userid')) {
            $username = $this->getHelper('dialog')->askAndValidate(
                $output,
                'Please choose a userid:',
                function($username) {
                    if (empty($username)) {
                        throw new \Exception('userid can not be empty');
                    }

                    return $username;
                }
            );

            $input->setArgument('userid', $username);
        }
    }
}