<?php

namespace Gallery\Bundles\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Gallery\Bundles\ApiBundle\Repository\AlbumRepository")
 * @ORM\Table(name="album")
 */
class Album
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="Image", mappedBy="album")
     */
    private $albumImages;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->albumImages = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Album
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
     * Add albumImage
     *
     * @param \Gallery\Bundles\ApiBundle\Entity\Image $albumImage
     *
     * @return Album
     */
    public function addAlbumImage(\Gallery\Bundles\ApiBundle\Entity\Image $albumImage)
    {
        $this->albumImages[] = $albumImage;

        return $this;
    }

    /**
     * Remove albumImage
     *
     * @param \Gallery\Bundles\ApiBundle\Entity\Image $albumImage
     */
    public function removeAlbumImage(\Gallery\Bundles\ApiBundle\Entity\Image $albumImage)
    {
        $this->albumImages->removeElement($albumImage);
    }

    /**
     * Get albumImages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAlbumImages()
    {
        return $this->albumImages;
    }
}
