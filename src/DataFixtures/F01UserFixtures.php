<?php

namespace App\DataFixtures;

use App\Entity\AdminSystem;
use App\Entity\Client;
use App\Entity\Profil;
use Faker\Factory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class F01UserFixtures extends Fixture
{
    private $encoder;
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder =$encoder;
    }
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        $profil_Admin = new Profil();
        $profil_Admin->setLibelle("ADMIN_SYSTEME");
        $profil_Admin->setArchive(false);
        $manager->persist($profil_Admin);

        $profil_Caissier = new Profil();
        $profil_Caissier->setLibelle("CAISSIER");
        $profil_Caissier->setArchive(false);
        $manager->persist($profil_Caissier);

        $profil_AdminAgence = new Profil();
        $profil_AdminAgence->setLibelle("ADMIN_AGENCE");
        $profil_AdminAgence->setArchive(false);
        $manager->persist($profil_AdminAgence);

        $profil_UserAgence = new Profil();
        $profil_UserAgence->setLibelle("UTILISATEUR_AGENCE");
        $profil_UserAgence->setArchive(false);
        $manager->persist($profil_UserAgence);


        
        for ($i=0; $i <10 ; $i++) { 

            $client = new Client();
            $password =$this->encoder->encodePassword($client,"passer");
            $client->setUsername($faker->userName)
                   ->setPassword($password)
                   ->setNomComplet($faker->name())
                   ->setTelephone($faker->phoneNumber)
                   ->setCNI($faker->text(20));
            $manager->persist($client);


            $user = new AdminSystem();
            $password =$this->encoder->encodePassword($user,"passer");
            $user->setPrenom($faker->userName)
                 ->setNom($faker->lastName)
                 ->setUsername($faker->userName)
                 ->setPassword($password)
                 ->setEmail($faker->email)
                 ->setArchive(false);
            
            if($i<=3){ 
                $user->setProfil($profil_Admin);
                $manager->persist($user);   
                //->setPhoto($faker->image($dir = '/tmp', $width = 640, $height = 480));     
            }elseif ($i<=5) {
                $user->setProfil($profil_Caissier);
                $manager->persist($user);   
            }elseif ($i<=7) {
                $user->setProfil($profil_AdminAgence);
                $manager->persist($user);   
            }else{
                $user->setProfil($profil_UserAgence);
                $manager->persist($user);   
            }

        }
        $manager->flush();
    }
}
