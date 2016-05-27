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
     * Constructor
     */
    public function __construct()
    {
        $this->images = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add image
     *
     * @param \Gallery\Bundles\ApiBundle\Entity\Image $image
     *
     * @return Album
     */
    public function addImage(\Gallery\Bundles\ApiBundle\Entity\Image $image)
    {
        $this->images[] = $image;

        return $this;
    }

    /**
     * Remove image
     *
     * @param \Gallery\Bundles\ApiBundle\Entity\Image $image
     */
    public function removeImage(\Gallery\Bundles\ApiBundle\Entity\Image $image)
    {
        $this->images->removeElement($image);
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Add aaa
     *
     * @param \Gallery\Bundles\ApiBundle\Entity\Image $aaa
     *
     * @return Album
     */
    public function addAaa(\Gallery\Bundles\ApiBundle\Entity\Image $aaa)
    {
        $this->aaa[] = $aaa;

        return $this;
    }

    /**
     * Remove aaa
     *
     * @param \Gallery\Bundles\ApiBundle\Entity\Image $aaa
     */
    public function removeAaa(\Gallery\Bundles\ApiBundle\Entity\Image $aaa)
    {
        $this->aaa->removeElement($aaa);
    }

    /**
     * Get aaa
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAaa()
    {
        return $this->aaa;
    }

    /**
     * Add aimage
     *
     * @param \Gallery\Bundles\ApiBundle\Entity\Image $aimage
     *
     * @return Album
     */
    public function addAimage(\Gallery\Bundles\ApiBundle\Entity\Image $aimage)
    {
        $this->aimages[] = $aimage;

        return $this;
    }

    /**
     * Remove aimage
     *
     * @param \Gallery\Bundles\ApiBundle\Entity\Image $aimage
     */
    public function removeAimage(\Gallery\Bundles\ApiBundle\Entity\Image $aimage)
    {
        $this->aimages->removeElement($aimage);
    }

    /**
     * Get aimages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAimages()
    {
        return $this->aimages;
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
