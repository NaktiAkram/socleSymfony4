<?php

namespace App\GraphQL\Resolver;

use App\Repository\EndPointsRepository;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;


final class EndPointsResolver implements ResolverInterface, AliasedInterface
{
    /**
     * @var EndPointsRepository
     */
    private $EndPointsRepository;

    /**
     *
     * @param EndPointsRepository $EndPointsRepository
     */
    public function __construct(EndPointsRepository $EndPointsRepository)
    {
        $this->EndPointsRepository = $EndPointsRepository;
    }

    /**
     * @return \App\Entity\EndPoints
     */
    public function resolve(int $id)
    {
        return $this->EndPointsRepository->find($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function getAliases(): array
    {
        return [
            'resolve' => 'EndPoints',
        ];
    }
}