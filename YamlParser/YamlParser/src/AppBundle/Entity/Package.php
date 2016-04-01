<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Package
 *
 * @ORM\Table(name="package")
 * @ORM\Entity
 */
class Package
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=128, nullable=true)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_package", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPackage;



    /**
     * Set name
     *
     * @param string $name
     *
     * @return Package
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get idPackage
     *
     * @return integer
     */
    public function getIdPackage()
    {
        return $this->idPackage;
    }
}
