<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PackageFiles
 *
 * @ORM\Table(name="package_files", indexes={@ORM\Index(name="fk_package_files_id_file_idx", columns={"id_file"})})
 * @ORM\Entity
 */
class PackageFiles
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
     * @var integer
     *
     * @ORM\Column(name="id_file", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idFile;



    /**
     * Set idPackage
     *
     * @param integer $idPackage
     *
     * @return PackageFiles
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
     * Set idFile
     *
     * @param integer $idFile
     *
     * @return PackageFiles
     */
    public function setIdFile($idFile)
    {
        $this->idFile = $idFile;

        return $this;
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
