<?php
/**
 * Created by PhpStorm.
 * User: Elie
 * Date: 16/12/2017
 * Time: 17:45
 */

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PortfolioController extends Controller
{
    /**
     * @Route("/", name="portfolio")
     */
    public function home() {
        return $this->render('portfolio/home.html.twig');
    }

    /* Navbar */

    public function navbarAction () {
        return $this->render('portfolio/home-navbar.html.twig');
    }

    /* Navbtns */

    public function navbtnsAction () {
        return $this->render('portfolio/home-navbtns.html.twig');
    }

    /* Header */

    public function sectionHeaderAction () {
        return $this->render('portfolio/home-section-header.html.twig');
    }

    /* About */

    public function sectionAboutAction () {
        return $this->render('portfolio/home-section-about.html.twig');
    }

    /* Services */

    public function sectionServicesAction () {
        return $this->render('portfolio/home-section-services.html.twig');
    }

    /* Works */

    public function sectionWorksAction () {
        return $this->render('portfolio/home-section-works.html.twig');
    }

    /* Contact */

    public function sectionContactAction () {
        return $this->render('portfolio/home-section-contact.html.twig');
    }

}
