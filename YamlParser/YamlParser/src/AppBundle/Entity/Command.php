<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Command
 *
 * @ORM\Table(name="command")
 * @ORM\Entity
 */
class Command
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=128)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $name;



    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
