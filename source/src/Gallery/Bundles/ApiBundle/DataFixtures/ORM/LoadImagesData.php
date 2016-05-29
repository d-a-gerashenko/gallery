<?php

namespace Gallery\Bundles\ApiBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Gallery\Bundles\ApiBundle\Entity\Album;
use Gallery\Bundles\ApiBundle\Entity\Image;

class LoadImagesData implements FixtureInterface
{
  
    public function load(ObjectManager $manager)
    {
        $basePath = '/images/';
        for ($i=1; $i<=5; $i++) {
            $album = new Album();
            $album->setName('album'.$i);
            $manager->persist($album);

            $limit = 30;
            if ($i == 1) {
                $limit = 5;
            }

            for ($j=1; $j<=$limit; $j++) {
                $image = new Image();
                $image->setName('album'.$i.'_'.$j.'_image');
                $image->setAlbum($album);
                $image->setPath($basePath.'album'.$i.'/'.$j.'.jpg');
                $manager->persist($image);
            }
            $manager->flush();
        }
    }
}