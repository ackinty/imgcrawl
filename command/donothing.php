<?php

/**
 * ownCloud - ImgCrawl
 *
 * @author Ackinty Strappa <ackinty@gmail.com>
 * @copyright 2014 Ackinty
 * @license This file is licensed under the Affero General Public License version 3 or later. See the COPYING file.
 */

namespace OCA\ImgCrawl\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Output\OutputInterface;

class DoNothing extends Command {

    protected function configure() {
        $this
            ->setName('imgcrawl:donothing')
            ->setDescription('Do nothing');
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $output->writeln('Test OK');
    }

}