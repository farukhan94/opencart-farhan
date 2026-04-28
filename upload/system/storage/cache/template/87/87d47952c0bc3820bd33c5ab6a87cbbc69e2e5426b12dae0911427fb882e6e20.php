<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* default/template/extension/module/customer_segment_promo.twig */
class __TwigTemplate_428707eb46c639274c09e93a5cbe5098b1589779a888fe2089f2c1c65e53e288 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<div class=\"customer-segment-promos\">
  ";
        // line 2
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["promotions"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["promo"]) {
            // line 3
            echo "  <div class=\"alert alert-success\">
    <strong>";
            // line 4
            echo twig_get_attribute($this->env, $this->source, $context["promo"], "title", [], "any", false, false, false, 4);
            echo "</strong><br />
    ";
            // line 5
            echo twig_get_attribute($this->env, $this->source, $context["promo"], "description", [], "any", false, false, false, 5);
            echo "<br />
    ";
            // line 6
            if (twig_get_attribute($this->env, $this->source, $context["promo"], "code", [], "any", false, false, false, 6)) {
                // line 7
                echo "    Use Code: <code>";
                echo twig_get_attribute($this->env, $this->source, $context["promo"], "code", [], "any", false, false, false, 7);
                echo "</code>
    ";
            }
            // line 9
            echo "  </div>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['promo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 11
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "default/template/extension/module/customer_segment_promo.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  70 => 11,  63 => 9,  57 => 7,  55 => 6,  51 => 5,  47 => 4,  44 => 3,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/extension/module/customer_segment_promo.twig", "");
    }
}
