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

/* extension/module/customer_segment.twig */
class __TwigTemplate_06d55ae16068c945b27a59789716d709eb97e55dcb950e4553caff1295adf4b3 extends \Twig\Template
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
    ";
        // line 17
        if (($context["error_warning"] ?? null)) {
            // line 18
            echo "    <div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo ($context["error_warning"] ?? null);
            echo "
      <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
    </div>
    ";
        }
        // line 22
        echo "    <div class=\"panel panel-default\">
      <div class=\"panel-heading\">
        <h3 class=\"panel-title\"><i class=\"fa fa-pencil\"></i> ";
        // line 24
        echo ($context["text_edit"] ?? null);
        echo "</h3>
      </div>
      <div class=\"panel-body\">
        <form action=\"";
        // line 27
        echo ($context["action"] ?? null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-module\" class=\"form-horizontal\">
          
          <ul class=\"nav nav-tabs\">
            <li class=\"active\"><a href=\"#tab-general\" data-toggle=\"tab\">";
        // line 30
        echo ($context["tab_general"] ?? null);
        echo "</a></li>
            <li><a href=\"#tab-rules\" data-toggle=\"tab\">";
        // line 31
        echo ($context["tab_rules"] ?? null);
        echo "</a></li>
            <li><a href=\"#tab-firebase\" data-toggle=\"tab\">";
        // line 32
        echo ($context["tab_firebase"] ?? null);
        echo "</a></li>
            <li><a href=\"#tab-manual\" data-toggle=\"tab\">";
        // line 33
        echo ($context["tab_manual"] ?? null);
        echo "</a></li>
            <li><a href=\"#tab-logs\" data-toggle=\"tab\">";
        // line 34
        echo ($context["tab_logs"] ?? null);
        echo "</a></li>
          </ul>

          <div class=\"tab-content\">
            <div class=\"tab-pane active\" id=\"tab-general\">
              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\" for=\"input-status\">";
        // line 40
        echo ($context["entry_status"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <select name=\"module_customer_segment_status\" id=\"input-status\" class=\"form-control\">
                    ";
        // line 43
        if (($context["module_customer_segment_status"] ?? null)) {
            // line 44
            echo "                    <option value=\"1\" selected=\"selected\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                    <option value=\"0\">";
            // line 45
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                    ";
        } else {
            // line 47
            echo "                    <option value=\"1\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                    <option value=\"0\" selected=\"selected\">";
            // line 48
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                    ";
        }
        // line 50
        echo "                  </select>
                </div>
              </div>
              <!-- Other general settings like schedule -->
            </div>
            
            <div class=\"tab-pane\" id=\"tab-rules\">
              <div class=\"pull-right\" style=\"margin-bottom:10px;\">
                <button type=\"button\" onclick=\"addRule();\" class=\"btn btn-primary\"><i class=\"fa fa-plus\"></i> ";
        // line 58
        echo ($context["text_add"] ?? null);
        echo "</button>
              </div>
              <div class=\"table-responsive\">
                <table class=\"table table-bordered table-hover\">
                  <thead>
                    <tr>
                      <td class=\"text-left\">";
        // line 64
        echo ($context["entry_name"] ?? null);
        echo "</td>
                      <td class=\"text-left\">";
        // line 65
        echo ($context["entry_priority"] ?? null);
        echo "</td>
                      <td class=\"text-left\">";
        // line 66
        echo ($context["entry_status"] ?? null);
        echo "</td>
                      <td class=\"text-right\">Action</td>
                    </tr>
                  </thead>
                  <tbody id=\"rule-list\">
                    <!-- Loaded via AJAX -->
                  </tbody>
                </table>
              </div>
            </div>

            <div class=\"tab-pane\" id=\"tab-firebase\">
              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\" for=\"input-firebase-key\">";
        // line 79
        echo ($context["entry_firebase_key"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"module_customer_segment_firebase_key\" value=\"";
        // line 81
        echo ($context["module_customer_segment_firebase_key"] ?? null);
        echo "\" id=\"input-firebase-key\" class=\"form-control\" />
                </div>
              </div>
              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\" for=\"input-firebase-json\">";
        // line 85
        echo ($context["entry_firebase_json"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <textarea name=\"module_customer_segment_firebase_json\" rows=\"8\" id=\"input-firebase-json\" class=\"form-control\">";
        // line 87
        echo ($context["module_customer_segment_firebase_json"] ?? null);
        echo "</textarea>
                </div>
              </div>
              <div class=\"form-group\">
                <div class=\"col-sm-2\"></div>
                <div class=\"col-sm-10\">
                  <button type=\"button\" id=\"button-verify-firebase\" class=\"btn btn-success\"><i class=\"fa fa-check\"></i> Verify Connection</button>
                </div>
              </div>
            </div>

            <div class=\"tab-pane\" id=\"tab-manual\">
               <!-- Manual assignments list and search -->
            </div>

            <div class=\"tab-pane\" id=\"tab-logs\">
               <!-- Logs table -->
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
";
        // line 111
        echo ($context["footer"] ?? null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "extension/module/customer_segment.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  248 => 111,  221 => 87,  216 => 85,  209 => 81,  204 => 79,  188 => 66,  184 => 65,  180 => 64,  171 => 58,  161 => 50,  156 => 48,  151 => 47,  146 => 45,  141 => 44,  139 => 43,  133 => 40,  124 => 34,  120 => 33,  116 => 32,  112 => 31,  108 => 30,  102 => 27,  96 => 24,  92 => 22,  84 => 18,  82 => 17,  76 => 13,  65 => 11,  61 => 10,  56 => 8,  50 => 7,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "extension/module/customer_segment.twig", "");
    }
}
