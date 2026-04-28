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

/* default/template/extension/module/customer_segment_slider.twig */
class __TwigTemplate_f39d2b84510f413f4a464f78e759a6237c0315c0e402d6dd9f88ca79c17ba84e extends \Twig\Template
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
        echo "<div class=\"customer-segment-slider\">
  ";
        // line 2
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["sliders"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["slider"]) {
            // line 3
            echo "  <h3>";
            echo twig_get_attribute($this->env, $this->source, $context["slider"], "name", [], "any", false, false, false, 3);
            echo "</h3>
  <div class=\"row\">
    ";
            // line 5
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["slider"], "products", [], "any", false, false, false, 5));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 6
                echo "    <div class=\"product-layout col-lg-3 col-md-3 col-sm-6 col-xs-12\">
      <div class=\"product-thumb transition\">
        <div class=\"image\"><a href=\"";
                // line 8
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 8);
                echo "\"><img src=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 8);
                echo "\" alt=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 8);
                echo "\" title=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 8);
                echo "\" class=\"img-responsive\" /></a></div>
        <div class=\"caption\">
          <h4><a href=\"";
                // line 10
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 10);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 10);
                echo "</a></h4>
          <p>";
                // line 11
                echo twig_get_attribute($this->env, $this->source, $context["product"], "description", [], "any", false, false, false, 11);
                echo "</p>
          ";
                // line 12
                if (twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 12)) {
                    // line 13
                    echo "          <p class=\"price\">
            ";
                    // line 14
                    if ( !twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 14)) {
                        // line 15
                        echo "            ";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 15);
                        echo "
            ";
                    } else {
                        // line 17
                        echo "            <span class=\"price-new\">";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 17);
                        echo "</span> <span class=\"price-old\">";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 17);
                        echo "</span>
            ";
                    }
                    // line 19
                    echo "          </p>
          ";
                }
                // line 21
                echo "        </div>
      </div>
    </div>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 25
            echo "  </div>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['slider'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "default/template/extension/module/customer_segment_slider.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  120 => 27,  113 => 25,  104 => 21,  100 => 19,  92 => 17,  86 => 15,  84 => 14,  81 => 13,  79 => 12,  75 => 11,  69 => 10,  58 => 8,  54 => 6,  50 => 5,  44 => 3,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/extension/module/customer_segment_slider.twig", "");
    }
}
