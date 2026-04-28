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

/* default/template/extension/module/customer_segment.twig */
class __TwigTemplate_4a359ea2b3dc831a2f64b08e46ee5c44ce9c90050d491dfd0fa8ba7011c0a380 extends \Twig\Template
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
        echo "<div class=\"customer-segment-personalized\">
  ";
        // line 2
        if (($context["banners"] ?? null)) {
            // line 3
            echo "    <div class=\"segment-banners\">
      ";
            // line 4
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["banners"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["banner"]) {
                // line 5
                echo "        <div class=\"banner-item\">
          <a href=\"";
                // line 6
                echo twig_get_attribute($this->env, $this->source, $context["banner"], "link", [], "any", false, false, false, 6);
                echo "\"><img src=\"";
                echo twig_get_attribute($this->env, $this->source, $context["banner"], "image", [], "any", false, false, false, 6);
                echo "\" alt=\"";
                echo twig_get_attribute($this->env, $this->source, $context["banner"], "title", [], "any", false, false, false, 6);
                echo "\" class=\"img-responsive\" /></a>
        </div>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['banner'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 9
            echo "    </div>
  ";
        }
        // line 11
        echo "
  ";
        // line 12
        if (($context["sliders"] ?? null)) {
            // line 13
            echo "    <div class=\"segment-sliders\">
      ";
            // line 14
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["sliders"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["slider"]) {
                // line 15
                echo "        <div class=\"slider-item\">
          <h3>";
                // line 16
                echo twig_get_attribute($this->env, $this->source, $context["slider"], "name", [], "any", false, false, false, 16);
                echo "</h3>
          <div class=\"row\">
            ";
                // line 18
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["slider"], "products", [], "any", false, false, false, 18));
                foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                    // line 19
                    echo "              <div class=\"col-lg-3 col-md-3 col-sm-6 col-xs-12\">
                <div class=\"product-thumb transition\">
                  <div class=\"image\"><a href=\"";
                    // line 21
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 21);
                    echo "\"><img src=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 21);
                    echo "\" alt=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 21);
                    echo "\" title=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 21);
                    echo "\" class=\"img-responsive\" /></a></div>
                  <div class=\"caption\">
                    <h4><a href=\"";
                    // line 23
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 23);
                    echo "\">";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 23);
                    echo "</a></h4>
                    <p>";
                    // line 24
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "description", [], "any", false, false, false, 24);
                    echo "</p>
                    <p class=\"price\">";
                    // line 25
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 25);
                    echo "</p>
                  </div>
                </div>
              </div>
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 30
                echo "          </div>
        </div>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['slider'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 33
            echo "    </div>
  ";
        }
        // line 35
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "default/template/extension/module/customer_segment.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  141 => 35,  137 => 33,  129 => 30,  118 => 25,  114 => 24,  108 => 23,  97 => 21,  93 => 19,  89 => 18,  84 => 16,  81 => 15,  77 => 14,  74 => 13,  72 => 12,  69 => 11,  65 => 9,  52 => 6,  49 => 5,  45 => 4,  42 => 3,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/extension/module/customer_segment.twig", "");
    }
}
