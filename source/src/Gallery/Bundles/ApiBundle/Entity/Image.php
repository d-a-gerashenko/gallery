<?php

namespace Gallery\Bundles\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="image")
 */
class Image
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Album", inversedBy="images")
     * @ORM\JoinColumn(name="album_id", referencedColumnName="id")
     */
    private $album;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $position;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $name;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $path;
    
    

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
     * Set position
     *
     * @param integer $position
     *
     * @return Image
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Image
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
     * Set path
     *
     * @param string $path
     *
     * @return Image
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set album
     *
     * @param \Gallery\Bundles\ApiBundle\Entity\Album $album
     *
     * @return Image
     */
    public function setAlbum(\Gallery\Bundles\ApiBundle\Entity\Album $album = null)
    {
        $this->album = $album;

        return $this;
    }

    /**
     * Get album
     *
     * @return \Gallery\Bundles\ApiBundle\Entity\Album
     */
    public function getAlbum()
    {
        return $this->album;
    }
}
