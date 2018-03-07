<?php

/* dashboard/dashboard.html.twig */
class __TwigTemplate_c29c131d9b42c82112015f6dc7c06e33771916c60af4b3f081b6078455d47fb5 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "dashboard/dashboard.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "dashboard/dashboard.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "dashboard/dashboard.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "
    ";
        // line 6
        echo "
    ";
        // line 7
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment(Symfony\Bridge\Twig\Extension\HttpKernelExtension::controller("App\\Controller\\DashboardController::navbarAction"));
        echo "

    ";
        // line 10
        echo "
    ";
        // line 11
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment(Symfony\Bridge\Twig\Extension\HttpKernelExtension::controller("App\\Controller\\DashboardController::navbtnsAction"));
        echo "

    <div id=\"dashboard-home-container\" class=\"container-fluid\">
        <div id=\"dashboard-home-row\" class=\"row\">
            <div id=\"dashboard-home-col\" class=\"col-sm-12 h-100 w-100 pl-5 pt-3\">
                <div id=\"dashboard-components-row\" class=\"row\">

                    <div id=\"todoComponent-col\" class=\"col-2\">
                        <div class=\"row\">

                            <div id=\"todoComponent-header\" class=\"col-12 bg-dark\">
                            </div>

                            <div class=\"col-12 todoComponent-element bg-secondary\">
                                <div class=\"row\">

                                    <div class=\"col-2 todoComponent-element-left text-center\">
                                        <span><i class=\"fas fa-chevron-right fa-2x mt-2\"></i></span>
                                    </div>

                                    <div class=\"col-10 todoComponent-element-right\">
                                        <h6 class=\"p-0 font-weight-bold mt-2\"></h6>
                                    </div>

                                </div>
                            </div>

                            <div class=\"col-12 todoComponent-element bg-secondary\">
                                <div class=\"row\">

                                    <div class=\"col-2 todoComponent-element-left text-center\">
                                        <span><i class=\"fas fa-chevron-right fa-2x mt-2\"></i></span>
                                    </div>

                                    <div class=\"col-10 todoComponent-element-right\">
                                        <h6 class=\"p-0 font-weight-bold mt-2\"></h6>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "dashboard/dashboard.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 11,  64 => 10,  59 => 7,  56 => 6,  53 => 4,  44 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"base.html.twig\" %}

{% block body %}

    {# NAVBAR #}

    {{ render(controller('App\\\\Controller\\\\DashboardController::navbarAction')) }}

    {# NAV BUTTON #}

    {{ render(controller('App\\\\Controller\\\\DashboardController::navbtnsAction')) }}

    <div id=\"dashboard-home-container\" class=\"container-fluid\">
        <div id=\"dashboard-home-row\" class=\"row\">
            <div id=\"dashboard-home-col\" class=\"col-sm-12 h-100 w-100 pl-5 pt-3\">
                <div id=\"dashboard-components-row\" class=\"row\">

                    <div id=\"todoComponent-col\" class=\"col-2\">
                        <div class=\"row\">

                            <div id=\"todoComponent-header\" class=\"col-12 bg-dark\">
                            </div>

                            <div class=\"col-12 todoComponent-element bg-secondary\">
                                <div class=\"row\">

                                    <div class=\"col-2 todoComponent-element-left text-center\">
                                        <span><i class=\"fas fa-chevron-right fa-2x mt-2\"></i></span>
                                    </div>

                                    <div class=\"col-10 todoComponent-element-right\">
                                        <h6 class=\"p-0 font-weight-bold mt-2\"></h6>
                                    </div>

                                </div>
                            </div>

                            <div class=\"col-12 todoComponent-element bg-secondary\">
                                <div class=\"row\">

                                    <div class=\"col-2 todoComponent-element-left text-center\">
                                        <span><i class=\"fas fa-chevron-right fa-2x mt-2\"></i></span>
                                    </div>

                                    <div class=\"col-10 todoComponent-element-right\">
                                        <h6 class=\"p-0 font-weight-bold mt-2\"></h6>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

{% endblock %}", "dashboard/dashboard.html.twig", "C:\\c03735\\workarea\\labo\\Autres\\test\\templates\\dashboard\\dashboard.html.twig");
    }
}
