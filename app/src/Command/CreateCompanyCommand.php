<?php
namespace App\Command;

use RuntimeException;
use App\Entity\Compagnie;
use App\Repository\CompagnieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;

// the name of the command is what users type after "php bin/console"
#[AsCommand(
    name: 'create-company',
    description: 'Creates a new company.',
    hidden: false,
)]
class CreateCompanyCommand extends Command {

    private $io;
    private $entityManager;
    private $compagnieRepository;
    protected static $defaultDescription = 'Creates a new Company.';

    public function __construct(EntityManagerInterface $entityManager, CompagnieRepository $compagnieRepository) {
        $this->entityManager = $entityManager;
        $this->compagnieRepository = $compagnieRepository;

        parent::__construct();
    }

    protected function configure(): void {
        $this
            // the command help shown when running the command with the "--help" option
            ->setHelp('This command allows you to create a Company')
            ->addArgument('compagnie_name', InputArgument::OPTIONAL, 'compagnie name.')
            ->addArgument('compagnie_pays', InputArgument::OPTIONAL, 'compagnie pays.')
            ->addArgument('compagnie_short_name', InputArgument::OPTIONAL, 'compagnie short name.')
        ;
    }

    protected function initialize(InputInterface $input, OutputInterface $output) {
        $this->io = new SymfonyStyle($input, $output);
    }

    protected function interact(InputInterface $input, OutputInterface $output) {
        $this->io->section("AJOUT D'UNE COMPAGNIE EN BASE DE DONNEES");
        $this->enterName($input, $output);
        $this->enterPays($input, $output);
        $this->enterShortName($input, $output);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln([
            'Company Creator',
            '=================',
            '',
        ]);

        $name = $input->getArgument('compagnie_name');
        $pays = $input->getArgument('compagnie_pays');
        $shortName = $input->getArgument('compagnie_short_name');

        $compagnie = new Compagnie();

        $compagnie->setName($name);
        $compagnie->setCountryOrigin($pays);
        $compagnie->setNameShort($shortName);

        $this->entityManager->persist($compagnie);
        $this->entityManager->flush();

        $this->io->success('Nouvelle Compagnie ajouté');
    
        return Command::SUCCESS;
    }

    private function enterName(InputInterface $input, OutputInterface $output): void {
        $helper = $this->getHelper('question');
        $ask_name = new Question("Donnez un nom à votre compagnie:\n");
        $name = $helper->ask($input, $output, $ask_name);

        if ($this->nameExists($name)) {
            throw new RuntimeException(sprintf("Compagnie déjà existante"));
        }

        $input->setArgument('compagnie_name', $name);
    }

    private function enterPays(InputInterface $input, OutputInterface $output): void {
        $helper = $this->getHelper('question');
        $ask_pays = new Question("Renseignez le pays de votre compagnie:\n");
        $pays = $helper->ask($input, $output, $ask_pays);

        $input->setArgument('compagnie_pays', $pays);
    }

    private function enterShortName(InputInterface $input, OutputInterface $output): void {
        $helper = $this->getHelper('question');
        $ask_ShortName = new Question("Rensignez le nom abrégé de votre compagnie:\n");
        $ShortName = $helper->ask($input, $output, $ask_ShortName);

        $input->setArgument('compagnie_short_name', $ShortName);
    }

    private function nameExists($name) {
        return $this->compagnieRepository->findOneBy([
            'name' => $name
        ]);
    }
}

?>