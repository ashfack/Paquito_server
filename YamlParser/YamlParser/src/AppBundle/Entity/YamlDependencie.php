<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * YamlDependencie
 *
 * @ORM\Table(name="yaml_dependencie", indexes={@ORM\Index(name="fk_yaml_depend_id_depend_idx", columns={"id_dependencie"})})
 * @ORM\Entity
 */
class YamlDependencie
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
     * @ORM\Column(name="id_dependencie", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idDependencie;



    /**
     * Set idYaml
     *
     * @param integer $idYaml
     *
     * @return YamlDependencie
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
     * Set idDependencie
     *
     * @param integer $idDependencie
     *
     * @return YamlDependencie
     */
    public function setIdDependencie($idDependencie)
    {
        $this->idDependencie = $idDependencie;

        return $this;
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
