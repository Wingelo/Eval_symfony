<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 5; $i++) {
            $category = new Category();
            $category->setName("name".$i);

            $manager->persist($category);
        }

        for ($i = 0; $i < 20; $i++) {
            $product = new Post();
            $product->setTitle('title'.$i);
            $product->setDate(2000+$i);
            $product->setContent('Je suis Link aide moi'.$i);



            if($i % 2 == 0){
                $product->setFeatured(true);
            }else{
                $product->setFeatured(false);
            }
            $manager->persist($product);
        }

        $manager->flush();
    }
}
