<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Author;
use AppBundle\Form\RegistrationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class RegistrationController extends Controller
{

    /**
     * @Route("/register")
     */
    public function registerAction(Request $req)
    {
        $em   = $this->getDoctrine()->getManager();
        $form = $this->createForm(RegistrationType::class, new Author(), ['action' => $this->generateUrl('user_registration'),
                                                                         'method' => 'POST']);
        $errors="";
        $form->handleRequest($req);
        if ($form->isSubmitted()) {
			
            $user = new Author();
            $user = $form->getData();

            $repository = $this->getDoctrine()->getRepository('AppBundle:Author');
            $u = $repository->createQueryBuilder('u')
                ->where('u.mail = :mail')
                ->setParameter('mail', $user->getMail())
                ->getQuery()
                ->getOneOrNullResult();

            if(!$u){
                $pwd=$user->getPassworda();
                $encoder=$this->container->get('security.password_encoder');
                $pwd=$encoder->encodePassword($user, $pwd);
                $user->setPassworda($pwd);

                $em->persist($user);
                $em->flush();

                $url = $this->generateUrl('login');
                return $this->redirect($url);
            }else{
                $errors = "Un utilisateur avec cette adresse email existe déjà";
            }


        }
        return $this->render('AppBundle:registration:register.html.twig', array(
            'form' => $form->createView(),
            'message'=>$errors
        ));
    }


    public function generateDynamicSalt()
    {
        $dynamicSalt = '';
        for ($i = 0; $i < 50; $i++) {
            $dynamicSalt .= chr(rand(33, 126));
        }
        return $dynamicSalt;
    }

}
