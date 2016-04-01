<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DependencieDistribPaquet
 *
 * @ORM\Table(name="dependencie_distrib_paquet", indexes={@ORM\Index(name="fk_depend_distrib_id_distribNP_idx", columns={"id_distributionNP"})})
 * @ORM\Entity
 */
class DependencieDistribPaquet
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_dependencie", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idDependencie;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_distributionNP", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idDistributionnp;



    /**
     * Set idDependencie
     *
     * @param integer $idDependencie
     *
     * @return DependencieDistribPaquet
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

    /**
     * Set idDistributionnp
     *
     * @param integer $idDistributionnp
     *
     * @return DependencieDistribPaquet
     */
    public function setIdDistributionnp($idDistributionnp)
    {
        $this->idDistributionnp = $idDistributionnp;

        return $this;
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
