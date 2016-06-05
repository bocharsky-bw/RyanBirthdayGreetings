<?php

namespace Ponka\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\QuestionHelper;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

class RyanBirthdayGreetCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('greet:ryan:birthday')
            ->setDescription('Ryan\'s Birthday Greetings')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var QuestionHelper $helper */
        $helper = $this->getHelper('question');

        $output->writeln('Hey, man!');
        $this->askFirstName($helper, $input, $output);
        $this->askSurname($helper, $input, $output);
        $this->askHappyBirthdayFromPonka($helper, $input, $output);
        $this->askHappyBirthdayFromDino($helper, $input, $output);
    }

    private function askFirstName(QuestionHelper $helper, InputInterface $input, OutputInterface $output)
    {
        // Ask about first name
        $question = new Question('- What\'s your first name? > ');
        while (true) {
            $firstName = $helper->ask($input, $output, $question);
            if (0 === strcasecmp('Ryan', $firstName)) {
                $output->writeln(sprintf('Hm... We know one %s who has a birthday today!', $firstName));
                break;
            }
            $output->writeln(sprintf('%s?.. Nope, we don\'t know this guy...', $firstName));
        }
    }

    private function askSurname(QuestionHelper $helper, InputInterface $input, OutputInterface $output)
    {
        // Ask about surname
        $question = new Question('- What\'s your surname?! > ');
        while (true) {
            $surname = $helper->ask($input, $output, $question);
            if (0 === strcasecmp('Weaver', $surname)) {
                $output->writeln('Ah, it\'s you!!! That\'s awesome!');
                break;
            }
            $output->writeln(sprintf('What?! %s??!!! Oh, come on! Are you kidding me?', $surname));
        }
    }

    private function askHappyBirthdayFromPonka(QuestionHelper $helper, InputInterface $input, OutputInterface $output)
    {
        // Ask about happy birthday from Ponka
        $question = new Question('- Would you like to hear a Happy Birthday from Ponka right now? > ');
        while (true) {
            $answer = $helper->ask($input, $output, $question);
            if (0 === strcasecmp('yes', $answer)) {
                $output->writeln('Meow! Happy Birthday to you, Ryan! Purrrrr...');
                break;
            }
            $output->writeln('Really?! She\'ll be very upset...');
        }
    }

    private function askHappyBirthdayFromDino(QuestionHelper $helper, InputInterface $input, OutputInterface $output)
    {
        // Ask about happy birthday from Dino
        $question = new Question('- BTW, one Dino from the KnpU would like to say Happy Birthday to you too... OK? > ');
        $helper->ask($input, $output, $question);
        $output->writeln('Ah, never mind! Here it\'s:');
        $output->writeln($this->dinoSayHappyBirthday());
    }

    private function dinoSayHappyBirthday()
    {
        return <<<HEREDOC
 ____________________________________________________
< Yo, man! Happy Birthday to you!                    >
< ROOOOOOOOAAAAAAR!!! Have fun today!                >
<                                                    >
< P.S. I'm waiting for more awesome tuts from you... >
 ----------------------------------------------------
\                             .       .
 \                           / `.   .' "
  \                  .---.  <    > <    >  .---.
   \                 |    \  \ - ~ ~ - /  /    |
         _____          ..-~             ~-..-~
        |     |   \~~~\.'                    `./~~~/
       ---------   \__/                        \__/
      .'  O    \     /               /       \  "
     (_____,    `._.'               |         }  \/~~~/
      `----.          /       }     |        /    \__/
            `-.      |       /      |       /      `. ,~~|
                ~-.__|      /_ - ~ ^|      /- _      `..-'
                     |     /        |     /     ~-.     `-. _  _  _
                     |_____|        |_____|         ~ - . _ _ _ _ _>

HEREDOC;
    }
}
