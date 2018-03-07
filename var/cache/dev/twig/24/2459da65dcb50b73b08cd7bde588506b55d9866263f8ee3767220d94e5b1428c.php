<?php

/* dashboard/dashboard-navbar.html.twig */
class __TwigTemplate_22bfe03a294dca49941bb1bf8989cdd01181e08ad4243d7dce307eee3be00311 extends Twig_Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "dashboard/dashboard-navbar.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "dashboard/dashboard-navbar.html.twig"));

        // line 1
        echo "<nav id=\"dashboard-navbar-col\" class=\"navbar navbar-expand-lg navbar-light fixed-top\">
    <div class=\"container-fluid\">
        <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarResponsive\" aria-controls=\"navbarResponsive\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
            <span class=\"navbar-toggler-icon\"></span>
        </button>
        <div class=\"collapse navbar-collapse\">
            <ul class=\"navbar-nav ml-0 mr-auto\">
                <li class=\"nav-item\">
                    <a class=\"nav-link font-weight-bold pl-0\" href=\"/\">PORTFOLIO</a>
                </li>
                <li class=\"nav-item\">
                    <a class=\"nav-link font-weight-bold\" href=\"/\">TODO</a>
                </li>
                <li class=\"nav-item\">
                    <a class=\"nav-link font-weight-bold\" href=\"/\">ECONOMY</a>
                </li>
                <li class=\"nav-item\">
                    <a class=\"nav-link font-weight-bold\" href=\"/\">MAILS</a>
                </li>
                <li class=\"nav-item\">
                    <a class=\"nav-link font-weight-bold\" href=\"/\">SERVERS</a>
                </li>
                ";
        // line 23
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) {
            // line 24
            echo "                <li class=\"nav-item ml-2\">
                    <a class=\"nav-link link font-weight-bold\" href=\"/\">BACK-OFFICE</a>
                </li>
                ";
        }
        // line 28
        echo "                <li class=\"nav-item ml-1\">
                    <a class=\"nav-link link font-weight-bold\" href=\"/logout\">LOGOUT</a>
                </li>
            </ul>
        </div>
    </div>
</nav>";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "dashboard/dashboard-navbar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 28,  55 => 24,  53 => 23,  29 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<nav id=\"dashboard-navbar-col\" class=\"navbar navbar-expand-lg navbar-light fixed-top\">
    <div class=\"container-fluid\">
        <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarResponsive\" aria-controls=\"navbarResponsive\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
            <span class=\"navbar-toggler-icon\"></span>
        </button>
        <div class=\"collapse navbar-collapse\">
            <ul class=\"navbar-nav ml-0 mr-auto\">
                <li class=\"nav-item\">
                    <a class=\"nav-link font-weight-bold pl-0\" href=\"/\">PORTFOLIO</a>
                </li>
                <li class=\"nav-item\">
                    <a class=\"nav-link font-weight-bold\" href=\"/\">TODO</a>
                </li>
                <li class=\"nav-item\">
                    <a class=\"nav-link font-weight-bold\" href=\"/\">ECONOMY</a>
                </li>
                <li class=\"nav-item\">
                    <a class=\"nav-link font-weight-bold\" href=\"/\">MAILS</a>
                </li>
                <li class=\"nav-item\">
                    <a class=\"nav-link font-weight-bold\" href=\"/\">SERVERS</a>
                </li>
                {% if is_granted('ROLE_ADMIN') %}
                <li class=\"nav-item ml-2\">
                    <a class=\"nav-link link font-weight-bold\" href=\"/\">BACK-OFFICE</a>
                </li>
                {% endif %}
                <li class=\"nav-item ml-1\">
                    <a class=\"nav-link link font-weight-bold\" href=\"/logout\">LOGOUT</a>
                </li>
            </ul>
        </div>
    </div>
</nav>", "dashboard/dashboard-navbar.html.twig", "C:\\c03735\\workarea\\labo\\Autres\\test\\templates\\dashboard\\dashboard-navbar.html.twig");
    }
}
