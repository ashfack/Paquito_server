<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DistributionNamePaquet
 *
 * @ORM\Table(name="distribution_name_paquet")
 * @ORM\Entity
 */
class DistributionNamePaquet
{
    /**
     * @var string
     *
     * @ORM\Column(name="distribution", type="string", length=128, nullable=false)
     */
    private $distribution;

    /**
     * @var string
     *
     * @ORM\Column(name="name_paquet", type="string", length=128, nullable=false)
     */
    private $namePaquet;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_distributionNP", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDistributionnp;



    /**
     * Set distribution
     *
     * @param string $distribution
     *
     * @return DistributionNamePaquet
     */
    public function setDistribution($distribution)
    {
        $this->distribution = $distribution;

        return $this;
    }

    /**
     * Get distribution
     *
     * @return string
     */
    public function getDistribution()
    {
        return $this->distribution;
    }

    /**
     * Set namePaquet
     *
     * @param string $namePaquet
     *
     * @return DistributionNamePaquet
     */
    public function setNamePaquet($namePaquet)
    {
        $this->namePaquet = $namePaquet;

        return $this;
    }

    /**
     * Get namePaquet
     *
     * @return string
     */
    public function getNamePaquet()
    {
        return $this->namePaquet;
    }

    /**
     * Get idDistributionnp
     *
     * @return integer
     */
    public function getIdDistributionnp()
    {
        return $this->idDistributionnp;
    }
}
