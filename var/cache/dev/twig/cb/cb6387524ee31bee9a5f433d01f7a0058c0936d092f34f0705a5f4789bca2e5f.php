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

    <div id=\"security-container\" class=\"container text-center\">
        <div id=\"security-row\" class=\"row justify-content-center\">
            <div id=\"security-col\" class=\"col-sm-8 align-self-center\">
                <div id=\"login-row\" class=\"row justify-content-center\">

                    <div id=\"login-alert-col\" class=\"col-sm-12\">
                        ";
        // line 19
        if ((isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new Twig_Error_Runtime('Variable "error" does not exist.', 19, $this->source); })())) {
            // line 20
            echo "                            <div class=\"alert alert-danger text-left\" role=\"alert\">
                                <h4 class=\"font-weight-bold\">Error</h4>
                                <p class=\"font-weight-bold\">";
            // line 22
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new Twig_Error_Runtime('Variable "error" does not exist.', 22, $this->source); })()), "messageKey", array()), twig_get_attribute($this->env, $this->source, (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new Twig_Error_Runtime('Variable "error" does not exist.', 22, $this->source); })()), "messageData", array()), "security"), "html", null, true);
            echo "</p>
                            </div>
                        ";
        }
        // line 25
        echo "                    </div>

                    <div id=\"login-form-col\" class=\"col-sm-10 mt-5 border\">
                        <div class=\"row\">

                            <div id=\"login-form-type-col\" class=\"col-12\">

                                <div class=\"row\">
                                    <div id=\"login-form-type-email\" class=\"col-6 text-center align-items-center\">
                                        <span><i class=\"fas fa-envelope fa-2x mt-2\"></i></span>
                                    </div>
                                    <div id=\"login-form-type-phone\" class=\"col-6 text-center\">
                                        <span><i class=\"fas fa-phone fa-2x mt-2\"></i></span>
                                    </div>
                                </div>

                            </div>

                            <div id=\"form-col\" class=\"col-12\">

                                <form action=\"";
        // line 45
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("login");
        echo "\" method=\"post\">
                                    <div class=\"form-group text-left\">
                                        <input type=\"text\" class=\"form-control form-control-lg\" id=\"username\" name=\"_username\" aria-describedby=\"emailHelp\" placeholder=\"Enter email\" value=\"";
        // line 47
        echo twig_escape_filter($this->env, (isset($context["last_username"]) || array_key_exists("last_username", $context) ? $context["last_username"] : (function () { throw new Twig_Error_Runtime('Variable "last_username" does not exist.', 47, $this->source); })()), "html", null, true);
        echo "\">
                                        <small id=\"emailHelp\" class=\"form-text text-muted\">Enter your email to login.</small>
                                    </div>
                                    <div class=\"form-group text-left\">
                                        <input type=\"password\" class=\"form-control form-control-lg\" id=\"password\" name=\"_password\" placeholder=\"Password\">
                                        <small id=\"emailHelp\" class=\"form-text text-muted\">Enter your password.</small>
                                    </div>

                            </div>

                            <div id=\"login-form-submit-col\" class=\"col-12\">

                                <div class=\"row\">
                                    <div class=\"col-12 text-center p-0\">
                                        <button type=\"submit\" class=\"nav-link col-12\">Go !</button>
                                        </form>
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
        return "security/login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 47,  112 => 45,  90 => 25,  84 => 22,  80 => 20,  78 => 19,  67 => 11,  64 => 10,  59 => 7,  56 => 6,  53 => 4,  44 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"base.html.twig\" %}

{% block body %}

    {# NAVBAR #}

    {{ render(controller('App\\\\Controller\\\\SecurityController::navbarAction')) }}

    {# NAV BUTTON #}

    {{ render(controller('App\\\\Controller\\\\SecurityController::navbtnsAction')) }}

    <div id=\"security-container\" class=\"container text-center\">
        <div id=\"security-row\" class=\"row justify-content-center\">
            <div id=\"security-col\" class=\"col-sm-8 align-self-center\">
                <div id=\"login-row\" class=\"row justify-content-center\">

                    <div id=\"login-alert-col\" class=\"col-sm-12\">
                        {% if error %}
                            <div class=\"alert alert-danger text-left\" role=\"alert\">
                                <h4 class=\"font-weight-bold\">Error</h4>
                                <p class=\"font-weight-bold\">{{ error.messageKey|trans(error.messageData, 'security') }}</p>
                            </div>
                        {% endif %}
                    </div>

                    <div id=\"login-form-col\" class=\"col-sm-10 mt-5 border\">
                        <div class=\"row\">

                            <div id=\"login-form-type-col\" class=\"col-12\">

                                <div class=\"row\">
                                    <div id=\"login-form-type-email\" class=\"col-6 text-center align-items-center\">
                                        <span><i class=\"fas fa-envelope fa-2x mt-2\"></i></span>
                                    </div>
                                    <div id=\"login-form-type-phone\" class=\"col-6 text-center\">
                                        <span><i class=\"fas fa-phone fa-2x mt-2\"></i></span>
                                    </div>
                                </div>

                            </div>

                            <div id=\"form-col\" class=\"col-12\">

                                <form action=\"{{ path('login') }}\" method=\"post\">
                                    <div class=\"form-group text-left\">
                                        <input type=\"text\" class=\"form-control form-control-lg\" id=\"username\" name=\"_username\" aria-describedby=\"emailHelp\" placeholder=\"Enter email\" value=\"{{ last_username }}\">
                                        <small id=\"emailHelp\" class=\"form-text text-muted\">Enter your email to login.</small>
                                    </div>
                                    <div class=\"form-group text-left\">
                                        <input type=\"password\" class=\"form-control form-control-lg\" id=\"password\" name=\"_password\" placeholder=\"Password\">
                                        <small id=\"emailHelp\" class=\"form-text text-muted\">Enter your password.</small>
                                    </div>

                            </div>

                            <div id=\"login-form-submit-col\" class=\"col-12\">

                                <div class=\"row\">
                                    <div class=\"col-12 text-center p-0\">
                                        <button type=\"submit\" class=\"nav-link col-12\">Go !</button>
                                        </form>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

{% endblock %}", "security/login.html.twig", "C:\\c03735\\workarea\\labo\\Autres\\test\\templates\\security\\login.html.twig");
    }
}
