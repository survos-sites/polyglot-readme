<?php

namespace App\Command;

use App\Entity\Document;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand('show-translations')]
class ShowTranslationCommand extends Command
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager,
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->addArgument('document-id', InputArgument::REQUIRED);
        $this->addArgument('locale', InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $docuentId = $input->getArgument('document-id');
        $document = $this->entityManager->find(Document::class, $docuentId);

        if (!$document) {
            $output->writeln('<error>Document not found</error>');

            return Command::FAILURE;
        }

        $locale = $input->getArgument('locale');

        $output->writeln($document->getText()->translate($locale));

        $this->entityManager->clear();
        $this->entityManager->find(Document::class, $docuentId);

        return Command::SUCCESS;
    }
}
