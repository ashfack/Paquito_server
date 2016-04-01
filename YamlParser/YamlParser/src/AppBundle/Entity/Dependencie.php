<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dependencie
 *
 * @ORM\Table(name="dependencie")
 * @ORM\Entity
 */
class Dependencie
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=128, nullable=false)
     */
    private $name;

    /**
     * @var boolean
     *
     * @ORM\Column(name="flag_runtime_build", type="boolean", nullable=false)
     */
    private $flagRuntimeBuild;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_dependencie", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDependencie;



    /**
     * Set name
     *
     * @param string $name
     *
     * @return Dependencie
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
     * Set flagRuntimeBuild
     *
     * @param boolean $flagRuntimeBuild
     *
     * @return Dependencie
     */
    public function setFlagRuntimeBuild($flagRuntimeBuild)
    {
        $this->flagRuntimeBuild = $flagRuntimeBuild;

        return $this;
    }

    /**
     * Get flagRuntimeBuild
     *
     * @return boolean
     */
    public function getFlagRuntimeBuild()
    {
        return $this->flagRuntimeBuild;
    }

    /**
     * Get idDependencie
     *
     * @return integer
     */
    public function getIdDependencie()
    {
        return $this->idDependencie;
    }
}
