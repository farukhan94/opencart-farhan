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
class __TwigTemplate_a03510e46d8e81ac53f263420364141814a7fd725c2ba53d9593c62942662fd9 extends \Twig\Template
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
  <div id=\"segment-slider-";
            // line 4
            echo twig_get_attribute($this->env, $this->source, $context["slider"], "slider_id", [], "any", false, false, false, 4);
            echo "\" class=\"owl-carousel\">
    ";
            // line 5
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["slider"], "products", [], "any", false, false, false, 5));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 6
                echo "    <div class=\"item text-center\">
      <div class=\"product-thumb transition\" style=\"border: none; margin: 5px;\">
        <div class=\"image\"><a href=\"";
                // line 8
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 8);
                echo "\"><img src=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 8);
                echo "\" alt=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 8);
                echo "\" title=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 8);
                echo "\" class=\"img-responsive\" style=\"margin: 0 auto;\" /></a></div>
        <div class=\"caption\">
          <h4><a href=\"";
                // line 10
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 10);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 10);
                echo "</a></h4>
          ";
                // line 11
                if (twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 11)) {
                    // line 12
                    echo "          <p class=\"price\">
            ";
                    // line 13
                    if ( !twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 13)) {
                        // line 14
                        echo "            ";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 14);
                        echo "
            ";
                    } else {
                        // line 16
                        echo "            <span class=\"price-new\">";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 16);
                        echo "</span> <span class=\"price-old\">";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 16);
                        echo "</span>
            ";
                    }
                    // line 18
                    echo "          </p>
          ";
                }
                // line 20
                echo "        </div>
      </div>
    </div>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 24
            echo "  </div>
  <script type=\"text/javascript\"><!--
  \$('#segment-slider-";
            // line 26
            echo twig_get_attribute($this->env, $this->source, $context["slider"], "slider_id", [], "any", false, false, false, 26);
            echo "').owlCarousel({
    items: 4,
    autoPlay: 3000,
    navigation: true,
    navigationText: ['<i class=\"fa fa-chevron-left fa-5x\"></i>', '<i class=\"fa fa-chevron-right fa-5x\"></i>'],
    pagination: true,
    itemsDesktop: [1199, 3],
    itemsDesktopSmall: [979, 2],
    itemsTablet: [768, 2],
    itemsMobile: [479, 1]
  });
  --></script>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['slider'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
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
        return array (  135 => 39,  116 => 26,  112 => 24,  103 => 20,  99 => 18,  91 => 16,  85 => 14,  83 => 13,  80 => 12,  78 => 11,  72 => 10,  61 => 8,  57 => 6,  53 => 5,  49 => 4,  44 => 3,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/extension/module/customer_segment_slider.twig", "");
    }
}
