<?php

/* portfolio/home-section-header.html.twig */
class __TwigTemplate_57dbc6bdbf3fdd940173b2d892027e02d9fef889893f1a2ebc6ef1156ca2151f extends Twig_Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "portfolio/home-section-header.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "portfolio/home-section-header.html.twig"));

        // line 1
        echo "<div id=\"header-container\" class=\"container-fluid\">
    <div id=\"header-row\" class=\"row\">
        <div id=\"header-col\" class=\"col-sm-12 h-100 w-100 p-0\">

            <div id=\"header-title\" class=\"row m-0 justify-content-center w-100\">
                <div class=\"col-sm-5 text-center\">
                    <h3 class=\"font-weight-bold text-uppercase\"><span class=\"title-header-rotate\" data-period=\"2000\" data-rotate='[ \"";
        // line 7
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("I am a developer."), "html", null, true);
        echo "\", \"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("I am a WebDesigner."), "html", null, true);
        echo "\", \"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Welcome!."), "html", null, true);
        echo "\" ]'></span></h3>
                </div>
            </div>

            <div id=\"first-componentNav-row\" class=\"row m-0 justify-content-center w-100\">
                <div class=\"col-sm-12 text-center\">
                    <span id=\"fist-componentNav-btn\"><i class=\"fas fa-chevron-down fa-2x\"></i></span>
                </div>
            </div>

        </div>
    </div>
</div>";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "portfolio/home-section-header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 7,  29 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div id=\"header-container\" class=\"container-fluid\">
    <div id=\"header-row\" class=\"row\">
        <div id=\"header-col\" class=\"col-sm-12 h-100 w-100 p-0\">

            <div id=\"header-title\" class=\"row m-0 justify-content-center w-100\">
                <div class=\"col-sm-5 text-center\">
                    <h3 class=\"font-weight-bold text-uppercase\"><span class=\"title-header-rotate\" data-period=\"2000\" data-rotate='[ \"{{ 'I am a developer.'|trans }}\", \"{{ 'I am a WebDesigner.'|trans }}\", \"{{ 'Welcome!.'|trans }}\" ]'></span></h3>
                </div>
            </div>

            <div id=\"first-componentNav-row\" class=\"row m-0 justify-content-center w-100\">
                <div class=\"col-sm-12 text-center\">
                    <span id=\"fist-componentNav-btn\"><i class=\"fas fa-chevron-down fa-2x\"></i></span>
                </div>
            </div>

        </div>
    </div>
</div>", "portfolio/home-section-header.html.twig", "C:\\c03735\\workarea\\labo\\Autres\\test\\templates\\portfolio\\home-section-header.html.twig");
    }
}
