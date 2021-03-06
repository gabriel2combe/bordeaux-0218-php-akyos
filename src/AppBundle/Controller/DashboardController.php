<?php
/**
 * Created by PhpStorm.
 * User: Aurélien <aurelien@wildcodeschool.fr>
 * Date: 03/07/18
 * Time: 10:15
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Intervention;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DashboardController extends Controller
{
    /**
     * @Route("/", name="dashboard")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            $interventions = $em->getRepository('AppBundle:Intervention')
                ->findBy([ 'interventionDate' => new \DateTime(date('Y-m-d')) ]);
        } else {
            $interventions = $em->getRepository(Intervention::class)
                ->findBySyndicateAndDate($this->getUser()->getSyndicate(), new \DateTime(date('Y-m-d')));
        }

        $newRequests = $em->getRepository(Intervention::class)->countRequests('progress', Intervention::TO_PLAN);

        return $this->render('dashboard/index.html.twig', [
            'interventions' => $interventions,
            'newRequests' => $newRequests
        ]);
    }
}
