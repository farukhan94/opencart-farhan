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

/* extension/module/customer_segment_common.twig */
class __TwigTemplate_77ff61bf6a0efa45782dd62a592ed2078f27af16dad8cf22395008b667ee416a extends \Twig\Template
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
        echo ($context["header"] ?? null);
        echo ($context["column_left"] ?? null);
        echo "
<div id=\"content\">
  <div class=\"page-header\">
    <div class=\"container-fluid\">
      <div class=\"pull-right\">
        <button type=\"submit\" form=\"form-module\" data-toggle=\"tooltip\" title=\"";
        // line 6
        echo ($context["button_save"] ?? null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa fa-save\"></i></button>
        <a href=\"";
        // line 7
        echo ($context["cancel"] ?? null);
        echo "\" data-toggle=\"tooltip\" title=\"";
        echo ($context["button_cancel"] ?? null);
        echo "\" class=\"btn btn-default\"><i class=\"fa fa-reply\"></i></a></div>
      <h1>";
        // line 8
        echo ($context["heading_title"] ?? null);
        echo "</h1>
      <ul class=\"breadcrumb\">
        ";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 11
            echo "        <li><a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 11);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 11);
            echo "</a></li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "      </ul>
    </div>
  </div>
  <div class=\"container-fluid\">
    <div class=\"panel panel-default\">
      <div class=\"panel-heading\">
        <h3 class=\"panel-title\"><i class=\"fa fa-pencil\"></i> ";
        // line 19
        echo ($context["text_edit"] ?? null);
        echo "</h3>
      </div>
      <div class=\"panel-body\">
        <form action=\"";
        // line 22
        echo ($context["action"] ?? null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-module\" class=\"form-horizontal\">
          <div class=\"form-group required\">
            <label class=\"col-sm-2 control-label\" for=\"input-name\">";
        // line 24
        echo ($context["entry_name"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
              <input type=\"text\" name=\"name\" value=\"";
        // line 26
        echo ($context["name"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_name"] ?? null);
        echo "\" id=\"input-name\" class=\"form-control\" />
              ";
        // line 27
        if (($context["error_name"] ?? null)) {
            // line 28
            echo "              <div class=\"text-danger\">";
            echo ($context["error_name"] ?? null);
            echo "</div>
              ";
        }
        // line 30
        echo "            </div>
          </div>
          <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\" for=\"input-target\">";
        // line 33
        echo ($context["entry_selection"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
              <select name=\"target_id\" id=\"input-target\" class=\"form-control\">
                <option value=\"0\" ";
        // line 36
        if ((($context["target_id"] ?? null) == "0")) {
            echo "selected=\"selected\"";
        }
        echo ">";
        echo ($context["text_all"] ?? null);
        echo "</option>
                <optgroup label=\"";
        // line 37
        echo ($context["text_specific"] ?? null);
        echo "\">
                  ";
        // line 38
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 39
            echo "                  <option value=\"";
            echo ((twig_get_attribute($this->env, $this->source, $context["item"], "banner_id", [], "any", true, true, false, 39)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, $context["item"], "banner_id", [], "any", false, false, false, 39), ((twig_get_attribute($this->env, $this->source, $context["item"], "slider_id", [], "any", true, true, false, 39)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, $context["item"], "slider_id", [], "any", false, false, false, 39), twig_get_attribute($this->env, $this->source, $context["item"], "promotion_id", [], "any", false, false, false, 39))) : (twig_get_attribute($this->env, $this->source, $context["item"], "promotion_id", [], "any", false, false, false, 39))))) : (((twig_get_attribute($this->env, $this->source, $context["item"], "slider_id", [], "any", true, true, false, 39)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, $context["item"], "slider_id", [], "any", false, false, false, 39), twig_get_attribute($this->env, $this->source, $context["item"], "promotion_id", [], "any", false, false, false, 39))) : (twig_get_attribute($this->env, $this->source, $context["item"], "promotion_id", [], "any", false, false, false, 39)))));
            echo "\" ";
            if ((($context["target_id"] ?? null) == ((twig_get_attribute($this->env, $this->source, $context["item"], "banner_id", [], "any", true, true, false, 39)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, $context["item"], "banner_id", [], "any", false, false, false, 39), ((twig_get_attribute($this->env, $this->source, $context["item"], "slider_id", [], "any", true, true, false, 39)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, $context["item"], "slider_id", [], "any", false, false, false, 39), twig_get_attribute($this->env, $this->source, $context["item"], "promotion_id", [], "any", false, false, false, 39))) : (twig_get_attribute($this->env, $this->source, $context["item"], "promotion_id", [], "any", false, false, false, 39))))) : (((twig_get_attribute($this->env, $this->source, $context["item"], "slider_id", [], "any", true, true, false, 39)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, $context["item"], "slider_id", [], "any", false, false, false, 39), twig_get_attribute($this->env, $this->source, $context["item"], "promotion_id", [], "any", false, false, false, 39))) : (twig_get_attribute($this->env, $this->source, $context["item"], "promotion_id", [], "any", false, false, false, 39))))))) {
                echo "selected=\"selected\"";
            }
            echo ">";
            echo ((twig_get_attribute($this->env, $this->source, $context["item"], "title", [], "any", true, true, false, 39)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, false, 39), twig_get_attribute($this->env, $this->source, $context["item"], "name", [], "any", false, false, false, 39))) : (twig_get_attribute($this->env, $this->source, $context["item"], "name", [], "any", false, false, false, 39)));
            echo "</option>
                  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        echo "                </optgroup>
              </select>
            </div>
          </div>
          <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\" for=\"input-status\">";
        // line 46
        echo ($context["entry_status"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
              <select name=\"status\" id=\"input-status\" class=\"form-control\">
                ";
        // line 49
        if (($context["status"] ?? null)) {
            // line 50
            echo "                <option value=\"1\" selected=\"selected\">Enabled</option>
                <option value=\"0\">Disabled</option>
                ";
        } else {
            // line 53
            echo "                <option value=\"1\">Enabled</option>
                <option value=\"0\" selected=\"selected\">Disabled</option>
                ";
        }
        // line 56
        echo "              </select>
            </div>
          </div>
          <div class=\"alert alert-info\">
            <i class=\"fa fa-info-circle\"></i> This module is a layout component. To manage the actual personalized content and rules, please go to the <b><a href=\"";
        // line 60
        echo ($context["manager_link"] ?? null);
        echo "\">User Segment Targeted Banner</a></b> main settings.
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
";
        // line 67
        echo ($context["footer"] ?? null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "extension/module/customer_segment_common.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  197 => 67,  187 => 60,  181 => 56,  176 => 53,  171 => 50,  169 => 49,  163 => 46,  156 => 41,  141 => 39,  137 => 38,  133 => 37,  125 => 36,  119 => 33,  114 => 30,  108 => 28,  106 => 27,  100 => 26,  95 => 24,  90 => 22,  84 => 19,  76 => 13,  65 => 11,  61 => 10,  56 => 8,  50 => 7,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "extension/module/customer_segment_common.twig", "");
    }
}
