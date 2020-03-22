<?php

namespace App\Mutation;

use App\Entity\EndPoints;
use App\Entity\Value;

use Doctrine\ORM\EntityManagerInterface;

use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\MutationInterface;

class EndPointsMutation  implements MutationInterface , AliasedInterface
{
     /**
     * @var EntityManagerInterface
     */
    private $em;
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }
    /**
     * {@inheritdoc}
     */public static function getAliases(): array{
        return [
            'new' => 'EndPointsNew' ,

        ];
    }

   
    public function new(array $input){
        $var1 = 'ipAddress';
        $var2 = 'port';
        
        $EndPoints = new EndPoints();
        $EndPoints->setKind($input['kind']);
        $EndPoints->setApiVersion($input['apiVersion']);
        $EndPoints->setNamespace($input['namespace']);
        $EndPoints->setName($input['name']);
        $EndPoints->setLabels($input['labels']);
        $EndPoints->setIpAdress('{{ .values.'.$input['kind'].'.'.$var1.' }}');
        $EndPoints->setPort('{{ .values.'.$input['kind'].'.'.$var2.' }}');
        $this->em->persist($EndPoints);
        $this->em->flush();
        
        return $EndPoints;
    }
    
    

}