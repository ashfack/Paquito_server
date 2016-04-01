<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Files
 *
 * @ORM\Table(name="files")
 * @ORM\Entity
 */
class Files
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=128, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="source", type="string", length=128, nullable=false)
     */
    private $source;

    /**
     * @var integer
     *
     * @ORM\Column(name="permissions", type="integer", nullable=false)
     */
    private $permissions;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_file", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFile;



    /**
     * Set name
     *
     * @param string $name
     *
     * @return Files
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
     * Set source
     *
     * @param string $source
     *
     * @return Files
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source
     *
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Set permissions
     *
     * @param integer $permissions
     *
     * @return Files
     */
    public function setPermissions($permissions)
    {
        $this->permissions = $permissions;

        return $this;
    }

    /**
     * Get permissions
     *
     * @return integer
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * Get idFile
     *
     * @return integer
     */
    public function getIdFile()
    {
        return $this->idFile;
    }
}
