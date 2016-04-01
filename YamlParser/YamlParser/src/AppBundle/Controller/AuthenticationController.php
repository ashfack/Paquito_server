<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Author;
use AppBundle\Form\LoginType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class AuthenticationController extends Controller
{
    /**
     * @Route("/login", name="login_route")
     */
    public function loginAction(Request $request)
    {

        $em   = $this->getDoctrine()->getManager();
        $errors="";
        $form = $this->createForm(LoginType::class, new Author(), ['action' => $this->generateUrl('login'),
            'method' => 'POST']);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $user = new Author();
           $user = $form->getData();

            $pwd=$user->getPassworda();
            $encoder=$this->container->get('security.password_encoder');
            $pwd=$encoder->encodePassword($user, $pwd);

            $repository = $this->getDoctrine()->getRepository('AppBundle:Author');
            $u = $repository->createQueryBuilder('u')
                ->where('u.mail = :mail')
                ->setParameter('mail', $user->getMail())
                ->getQuery()
                ->getOneOrNullResult();

            if(!$u){
               $errors = "L'utilisateur n'existe pas";
            }

            elseif ($pwd==$u->getPassword()){
                $url = $this->generateUrl('user_registration');
                return $this->redirect($url);
            }
            else{
                $errors = "Le mot de passe est incorrect";
            }


        }
        return $this->render('AppBundle:authentication:login.html.twig', array(
            'form' => $form->createView(),
            'message'=>$errors
        ));
    }

    /**
     * @Route("/login_check, login_check")
     */
    public function loginCheckAction()
    {
    }

}
