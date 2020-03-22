<?php


namespace App\GraphQL\Mutations;


use App\Entity\Environments;
use Doctrine\ORM\EntityManagerInterface;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\MutationInterface;

class EnvironmentsMutation implements MutationInterface, AliasedInterface
{

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function resolve(array $input){
        $environment = new Environments();
        $environment->setEnv($input['env']);

        $this->em->persist($environment);
        $this->em->flush();

        return $environment;
    }

    public static function getAliases(): array
    {
        return array('resolve' => 'NewEnvironment');
    }
}