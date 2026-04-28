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

/* default/template/extension/module/customer_segment_banner.twig */
class __TwigTemplate_72a77050140659b1628d458e411284333e2ee7901082ecf200eb8400b62cfe51 extends \Twig\Template
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
.customer-segment-banner-container {
    width: 100%;
    margin-bottom: 20px;
    overflow: hidden;
}
.customer-segment-banner-container a {
    display: block;
    width: 100%;
}
.customer-segment-banner-container img {
    width: 100%;
    height: auto;
    display: block;
}
@media (min-width: 1200px) {
    .customer-segment-banner-container {
        width: 100vw;
        position: relative;
        left: 50%;
        right: 50%;
        margin-left: -50vw;
        margin-right: -50vw;
    }
}
</style>
<div class=\"customer-segment-banner-container\">
  ";
        // line 28
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["banners"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["banner"]) {
            // line 29
            echo "  <div class=\"personal-banner\" style=\"margin-bottom: 10px;\">
    ";
            // line 30
            if (twig_get_attribute($this->env, $this->source, $context["banner"], "link", [], "any", false, false, false, 30)) {
                // line 31
                echo "    <a href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["banner"], "link", [], "any", false, false, false, 31);
                echo "\"><img src=\"";
                echo twig_get_attribute($this->env, $this->source, $context["banner"], "image", [], "any", false, false, false, 31);
                echo "\" alt=\"";
                echo twig_get_attribute($this->env, $this->source, $context["banner"], "title", [], "any", false, false, false, 31);
                echo "\" class=\"img-responsive\" /></a>
    ";
            } else {
                // line 33
                echo "    <img src=\"";
                echo twig_get_attribute($this->env, $this->source, $context["banner"], "image", [], "any", false, false, false, 33);
                echo "\" alt=\"";
                echo twig_get_attribute($this->env, $this->source, $context["banner"], "title", [], "any", false, false, false, 33);
                echo "\" class=\"img-responsive\" />
    ";
            }
            // line 35
            echo "  </div>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['banner'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "default/template/extension/module/customer_segment_banner.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  100 => 37,  93 => 35,  85 => 33,  75 => 31,  73 => 30,  70 => 29,  66 => 28,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/extension/module/customer_segment_banner.twig", "");
    }
}
