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
class __TwigTemplate_c712c1dc630cf299c8770e8bcc6671b5ee3b69494b84a1cfbdd160734fee6e0a extends \Twig\Template
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
    <div id=\"firebase-alert\"></div>
    ";
        // line 18
        if (($context["error_warning"] ?? null)) {
            // line 19
            echo "    <div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo ($context["error_warning"] ?? null);
            echo "
      <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
    </div>
    ";
        }
        // line 23
        echo "    <div class=\"panel panel-default\">
      <div class=\"panel-heading\">
        <h3 class=\"panel-title\"><i class=\"fa fa-pencil\"></i> ";
        // line 25
        echo ($context["text_edit"] ?? null);
        echo "</h3>
      </div>
      <div class=\"panel-body\">
        <form action=\"";
        // line 28
        echo ($context["action"] ?? null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-module\" class=\"form-horizontal\">
          
          <ul class=\"nav nav-tabs\">
            <li class=\"active\"><a href=\"#tab-general\" data-toggle=\"tab\">";
        // line 31
        echo ($context["tab_general"] ?? null);
        echo "</a></li>
            <li><a href=\"#tab-rules\" data-toggle=\"tab\">";
        // line 32
        echo ($context["tab_rules"] ?? null);
        echo "</a></li>
            <li><a href=\"#tab-firebase\" data-toggle=\"tab\">";
        // line 33
        echo ($context["tab_firebase"] ?? null);
        echo "</a></li>
            <li><a href=\"#tab-manual\" data-toggle=\"tab\">";
        // line 34
        echo ($context["tab_manual"] ?? null);
        echo "</a></li>
            <li><a href=\"#tab-logs\" data-toggle=\"tab\">";
        // line 35
        echo ($context["tab_logs"] ?? null);
        echo "</a></li>
          </ul>

          <div class=\"tab-content\">
            <div class=\"tab-pane active\" id=\"tab-general\">
              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\" for=\"input-status\">";
        // line 41
        echo ($context["entry_status"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <select name=\"module_customer_segment_status\" id=\"input-status\" class=\"form-control\">
                    ";
        // line 44
        if (($context["module_customer_segment_status"] ?? null)) {
            // line 45
            echo "                    <option value=\"1\" selected=\"selected\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                    <option value=\"0\">";
            // line 46
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                    ";
        } else {
            // line 48
            echo "                    <option value=\"1\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                    <option value=\"0\" selected=\"selected\">";
            // line 49
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                    ";
        }
        // line 51
        echo "                  </select>
                </div>
              </div>
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
                    <!-- Rule items would be loaded here -->
                  </tbody>
                </table>
              </div>
            </div>

            <div class=\"tab-pane\" id=\"tab-firebase\">
              <div id=\"firebase-connected-ui\" style=\"display: ";
        // line 78
        echo ((($context["module_customer_segment_firebase_project_id"] ?? null)) ? ("block") : ("none"));
        echo ";\">
                <div class=\"alert alert-success\">
                  <i class=\"fa fa-check-circle\"></i> <span id=\"firebase-project-text\">";
        // line 80
        echo twig_replace_filter(($context["text_firebase_connected"] ?? null), ["%s" => ($context["module_customer_segment_firebase_project_id"] ?? null)]);
        echo "</span>
                  <button type=\"button\" id=\"button-disconnect-firebase\" class=\"btn btn-danger btn-xs pull-right\">";
        // line 81
        echo ($context["text_disconnect"] ?? null);
        echo "</button>
                </div>
              </div>

              <div id=\"firebase-setup-ui\" style=\"display: ";
        // line 85
        echo ((($context["module_customer_segment_firebase_project_id"] ?? null)) ? ("none") : ("block"));
        echo ";\">
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\" for=\"input-firebase-json\">";
        // line 87
        echo ($context["entry_firebase_json"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <textarea name=\"module_customer_segment_firebase_json\" rows=\"8\" id=\"input-firebase-json\" class=\"form-control\" placeholder=\"Paste Service Account JSON here...\">";
        // line 89
        echo ($context["module_customer_segment_firebase_json"] ?? null);
        echo "</textarea>
                    <input type=\"hidden\" name=\"module_customer_segment_firebase_project_id\" value=\"";
        // line 90
        echo ($context["module_customer_segment_firebase_project_id"] ?? null);
        echo "\" id=\"input-firebase-project-id\" />
                  </div>
                </div>
                <div class=\"form-group\">
                  <div class=\"col-sm-2\"></div>
                  <div class=\"col-sm-10\">
                    <button type=\"button\" id=\"button-verify-firebase\" class=\"btn btn-success\"><i class=\"fa fa-check\"></i> Verify & Connect</button>
                  </div>
                </div>
              </div>
            </div>

            <div class=\"tab-pane\" id=\"tab-manual\">
               <div class=\"text-center\">";
        // line 103
        echo ($context["text_no_results"] ?? null);
        echo "</div>
            </div>

            <div class=\"tab-pane\" id=\"tab-logs\">
               <div class=\"table-responsive\">
                <table class=\"table table-bordered table-hover\">
                  <thead>
                    <tr>
                      <td class=\"text-left\">Date</td>
                      <td class=\"text-left\">Message</td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class=\"text-center\" colspan=\"2\">";
        // line 117
        echo ($context["text_no_logs"] ?? null);
        echo "</td>
                    </tr>
                  </tbody>
                </table>
               </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script type=\"text/javascript\"><!--
\$('#button-verify-firebase').on('click', function() {
\tvar json = \$('#input-firebase-json').val();
\t
\t\$.ajax({
\t\turl: 'index.php?route=extension/module/customer_segment/verifyFirebase&user_token=";
        // line 135
        echo ($context["user_token"] ?? null);
        echo "',
\t\ttype: 'post',
\t\tdata: { firebase_json: json },
\t\tdataType: 'json',
\t\tbeforeSend: function() {
\t\t\t\$('#button-verify-firebase').button('loading');
\t\t},
\t\tcomplete: function() {
\t\t\t\$('#button-verify-firebase').button('reset');
\t\t},
\t\tsuccess: function(json) {
\t\t\t\$('.alert-dismissible').remove();
\t\t\t
\t\t\tif (json['error']) {
\t\t\t\t\$('#firebase-alert').html('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ' + json['error'] + ' <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>');
\t\t\t}
\t\t\t
\t\t\tif (json['success']) {
\t\t\t\t\$('#firebase-alert').html('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>');
\t\t\t\t
\t\t\t\t\$('#input-firebase-project-id').val(json['project_id']);
\t\t\t\t\$('#firebase-project-text').html(json['html']);
\t\t\t\t\$('#firebase-setup-ui').hide();
\t\t\t\t\$('#firebase-connected-ui').show();
\t\t\t}
\t\t},
\t\terror: function(xhr, ajaxOptions, thrownError) {
\t\t\talert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
\t\t}
\t});
});

\$('#button-disconnect-firebase').on('click', function() {
\tif (confirm('";
        // line 168
        echo ($context["text_confirm_disconnect"] ?? null);
        echo "')) {
\t\t\$.ajax({
\t\t\turl: 'index.php?route=extension/module/customer_segment/disconnectFirebase&user_token=";
        // line 170
        echo ($context["user_token"] ?? null);
        echo "',
\t\t\tdataType: 'json',
\t\t\tbeforeSend: function() {
\t\t\t\t\$('#button-disconnect-firebase').button('loading');
\t\t\t},
\t\t\tcomplete: function() {
\t\t\t\t\$('#button-disconnect-firebase').button('reset');
\t\t\t},
\t\t\tsuccess: function(json) {
\t\t\t\tif (json['success']) {
\t\t\t\t\t\$('#input-firebase-json').val('');
\t\t\t\t\t\$('#input-firebase-project-id').val('');
\t\t\t\t\t\$('#firebase-connected-ui').hide();
\t\t\t\t\t\$('#firebase-setup-ui').show();
\t\t\t\t}
\t\t\t}
\t\t});
\t}
});
//--></script>
";
        // line 190
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
        return array (  351 => 190,  328 => 170,  323 => 168,  287 => 135,  266 => 117,  249 => 103,  233 => 90,  229 => 89,  224 => 87,  219 => 85,  212 => 81,  208 => 80,  203 => 78,  188 => 66,  184 => 65,  180 => 64,  171 => 58,  162 => 51,  157 => 49,  152 => 48,  147 => 46,  142 => 45,  140 => 44,  134 => 41,  125 => 35,  121 => 34,  117 => 33,  113 => 32,  109 => 31,  103 => 28,  97 => 25,  93 => 23,  85 => 19,  83 => 18,  76 => 13,  65 => 11,  61 => 10,  56 => 8,  50 => 7,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "extension/module/customer_segment.twig", "");
    }
}
