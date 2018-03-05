<?php

/* security/login.html.twig */
class __TwigTemplate_1817f661efa00043923373b54194454d3b4dd5b708ed439eb0ab224b7b10182e extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "security/login.html.twig", 1);
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "security/login.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "security/login.html.twig"));

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
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment(Symfony\Bridge\Twig\Extension\HttpKernelExtension::controller("App\\Controller\\SecurityController::navbarAction"));
        echo "

    ";
        // line 10
        echo "
    ";
        // line 11
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment(Symfony\Bridge\Twig\Extension\HttpKernelExtension::controller("App\\Controller\\SecurityController::navbtnsAction"));
        echo "


    <div class=\"container text-center\">

        <div class=\"row justify-content-center\" style=\"min-height: 80vh; max-height: 80vh; height: 80vh;\">

            <div class=\"col-sm-8 align-self-center\">

                <div class=\"row justify-content-center\">

                    <div class=\"col-sm-12\">
                        ";
        // line 23
        if ((isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new Twig_Error_Runtime('Variable "error" does not exist.', 23, $this->source); })())) {
            // line 24
            echo "                            <div class=\"alert alert-danger\" role=\"alert\">
                                ";
            // line 25
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new Twig_Error_Runtime('Variable "error" does not exist.', 25, $this->source); })()), "messageKey", array()), twig_get_attribute($this->env, $this->source, (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new Twig_Error_Runtime('Variable "error" does not exist.', 25, $this->source); })()), "messageData", array()), "security"), "html", null, true);
            echo "
                            </div>
                        ";
        }
        // line 28
        echo "                    </div>

                    <div class=\"col-sm-10 mt-5\">

                        <form action=\"";
        // line 32
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("login");
        echo "\" method=\"post\">
                            <div class=\"form-group text-left\">
                                <label for=\"exampleInputEmail1\" class=\"font-weight-bold\">Email</label>
                                <input type=\"text\" class=\"form-control\" id=\"username\" name=\"_username\" aria-describedby=\"emailHelp\" placeholder=\"Enter email or Phone number\" value=\"";
        // line 35
        echo twig_escape_filter($this->env, (isset($context["last_username"]) || array_key_exists("last_username", $context) ? $context["last_username"] : (function () { throw new Twig_Error_Runtime('Variable "last_username" does not exist.', 35, $this->source); })()), "html", null, true);
        echo "\">
                            </div>
                            <div class=\"form-group text-left\">
                                <label for=\"password\" class=\"font-weight-bold\">Password</label>
                                <input type=\"password\" class=\"form-control\" id=\"password\" name=\"_password\" placeholder=\"Password\">
                            </div>
                            <button type=\"submit\" class=\"btn btn-primary col-12\">Login</button>
                        </form>

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
        return "security/login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 35,  99 => 32,  93 => 28,  87 => 25,  84 => 24,  82 => 23,  67 => 11,  64 => 10,  59 => 7,  56 => 6,  53 => 4,  44 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"base.html.twig\" %}

{% block body %}

    {# NAVBAR #}

    {{ render(controller('App\\\\Controller\\\\SecurityController::navbarAction')) }}

    {# NAV BUTTON #}

    {{ render(controller('App\\\\Controller\\\\SecurityController::navbtnsAction')) }}


    <div class=\"container text-center\">

        <div class=\"row justify-content-center\" style=\"min-height: 80vh; max-height: 80vh; height: 80vh;\">

            <div class=\"col-sm-8 align-self-center\">

                <div class=\"row justify-content-center\">

                    <div class=\"col-sm-12\">
                        {% if error %}
                            <div class=\"alert alert-danger\" role=\"alert\">
                                {{ error.messageKey|trans(error.messageData, 'security') }}
                            </div>
                        {% endif %}
                    </div>

                    <div class=\"col-sm-10 mt-5\">

                        <form action=\"{{ path('login') }}\" method=\"post\">
                            <div class=\"form-group text-left\">
                                <label for=\"exampleInputEmail1\" class=\"font-weight-bold\">Email</label>
                                <input type=\"text\" class=\"form-control\" id=\"username\" name=\"_username\" aria-describedby=\"emailHelp\" placeholder=\"Enter email or Phone number\" value=\"{{ last_username }}\">
                            </div>
                            <div class=\"form-group text-left\">
                                <label for=\"password\" class=\"font-weight-bold\">Password</label>
                                <input type=\"password\" class=\"form-control\" id=\"password\" name=\"_password\" placeholder=\"Password\">
                            </div>
                            <button type=\"submit\" class=\"btn btn-primary col-12\">Login</button>
                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

{% endblock %}", "security/login.html.twig", "C:\\c03735\\workarea\\labo\\Autres\\test\\templates\\security\\login.html.twig");
    }
}
