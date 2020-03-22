<?php


namespace App\GraphQL\Resolver;


use App\Entity\Environments;
use Doctrine\ORM\EntityManagerInterface;
use Overblog\GraphQLBundle\Definition\Argument;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;

class EnvironmentsResolver implements ResolverInterface, AliasedInterface
{
    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function resolve()
    {
        $environments = $this->em->getRepository('App:Environments')->findAll();
        return $environments;

    }

    public function resolveOne(Argument $argument){
        $environment = $this->em->getRepository('App:Environments')->find($argument['id']);
        return $environment;
    }

    public static function getAliases(): array
    {
        return [
            'resolve' => 'Environments',
            'resolveOne' => 'Environment',
        ];
    }
}