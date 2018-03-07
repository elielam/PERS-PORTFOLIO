<?php

/* portfolio/home-navbar.html.twig */
class __TwigTemplate_c4e160e62f2717a3f5df98435c8a96bc14079c318b09c3c7683985c942c96327 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "portfolio/home-navbar.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "portfolio/home-navbar.html.twig"));

        // line 1
        echo "<nav id=\"home-navbar-col\" class=\"navbar navbar-expand-lg navbar-light fixed-top\">
    <div class=\"container-fluid\">
        <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarResponsive\" aria-controls=\"navbarResponsive\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
            <span class=\"navbar-toggler-icon\"></span>
        </button>
        <div class=\"collapse navbar-collapse\">
            <ul class=\"navbar-nav ml-0 mr-auto\">
                <li class=\"nav-item\">
                    <a class=\"nav-link font-weight-bold\" href=\"#header-container\">HOME</a>
                </li>
                <li class=\"nav-item\">
                    <a class=\"nav-link font-weight-bold\" href=\"#about-container\">ABOUT</a>
                </li>
                <li class=\"nav-item\">
                    <a class=\"nav-link font-weight-bold\" href=\"#services-container\">SERVICES</a>
                </li>
                <li class=\"nav-item\">
                    <a class=\"nav-link font-weight-bold\" href=\"#works-container\">WORKS</a>
                </li>
                <li class=\"nav-item\">
                    <a class=\"nav-link font-weight-bold\" href=\"#contact-container\">CONTACT</a>
                </li>
            </ul>
            <ul class=\"navbar-nav ml-auto mr-0\">
                ";
        // line 25
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_USER")) {
            // line 26
            echo "                    <li class=\"nav-item mr-2\">
                        <a class=\"nav-link link font-weight-bold\" href=\"";
            // line 27
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("dashboard");
            echo "\">DASHBOARD</a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link link font-weight-bold\" href=\"/logout\">LOGOUT</a>
                    </li>
                ";
        } elseif ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) {
            // line 33
            echo "                    <li class=\"nav-item mr-1\">
                        <a class=\"nav-link link font-weight-bold\" href=\"";
            // line 34
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("dashboard");
            echo "\">DASHBOARD</a>
                    </li>
                    <li class=\"nav-item mr-1\">
                        <a class=\"nav-link link font-weight-bold\" href=\"#\">BACK-OFFICE</a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link link font-weight-bold\" href=\"/logout\">LOGOUT</a>
                    </li>
                ";
        } else {
            // line 43
            echo "                    <li class=\"nav-item\">
                        <a class=\"nav-link link font-weight-bold\" href=\"";
            // line 44
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("login");
            echo "\">LOGIN</a>
                    </li>
                ";
        }
        // line 47
        echo "            </ul>
        </div>

    </div>
</nav>";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "portfolio/home-navbar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 47,  87 => 44,  84 => 43,  72 => 34,  69 => 33,  60 => 27,  57 => 26,  55 => 25,  29 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<nav id=\"home-navbar-col\" class=\"navbar navbar-expand-lg navbar-light fixed-top\">
    <div class=\"container-fluid\">
        <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarResponsive\" aria-controls=\"navbarResponsive\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
            <span class=\"navbar-toggler-icon\"></span>
        </button>
        <div class=\"collapse navbar-collapse\">
            <ul class=\"navbar-nav ml-0 mr-auto\">
                <li class=\"nav-item\">
                    <a class=\"nav-link font-weight-bold\" href=\"#header-container\">HOME</a>
                </li>
                <li class=\"nav-item\">
                    <a class=\"nav-link font-weight-bold\" href=\"#about-container\">ABOUT</a>
                </li>
                <li class=\"nav-item\">
                    <a class=\"nav-link font-weight-bold\" href=\"#services-container\">SERVICES</a>
                </li>
                <li class=\"nav-item\">
                    <a class=\"nav-link font-weight-bold\" href=\"#works-container\">WORKS</a>
                </li>
                <li class=\"nav-item\">
                    <a class=\"nav-link font-weight-bold\" href=\"#contact-container\">CONTACT</a>
                </li>
            </ul>
            <ul class=\"navbar-nav ml-auto mr-0\">
                {% if is_granted('ROLE_USER') %}
                    <li class=\"nav-item mr-2\">
                        <a class=\"nav-link link font-weight-bold\" href=\"{{ path(\"dashboard\") }}\">DASHBOARD</a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link link font-weight-bold\" href=\"/logout\">LOGOUT</a>
                    </li>
                {% elseif is_granted('ROLE_ADMIN') %}
                    <li class=\"nav-item mr-1\">
                        <a class=\"nav-link link font-weight-bold\" href=\"{{ path(\"dashboard\") }}\">DASHBOARD</a>
                    </li>
                    <li class=\"nav-item mr-1\">
                        <a class=\"nav-link link font-weight-bold\" href=\"#\">BACK-OFFICE</a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link link font-weight-bold\" href=\"/logout\">LOGOUT</a>
                    </li>
                {% else %}
                    <li class=\"nav-item\">
                        <a class=\"nav-link link font-weight-bold\" href=\"{{ path(\"login\") }}\">LOGIN</a>
                    </li>
                {% endif %}
            </ul>
        </div>

    </div>
</nav>", "portfolio/home-navbar.html.twig", "C:\\c03735\\workarea\\labo\\Autres\\test\\templates\\portfolio\\home-navbar.html.twig");
    }
}
