<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Yaml;
use AppBundle\Validator\Constraints\IsYaml;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use AppBundle\Entity\YamlAuthor;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\HttpFoundation\Request;

class ProjectController extends Controller
{
    /**
     * @Route("/new")
     */
    public function newAction(Request $request){


        $form = $this->createFormBuilder()->add('NomProjet')
                    ->add('Version')
                    ->add('Auteur')
                    ->add('Mainteneur')
                    ->add('Description')
                    ->add('Dependencies')
                    ->add('Fichiers')
                    ->getForm();
        if ($request->getMethod() == 'POST')
        {
            $em   = $this->getDoctrine()->getManager();

            $yaml = new Yaml();
            $yaml->setDescription($request->request->all()['form']['Description'])
                ->setMaintainer($request->request->all()['form']['Mainteneur'])
                ->setVersion($request->request->all()['form']['Version'])
                ->setName($request->request->all()['form']['NomProjet']);

            $em->persist($yaml);
            $em->flush();

            $repository = $this->getDoctrine()->getRepository('AppBundle:Author');
            $u = $repository->createQueryBuilder('u')
                ->where('u.mail = :mail')
                ->setParameter('mail', $request->request->all()['form']['Auteur'])
                ->getQuery()
                ->getOneOrNullResult();

            $yaml_auteur = new YamlAuthor();
            $yaml_auteur->setIdYaml($yaml->getIdYaml())
                        ->setIdAuthor($u->getIdAuthor());

            $em->persist($yaml_auteur);
            $em->flush();

        }

            return $this->render('AppBundle:project:new.html.twig', array(
            'form' => $form->createView()
        ));
    }


    /**
     * Finds and displays a project.
     *
     * @Route("/{id}")
     */
    public function viewDetailsAction($id){

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT p.idAuthor FROM AppBundle:Yaml a
             JOIN AppBundle:YamlAuthor b with  a.idYaml = b.idYaml
             JOIN AppBundle:Author p with  p.idAuthor = b.idAuthor
             WHERE a.idYaml =:id'
        );
        $query->setParameter('id',$id);
        $authors = $query->getArrayResult();

        $a = array();
        foreach($authors as $author) {
            $auteur = $this->getDoctrine()
                ->getRepository('AppBundle:Author')
                ->find($author['idAuthor']);
            $a[] = $auteur;
        }
        $yaml = $this->getDoctrine()
            ->getRepository('AppBundle:Yaml')
            ->find($id);

        return $this->render('AppBundle:project:show.html.twig', array(
            'yaml' => $yaml,
            'auteurs'=>$a
        ));
    }

    /**
     * @Route("/parse")
     */
    public function parseFileAction(Request $request){


        /*$form = $this->createFormBuilder()->add('fichier', FileType::class, array('label' => 'fichier YAML'))
            ->getForm();
        if ($form->isValid()) {

            $file = $request->request->all()['form']['fichier'];
            $fileName = md5(uniqid()).'.'.$file->guessExtension();


            $uploadDir = $this->container->getParameter('kernel.root_dir').'/../web/uploads';
            $file->move($uploadDir, $fileName);

            \Symfony\Component\Yaml\Yaml::parse(file_get_contents($uploadDir."paquito.yaml"));

            return $this->redirect($this->generateUrl('user_project'));
        }
        */
		$path = $this->get('kernel')->getRootDir() . '\config\config_test.yml';
$data = file_get_contents($path);
                 
$form = $this->createFormBuilder()->getForm();
$form->add("fichier_parse",TextareaType::class,array(
        'attr' => array('cols' => '30','rows'=>'30'),
        'constraints'=> new IsYaml()
));
$form->get('fichier_parse')->setData($data);
     
/*$request = $this->get('request');
if ($request->getMethod() == 'POST') {
    $form->submit($request);
    if ($form->isValid()) {
             
        $data = $form->getData('data');                 
        file_put_contents($path, $data);
         
         
             
    }
}*/
        return $this->render('AppBundle:project:parse.html.twig', array(
            'form' => $form->createView(),
        ));

    }
	
	private function chargeFichier(){
        try {
            $this->fichier = $this->yaml->parse(file_get_contents($this->cheminFichier));
        } catch (ParseException $e) {
            printf("Unable to parse the YAML string: %s", $e->getMessage());
        }
    }




}