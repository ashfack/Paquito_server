<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PackageCommand
 *
 * @ORM\Table(name="package_command", indexes={@ORM\Index(name="fk_package_command_name_idx", columns={"name"})})
 * @ORM\Entity
 */
class PackageCommand
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_package", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idPackage;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=128)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $name;



    /**
     * Set idPackage
     *
     * @param integer $idPackage
     *
     * @return PackageCommand
     */
    public function setIdPackage($idPackage)
    {
        $this->idPackage = $idPackage;

        return $this;
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

    /**
     * Set name
     *
     * @param string $name
     *
     * @return PackageCommand
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
}
