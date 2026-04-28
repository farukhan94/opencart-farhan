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
class __TwigTemplate_78396b365eb8de01d4dbed0700359db5a8cd4a56b2c9131b520dcfd43c4bbad2 extends \Twig\Template
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
            echo "  <div style=\"margin-bottom: 40px; position: relative;\">
    <h3 style=\"border-bottom: 1px solid #eee; padding-bottom: 10px; margin-bottom: 20px;\">";
            // line 4
            echo twig_get_attribute($this->env, $this->source, $context["slider"], "name", [], "any", false, false, false, 4);
            echo "</h3>
    <div id=\"segment-slider-";
            // line 5
            echo twig_get_attribute($this->env, $this->source, $context["slider"], "slider_id", [], "any", false, false, false, 5);
            echo "\" class=\"owl-carousel segment-carousel\" style=\"opacity: 1; display: block;\">
      ";
            // line 6
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["slider"], "products", [], "any", false, false, false, 6));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 7
                echo "      <div class=\"item\">
        <div class=\"product-thumb transition\" style=\"border: 1px solid #e5e5e5; margin: 10px; padding: 15px; background: #fff; min-height: 140px; border-radius: 4px; box-shadow: 0 2px 5px rgba(0,0,0,0.05);\">
           <div style=\"display: flex; align-items: center; gap: 20px;\">
              <div style=\"flex: 0 0 120px;\">
                <a href=\"";
                // line 11
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 11);
                echo "\"><img src=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 11);
                echo "\" alt=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 11);
                echo "\" title=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 11);
                echo "\" class=\"img-responsive\" style=\"max-width: 100%; height: auto;\" /></a>
              </div>
              <div style=\"flex: 1; min-width: 0;\">
                <h4 style=\"margin: 0 0 8px 0; font-size: 15px; font-weight: 600; color: #23a1d1;\"><a href=\"";
                // line 14
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 14);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 14);
                echo "</a></h4>
                <p style=\"font-size: 12px; color: #666; margin-bottom: 10px; line-height: 1.4; max-height: 3.2em; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;\">";
                // line 15
                echo twig_get_attribute($this->env, $this->source, $context["product"], "description", [], "any", false, false, false, 15);
                echo "</p>
                ";
                // line 16
                if (twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 16)) {
                    // line 17
                    echo "                <p class=\"price\" style=\"margin: 0; font-size: 16px; font-weight: 700; color: #333;\">
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
                        echo "</span> <span class=\"price-old\" style=\"color: #999; font-weight: normal; font-size: 13px; text-decoration: line-through; margin-left: 8px;\">";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 21);
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
      items: 2,
      autoPlay: 4000,
      singleItem: false,
      navigation: true,
      navigationText: ['<i class=\"fa fa-chevron-left fa-2x\"></i>', '<i class=\"fa fa-chevron-right fa-2x\"></i>'],
      pagination: true,
      itemsDesktop: [1199, 2],
      itemsDesktopSmall: [979, 1],
      itemsTablet: [768, 1],
      itemsMobile: [479, 1],
      stopOnHover: true,
      rewindNav: true,
      paginationNumbers: false
    });
  });
  --></script>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['slider'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 52
        echo "</div>
<style>
.segment-carousel .owl-wrapper-outer {
    border: none;
    background: transparent;
}
.segment-carousel .owl-buttons div {
    position: absolute;
    top: 50%;
    margin-top: -25px;
    background: rgba(0,0,0,0.1);
    color: #fff;
    padding: 10px;
    border-radius: 50%;
    opacity: 0;
    transition: all 0.3s;
}
.segment-carousel:hover .owl-buttons div {
    opacity: 1;
    background: rgba(0,0,0,0.5);
}
.segment-carousel .owl-buttons .owl-prev { left: -15px; }
.segment-carousel .owl-buttons .owl-next { right: -15px; }
</style>
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
        return array (  152 => 52,  128 => 34,  122 => 30,  112 => 25,  108 => 23,  100 => 21,  94 => 19,  92 => 18,  89 => 17,  87 => 16,  83 => 15,  77 => 14,  65 => 11,  59 => 7,  55 => 6,  51 => 5,  47 => 4,  44 => 3,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/extension/module/customer_segment_slider.twig", "");
    }
}
