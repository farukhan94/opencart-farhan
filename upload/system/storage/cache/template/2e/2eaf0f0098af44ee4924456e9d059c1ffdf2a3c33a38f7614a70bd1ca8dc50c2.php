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
class __TwigTemplate_446ddb66b19f3cc38c8f9b34fb7b57826cf78b6919b97fd1a8c29b67ed4c781c extends \Twig\Template
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
    
    <div class=\"swiper-viewport\">
      <div id=\"segment-slider-";
            // line 7
            echo twig_get_attribute($this->env, $this->source, $context["slider"], "slider_id", [], "any", false, false, false, 7);
            echo "\" class=\"swiper-container\" style=\"padding-bottom: 30px;\">
        <div class=\"swiper-wrapper\">
          ";
            // line 9
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["slider"], "products", [], "any", false, false, false, 9));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 10
                echo "          <div class=\"swiper-slide\" style=\"padding: 5px;\">
            <div class=\"product-thumb transition\" style=\"border: 1px solid #e5e5e5; padding: 15px; background: #fff; border-radius: 4px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); height: 160px; overflow: hidden; display: block; width: 100%;\">
               <div style=\"display: flex; align-items: center; gap: 20px;\">
                  <div style=\"flex: 0 0 100px;\">
                    <a href=\"";
                // line 14
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 14);
                echo "\"><img src=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 14);
                echo "\" alt=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 14);
                echo "\" title=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 14);
                echo "\" class=\"img-responsive\" style=\"max-width: 100%; height: auto;\" /></a>
                  </div>
                  <div style=\"flex: 1; min-width: 0;\">
                    <h4 style=\"margin: 0 0 8px 0; font-size: 15px; font-weight: 600; color: #23a1d1;\"><a href=\"";
                // line 17
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 17);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 17);
                echo "</a></h4>
                    <p style=\"font-size: 12px; color: #666; margin-bottom: 10px; line-height: 1.4; max-height: 3.2em; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;\">";
                // line 18
                echo twig_get_attribute($this->env, $this->source, $context["product"], "description", [], "any", false, false, false, 18);
                echo "</p>
                    ";
                // line 19
                if (twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 19)) {
                    // line 20
                    echo "                    <p class=\"price\" style=\"margin: 0; font-size: 16px; font-weight: 700; color: #333;\">
                      ";
                    // line 21
                    if ( !twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 21)) {
                        // line 22
                        echo "                      ";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 22);
                        echo "
                      ";
                    } else {
                        // line 24
                        echo "                      <span class=\"price-new\">";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 24);
                        echo "</span> <span class=\"price-old\" style=\"color: #999; font-weight: normal; font-size: 13px; text-decoration: line-through; margin-left: 8px;\">";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 24);
                        echo "</span>
                      ";
                    }
                    // line 26
                    echo "                    </p>
                    ";
                }
                // line 28
                echo "                  </div>
               </div>
            </div>
          </div>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 33
            echo "        </div>
      </div>
      <div class=\"swiper-pagination paging-";
            // line 35
            echo twig_get_attribute($this->env, $this->source, $context["slider"], "slider_id", [], "any", false, false, false, 35);
            echo "\"></div>
      <div class=\"swiper-pager\">
        <div class=\"swiper-button-next next-";
            // line 37
            echo twig_get_attribute($this->env, $this->source, $context["slider"], "slider_id", [], "any", false, false, false, 37);
            echo "\"></div>
        <div class=\"swiper-button-prev prev-";
            // line 38
            echo twig_get_attribute($this->env, $this->source, $context["slider"], "slider_id", [], "any", false, false, false, 38);
            echo "\"></div>
      </div>
    </div>
  </div>
  <script type=\"text/javascript\"><!--
  \$('#segment-slider-";
            // line 43
            echo twig_get_attribute($this->env, $this->source, $context["slider"], "slider_id", [], "any", false, false, false, 43);
            echo "').swiper({
    mode: 'horizontal',
    slidesPerView: 4,
    centeredSlides: true,
    pagination: '.paging-";
            // line 47
            echo twig_get_attribute($this->env, $this->source, $context["slider"], "slider_id", [], "any", false, false, false, 47);
            echo "',
    paginationClickable: true,
    nextButton: '.next-";
            // line 49
            echo twig_get_attribute($this->env, $this->source, $context["slider"], "slider_id", [], "any", false, false, false, 49);
            echo "',
    prevButton: '.prev-";
            // line 50
            echo twig_get_attribute($this->env, $this->source, $context["slider"], "slider_id", [], "any", false, false, false, 50);
            echo "',
    autoplay: 3000,
    loop: true,
    spaceBetween: 10,
    autoplayDisableOnInteraction: false,
    breakpoints: {
        768: { slidesPerView: 3 },
        1200: { slidesPerView: 4 }
    }
  });
  --></script>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['slider'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 62
        echo "</div>
<style>
.customer-segment-slider .swiper-viewport {
    position: relative;
}
.customer-segment-slider .swiper-button-next,
.customer-segment-slider .swiper-button-prev {
    background: rgba(0,0,0,0.1);
    color: #fff;
    width: 30px;
    height: 30px;
    line-height: 30px;
    text-align: center;
    border-radius: 50%;
    transition: all 0.3s;
}
.customer-segment-slider .swiper-button-next:hover,
.customer-segment-slider .swiper-button-prev:hover {
    background: rgba(0,0,0,0.6);
}
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
        return array (  180 => 62,  162 => 50,  158 => 49,  153 => 47,  146 => 43,  138 => 38,  134 => 37,  129 => 35,  125 => 33,  115 => 28,  111 => 26,  103 => 24,  97 => 22,  95 => 21,  92 => 20,  90 => 19,  86 => 18,  80 => 17,  68 => 14,  62 => 10,  58 => 9,  53 => 7,  47 => 4,  44 => 3,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/extension/module/customer_segment_slider.twig", "");
    }
}
