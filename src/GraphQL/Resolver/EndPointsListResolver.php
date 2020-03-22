<?php
namespace App\GraphQL\Resolver;
use Doctrine\ORM\EntityManagerInterface;
use Overblog\GraphQLBundle\Definition\Argument;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;
class EndPointsListResolver implements ResolverInterface, AliasedInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $em;
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }
    public function resolve(Argument $argument)
    {
        $EndPoints = $this->em->getRepository('App:EndPoints')
        ->findBy([],[],$argument['limit'],0);
        return ['EndPoints' => $EndPoints];
    }
    /**
     * @return array
     */
    public static function getAliases(): array
    {
        return [
            'resolve' => 'EndPointsList'
        ];
    }
}