<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * YamlAuthor
 *
 * @ORM\Table(name="yaml_author", indexes={@ORM\Index(name="id_author_idx", columns={"id_author"})})
 * @ORM\Entity
 */
class YamlAuthor
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
     * @ORM\Column(name="id_author", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idAuthor;



    /**
     * Set idYaml
     *
     * @param integer $idYaml
     *
     * @return YamlAuthor
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
     * Set idAuthor
     *
     * @param integer $idAuthor
     *
     * @return YamlAuthor
     */
    public function setIdAuthor($idAuthor)
    {
        $this->idAuthor = $idAuthor;

        return $this;
    }

    /**
     * Get idAuthor
     *
     * @return integer
     */
    public function getIdAuthor()
    {
        return $this->idAuthor;
    }
}
