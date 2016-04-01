<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Yaml
 *
 * @ORM\Table(name="yaml")
 * @ORM\Entity
 */
class Yaml
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=true)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="version", type="integer", nullable=false)
     */
    private $version;

    /**
     * @var string
     *
     * @ORM\Column(name="homepage", type="string", length=45, nullable=true)
     */
    private $homepage;

    /**
     * @var string
     *
     * @ORM\Column(name="summary", type="string", length=128, nullable=true)
     */
    private $summary;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="copyright", type="string", length=128, nullable=true)
     */
    private $copyright;

    /**
     * @var string
     *
     * @ORM\Column(name="maintainer", type="string", length=128, nullable=true)
     */
    private $maintainer;

    /**
     * @var string
     *
     * @ORM\Column(name="depotGitSvn", type="string", length=255, nullable=true)
     */
    private $depotgitsvn;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_yaml", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idYaml;



    /**
     * Set name
     *
     * @param string $name
     *
     * @return Yaml
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
     * Set version
     *
     * @param integer $version
     *
     * @return Yaml
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version
     *
     * @return integer
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set homepage
     *
     * @param string $homepage
     *
     * @return Yaml
     */
    public function setHomepage($homepage)
    {
        $this->homepage = $homepage;

        return $this;
    }

    /**
     * Get homepage
     *
     * @return string
     */
    public function getHomepage()
    {
        return $this->homepage;
    }

    /**
     * Set summary
     *
     * @param string $summary
     *
     * @return Yaml
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * Get summary
     *
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Yaml
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set copyright
     *
     * @param string $copyright
     *
     * @return Yaml
     */
    public function setCopyright($copyright)
    {
        $this->copyright = $copyright;

        return $this;
    }

    /**
     * Get copyright
     *
     * @return string
     */
    public function getCopyright()
    {
        return $this->copyright;
    }

    /**
     * Set maintainer
     *
     * @param string $maintainer
     *
     * @return Yaml
     */
    public function setMaintainer($maintainer)
    {
        $this->maintainer = $maintainer;

        return $this;
    }

    /**
     * Get maintainer
     *
     * @return string
     */
    public function getMaintainer()
    {
        return $this->maintainer;
    }

    /**
     * Set depotgitsvn
     *
     * @param string $depotgitsvn
     *
     * @return Yaml
     */
    public function setDepotgitsvn($depotgitsvn)
    {
        $this->depotgitsvn = $depotgitsvn;

        return $this;
    }

    /**
     * Get depotgitsvn
     *
     * @return string
     */
    public function getDepotgitsvn()
    {
        return $this->depotgitsvn;
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
}
