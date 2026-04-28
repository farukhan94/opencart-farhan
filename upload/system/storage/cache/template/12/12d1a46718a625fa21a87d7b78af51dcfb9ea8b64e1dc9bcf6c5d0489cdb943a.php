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
class __TwigTemplate_3a2b35108bd14ce5df09c724320773fae7f0a90ce2d3f33b7706282d66d3366e extends \Twig\Template
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
                echo "    <div class=\"item text-left\">
      <div class=\"product-thumb transition\" style=\"border: 1px solid #ddd; margin: 10px; padding: 10px; background: #fff; min-height: 200px;\">
        <div class=\"row\">
          <div class=\"col-sm-4\">
            <div class=\"image\"><a href=\"";
                // line 10
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 10);
                echo "\"><img src=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 10);
                echo "\" alt=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 10);
                echo "\" title=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 10);
                echo "\" class=\"img-responsive\" /></a></div>
          </div>
          <div class=\"col-sm-8\">
            <div class=\"caption\">
              <h4 style=\"margin-top: 0;\"><a href=\"";
                // line 14
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 14);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 14);
                echo "</a></h4>
              <p style=\"font-size: 12px; color: #666;\">";
                // line 15
                echo twig_get_attribute($this->env, $this->source, $context["product"], "description", [], "any", false, false, false, 15);
                echo "</p>
              ";
                // line 16
                if (twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 16)) {
                    // line 17
                    echo "              <p class=\"price\" style=\"font-weight: bold; font-size: 16px;\">
                ";
                    // line 18
                    if ( !twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 18)) {
                        // line 19
                        echo "                ";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 19);
                        echo "
                ";
                    } else {
                        // line 21
                        echo "                <span class=\"price-new\">";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 21);
                        echo "</span> <span class=\"price-old\" style=\"text-decoration: line-through; color: #999; font-weight: normal; font-size: 12px; margin-left: 5px;\">";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 21);
                        echo "</span>
                ";
                    }
                    // line 23
                    echo "              </p>
              ";
                }
                // line 25
                echo "            </div>
          </div>
        </div>
      </div>
    </div>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 31
            echo "  </div>
  <script type=\"text/javascript\"><!--
  \$('#segment-slider-";
            // line 33
            echo twig_get_attribute($this->env, $this->source, $context["slider"], "slider_id", [], "any", false, false, false, 33);
            echo "').owlCarousel({
    items: 2,
    autoPlay: 5000,
    navigation: true,
    navigationText: ['<i class=\"fa fa-chevron-left fa-5x\"></i>', '<i class=\"fa fa-chevron-right fa-5x\"></i>'],
    pagination: true,
    itemsDesktop: [1199, 2],
    itemsDesktopSmall: [979, 1],
    itemsTablet: [768, 1],
    itemsMobile: [479, 1]
  });
  --></script>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['slider'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 46
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
        return array (  145 => 46,  126 => 33,  122 => 31,  111 => 25,  107 => 23,  99 => 21,  93 => 19,  91 => 18,  88 => 17,  86 => 16,  82 => 15,  76 => 14,  63 => 10,  57 => 6,  53 => 5,  49 => 4,  44 => 3,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/extension/module/customer_segment_slider.twig", "");
    }
}
