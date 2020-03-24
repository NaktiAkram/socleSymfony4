<?php


namespace App\GraphQL\Resolver;


use Doctrine\ORM\EntityManagerInterface;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;

class ConfigMapResolver implements ResolverInterface, AliasedInterface
{

    private $em;

    public function __construct(EntityManagerInterface $em)
    {

        $this->em = $em;
    }

    public function resolve(){
        $configmaps = $this->em->getRepository('App:ConfigMap')->findAll();
        return $configmaps;
    }

    public static function getAliases(): array
    {
        return ['resolve' => 'ConfigMaps'];
    }
}