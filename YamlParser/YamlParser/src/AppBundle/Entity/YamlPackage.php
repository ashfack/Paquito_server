<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * YamlPackage
 *
 * @ORM\Table(name="yaml_package", indexes={@ORM\Index(name="fk_yaml_package_id_package_idx", columns={"id_package"})})
 * @ORM\Entity
 */
class YamlPackage
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_yaml", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idYaml;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_package", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idPackage;



    /**
     * Set idYaml
     *
     * @param integer $idYaml
     *
     * @return YamlPackage
     */
    public function setIdYaml($idYaml)
    {
        $this->idYaml = $idYaml;

        return $this;
    }

    /**
     * Get idYaml
     *
     * @return integer
     */
    public function getIdYaml()
    {
        return $this->idYaml;
    }

    /**
     * Set idPackage
     *
     * @param integer $idPackage
     *
     * @return YamlPackage
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
}
