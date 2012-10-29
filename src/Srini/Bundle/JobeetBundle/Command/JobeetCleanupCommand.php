<?php

namespace Srini\Bundle\JobeetBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Ens\JobeetBundle\Entity\Job;
 
class JobeetCleanupCommand extends ContainerAwareCommand {
 
  protected function configure()
  {
    $this
      ->setName('srini:jobeet:cleanup')
      ->setDescription('Cleanup Jobeet database')
      ->addArgument('days', InputArgument::OPTIONAL, 'The email', 90)
    ;
  }
 
  protected function execute(InputInterface $input, OutputInterface $output)
  {
    $days = $input->getArgument('days');
 
    $em = $this->getContainer()->get('doctrine')->getEntityManager();
    $nb = $em->getRepository('SriniJobeetBundle:Job')->cleanup($days);
 
    $output->writeln(sprintf('Removed %d stale jobs', $nb));
  }
}