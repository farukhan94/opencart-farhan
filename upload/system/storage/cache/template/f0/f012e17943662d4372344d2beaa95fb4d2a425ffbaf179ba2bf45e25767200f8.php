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
class __TwigTemplate_01f7b6ca30241f82d615152b034f2c7bab1cfa4758677a817df2617ffdabcc7d extends \Twig\Template
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
            echo "  <div style=\"margin-bottom: 30px;\">
    <h3>";
            // line 4
            echo twig_get_attribute($this->env, $this->source, $context["slider"], "name", [], "any", false, false, false, 4);
            echo "</h3>
    <div id=\"segment-slider-";
            // line 5
            echo twig_get_attribute($this->env, $this->source, $context["slider"], "slider_id", [], "any", false, false, false, 5);
            echo "\" class=\"owl-carousel segment-carousel\">
      ";
            // line 6
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["slider"], "products", [], "any", false, false, false, 6));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 7
                echo "      <div class=\"item\">
        <div class=\"product-thumb transition\" style=\"border: 1px solid #eee; margin: 5px; padding: 10px; background: #fff; height: 130px; overflow: hidden;\">
           <div style=\"display: flex; align-items: flex-start;\">
              <div style=\"flex: 0 0 100px; margin-right: 15px;\">
                <a href=\"";
                // line 11
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 11);
                echo "\"><img src=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 11);
                echo "\" alt=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 11);
                echo "\" title=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 11);
                echo "\" class=\"img-responsive\" /></a>
              </div>
              <div style=\"flex: 1; min-width: 0;\">
                <h4 style=\"margin: 0 0 5px 0; font-size: 14px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;\"><a href=\"";
                // line 14
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 14);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 14);
                echo "</a></h4>
                <p style=\"font-size: 11px; color: #777; margin-bottom: 5px; height: 32px; overflow: hidden;\">";
                // line 15
                echo twig_get_attribute($this->env, $this->source, $context["product"], "description", [], "any", false, false, false, 15);
                echo "</p>
                ";
                // line 16
                if (twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 16)) {
                    // line 17
                    echo "                <p class=\"price\" style=\"margin: 0; font-weight: bold; color: #444;\">
                  ";
                    // line 18
                    if ( !twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 18)) {
                        // line 19
                        echo "                  ";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 19);
                        echo "
                  ";
                    } else {
                        // line 21
                        echo "                  <span class=\"price-new\">";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 21);
                        echo "</span>
                  ";
                    }
                    // line 23
                    echo "                </p>
                ";
                }
                // line 25
                echo "              </div>
           </div>
        </div>
      </div>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 30
            echo "    </div>
  </div>
  <script type=\"text/javascript\"><!--
  \$(document).ready(function() {
    \$('#segment-slider-";
            // line 34
            echo twig_get_attribute($this->env, $this->source, $context["slider"], "slider_id", [], "any", false, false, false, 34);
            echo "').owlCarousel({
      items: 4,
      autoPlay: 5000,
      navigation: true,
      navigationText: ['<i class=\"fa fa-chevron-left fa-2x\"></i>', '<i class=\"fa fa-chevron-right fa-2x\"></i>'],
      pagination: false,
      itemsDesktop: [1199, 4],
      itemsDesktopSmall: [979, 3],
      itemsTablet: [768, 2],
      itemsMobile: [479, 1]
    });
  });
  --></script>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['slider'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 48
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
        return array (  146 => 48,  126 => 34,  120 => 30,  110 => 25,  106 => 23,  100 => 21,  94 => 19,  92 => 18,  89 => 17,  87 => 16,  83 => 15,  77 => 14,  65 => 11,  59 => 7,  55 => 6,  51 => 5,  47 => 4,  44 => 3,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/extension/module/customer_segment_slider.twig", "");
    }
}
