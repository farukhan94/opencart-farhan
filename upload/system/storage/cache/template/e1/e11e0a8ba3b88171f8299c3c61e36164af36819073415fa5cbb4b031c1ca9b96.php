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
class __TwigTemplate_432326c7fe7578267aaced59699eb707cba21f270821756bb8dc7ea2484be0b9 extends \Twig\Template
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
        echo "<style>
.segment-banners {
    margin-left: -15px;
    margin-right: -15px;
    overflow: hidden;
}
.banner-item {
    margin-bottom: 20px;
}
.banner-item img {
    width: 100%;
    height: auto;
    display: block;
}
</style>
<div class=\"customer-segment-personalized\">
  ";
        // line 17
        if (($context["banners"] ?? null)) {
            // line 18
            echo "    <div class=\"segment-banners\">
      ";
            // line 19
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["banners"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["banner"]) {
                // line 20
                echo "        <div class=\"banner-item\">
          <a href=\"";
                // line 21
                echo twig_get_attribute($this->env, $this->source, $context["banner"], "link", [], "any", false, false, false, 21);
                echo "\"><img src=\"";
                echo twig_get_attribute($this->env, $this->source, $context["banner"], "image", [], "any", false, false, false, 21);
                echo "\" alt=\"";
                echo twig_get_attribute($this->env, $this->source, $context["banner"], "title", [], "any", false, false, false, 21);
                echo "\" class=\"img-responsive\" /></a>
        </div>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['banner'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 24
            echo "    </div>
  ";
        }
        // line 26
        echo "
  ";
        // line 27
        if (($context["sliders"] ?? null)) {
            // line 28
            echo "    <div class=\"segment-sliders\">
      ";
            // line 29
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["sliders"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["slider"]) {
                // line 30
                echo "        <div class=\"slider-item\">
          <h3>";
                // line 31
                echo twig_get_attribute($this->env, $this->source, $context["slider"], "name", [], "any", false, false, false, 31);
                echo "</h3>
          <div class=\"row\">
            ";
                // line 33
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["slider"], "products", [], "any", false, false, false, 33));
                foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                    // line 34
                    echo "              <div class=\"col-lg-3 col-md-3 col-sm-6 col-xs-12\">
                <div class=\"product-thumb transition\">
                  <div class=\"image\"><a href=\"";
                    // line 36
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 36);
                    echo "\"><img src=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 36);
                    echo "\" alt=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 36);
                    echo "\" title=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 36);
                    echo "\" class=\"img-responsive\" /></a></div>
                  <div class=\"caption\">
                    <h4><a href=\"";
                    // line 38
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 38);
                    echo "\">";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 38);
                    echo "</a></h4>
                    <p>";
                    // line 39
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "description", [], "any", false, false, false, 39);
                    echo "</p>
                    <p class=\"price\">";
                    // line 40
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 40);
                    echo "</p>
                  </div>
                </div>
              </div>
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 45
                echo "          </div>
        </div>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['slider'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 48
            echo "    </div>
  ";
        }
        // line 50
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
        return array (  156 => 50,  152 => 48,  144 => 45,  133 => 40,  129 => 39,  123 => 38,  112 => 36,  108 => 34,  104 => 33,  99 => 31,  96 => 30,  92 => 29,  89 => 28,  87 => 27,  84 => 26,  80 => 24,  67 => 21,  64 => 20,  60 => 19,  57 => 18,  55 => 17,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/extension/module/customer_segment.twig", "");
    }
}
