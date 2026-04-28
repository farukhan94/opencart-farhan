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
class __TwigTemplate_524a4038a92919b60f866a84f08b532a72f7ef67e16923eb3644146b73a44bf0 extends \Twig\Template
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
    <div id=\"module-alert\"></div>
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
                    <!-- Rule items will be loaded by AJAX -->
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
              <div class=\"panel panel-default\" style=\"margin-top:20px;\">
                <div class=\"panel-heading\">
                  <h3 class=\"panel-title\"><i class=\"fa fa-user-plus\"></i> Add Manual Assignment</h3>
                </div>
                <div class=\"panel-body\">
                  <div class=\"form-group\">
                    <label class=\"col-sm-2 control-label\" for=\"input-customer-search\">Search Customer</label>
                    <div class=\"col-sm-10\">
                      <input type=\"text\" name=\"customer_search\" value=\"\" placeholder=\"Type customer name...\" id=\"input-customer-search\" class=\"form-control\" />
                      <input type=\"hidden\" name=\"manual_customer_id\" id=\"input-customer-id\" value=\"\" />
                    </div>
                  </div>
                  <div class=\"form-group\">
                    <label class=\"col-sm-2 control-label\" for=\"input-manual-group\">";
        // line 116
        echo ($context["entry_target_group"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                      <select name=\"manual_customer_group_id\" id=\"input-manual-group\" class=\"form-control\">
                         <option value=\"\">-- Select Group --</option>
                         ";
        // line 120
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
            // line 121
            echo "                         <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["group"], "customer_group_id", [], "any", false, false, false, 121);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["group"], "name", [], "any", false, false, false, 121);
            echo "</option>
                         ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 123
        echo "                      </select>
                    </div>
                  </div>
                  <div class=\"form-group text-right\">
                    <div class=\"col-sm-12\">
                      <button type=\"button\" id=\"button-add-manual\" class=\"btn btn-primary\"><i class=\"fa fa-plus\"></i> Assign Segment</button>
                    </div>
                  </div>
                </div>
              </div>

              <div class=\"table-responsive\">
                <table class=\"table table-bordered table-hover\">
                  <thead>
                    <tr>
                      <td class=\"text-left\">Customer</td>
                      <td class=\"text-left\">Assigned Segment</td>
                      <td class=\"text-left\">Date Added</td>
                      <td class=\"text-right\">Action</td>
                    </tr>
                  </thead>
                  <tbody id=\"manual-list\">
                    <!-- Manual list items loaded by AJAX -->
                  </tbody>
                </table>
              </div>
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
                    ";
        // line 161
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["logs"] ?? null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["log"]) {
            // line 162
            echo "                    <tr>
                      <td class=\"text-left\" style=\"white-space: nowrap;\">";
            // line 163
            echo twig_get_attribute($this->env, $this->source, $context["log"], "date", [], "any", false, false, false, 163);
            echo "</td>
                      <td class=\"text-left\">";
            // line 164
            echo twig_get_attribute($this->env, $this->source, $context["log"], "message", [], "any", false, false, false, 164);
            echo "</td>
                    </tr>
                    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 167
            echo "                    <tr>
                      <td class=\"text-center\" colspan=\"2\">";
            // line 168
            echo ($context["text_no_logs"] ?? null);
            echo "</td>
                    </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['log'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 171
        echo "                  </tbody>
                </table>
               </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Rule Modal -->
<div class=\"modal fade\" id=\"modal-rule\" tabindex=\"-1\" role=\"dialog\">
  <div class=\"modal-dialog modal-lg\" role=\"document\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
        <h4 class=\"modal-title\" id=\"rule-modal-title\">";
        // line 188
        echo ($context["text_add"] ?? null);
        echo "</h4>
      </div>
      <div class=\"modal-body\">
        <form id=\"form-rule\" class=\"form-horizontal\">
           <input type=\"hidden\" name=\"rule_id\" id=\"rule-id\" value=\"\" />
           
           <div class=\"form-group required\">
             <label class=\"col-sm-3 control-label\">";
        // line 195
        echo ($context["entry_name"] ?? null);
        echo "</label>
             <div class=\"col-sm-9\">
               <input type=\"text\" name=\"name\" id=\"rule-name\" class=\"form-control\" />
             </div>
           </div>

           <div class=\"form-group\">
             <label class=\"col-sm-3 control-label\">";
        // line 202
        echo ($context["entry_target_group"] ?? null);
        echo "</label>
             <div class=\"col-sm-9\">
               <select name=\"target_group_id\" id=\"rule-target-group\" class=\"form-control\">
                 ";
        // line 205
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
            // line 206
            echo "                 <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["group"], "customer_group_id", [], "any", false, false, false, 206);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["group"], "name", [], "any", false, false, false, 206);
            echo "</option>
                 ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 208
        echo "               </select>
             </div>
           </div>

           <div class=\"form-group text-center\">
             <h5 style=\"background:#f5f5f5; padding:10px; border-bottom:1px solid #ddd;\">Requirements (AND Logic)</h5>
           </div>

           <div class=\"form-group\">
             <label class=\"col-sm-3 control-label\">";
        // line 217
        echo ($context["entry_spend_min"] ?? null);
        echo "</label>
             <div class=\"col-sm-3\">
               <input type=\"number\" name=\"spend_min\" id=\"rule-spend-min\" class=\"form-control\" value=\"0.00\" />
             </div>
             <label class=\"col-sm-3 control-label\">";
        // line 221
        echo ($context["entry_spend_max"] ?? null);
        echo "</label>
             <div class=\"col-sm-3\">
               <input type=\"number\" name=\"spend_max\" id=\"rule-spend-max\" class=\"form-control\" value=\"0.00\" />
             </div>
           </div>

           <div class=\"form-group\">
             <label class=\"col-sm-3 control-label\">";
        // line 228
        echo ($context["entry_order_count_min"] ?? null);
        echo "</label>
             <div class=\"col-sm-3\">
               <input type=\"number\" name=\"order_count_min\" id=\"rule-order-count-min\" class=\"form-control\" value=\"0\" />
             </div>
             <label class=\"col-sm-3 control-label\">";
        // line 232
        echo ($context["entry_order_count_max"] ?? null);
        echo "</label>
             <div class=\"col-sm-3\">
               <input type=\"number\" name=\"order_count_max\" id=\"rule-order-count-max\" class=\"form-control\" value=\"0\" />
             </div>
           </div>

           <div class=\"form-group\">
             <label class=\"col-sm-3 control-label\">";
        // line 239
        echo ($context["entry_priority"] ?? null);
        echo "</label>
             <div class=\"col-sm-3\">
               <input type=\"number\" name=\"priority\" id=\"rule-priority\" class=\"form-control\" value=\"0\" />
             </div>
             <label class=\"col-sm-3 control-label\">";
        // line 243
        echo ($context["entry_status"] ?? null);
        echo "</label>
             <div class=\"col-sm-3\">
               <select name=\"status\" id=\"rule-status\" class=\"form-control\">
                 <option value=\"1\">";
        // line 246
        echo ($context["text_enabled"] ?? null);
        echo "</option>
                 <option value=\"0\">";
        // line 247
        echo ($context["text_disabled"] ?? null);
        echo "</option>
               </select>
             </div>
           </div>
        </form>
      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
        <button type=\"button\" class=\"btn btn-primary\" onclick=\"saveRule();\">Save Rule</button>
      </div>
    </div>
  </div>
</div>

<script type=\"text/javascript\"><!--
\$(document).ready(function() {
    loadRules();
});

function loadRules() {
    \$.ajax({
        url: 'index.php?route=extension/module/customer_segment/getRules&user_token=";
        // line 268
        echo ($context["user_token"] ?? null);
        echo "',
        dataType: 'json',
        success: function(json) {
            var html = '';
            if (json.length > 0) {
                for (var i = 0; i < json.length; i++) {
                    html += '<tr>';
                    html += '  <td class=\"text-left\">' + json[i]['name'] + '</td>';
                    html += '  <td class=\"text-left\">' + json[i]['priority'] + '</td>';
                    html += '  <td class=\"text-left\">' + json[i]['status'] + '</td>';
                    html += '  <td class=\"text-right\">';
                    html += '    <button type=\"button\" onclick=\"editRule(' + json[i]['rule_id'] + ');\" class=\"btn btn-primary btn-xs\"><i class=\"fa fa-pencil\"></i></button>';
                    html += '    <button type=\"button\" onclick=\"deleteRule(' + json[i]['rule_id'] + ');\" class=\"btn btn-danger btn-xs\"><i class=\"fa fa-trash\"></i></button>';
                    html += '  </td>';
                    html += '</tr>';
                }
            } else {
                html = '<tr><td class=\"text-center\" colspan=\"4\">";
        // line 285
        echo ($context["text_no_results"] ?? null);
        echo "</td></tr>';
            }
            \$('#rule-list').html(html);
        }
    });
}

function addRule() {
    \$('#form-rule')[0].reset();
    \$('#rule-id').val('');
    \$('#rule-modal-title').text('";
        // line 295
        echo ($context["text_add"] ?? null);
        echo "');
    \$('#modal-rule').modal('show');
}

function saveRule() {
    \$.ajax({
        url: 'index.php?route=extension/module/customer_segment/saveRule&user_token=";
        // line 301
        echo ($context["user_token"] ?? null);
        echo "',
        type: 'post',
        data: \$('#form-rule').serialize(),
        dataType: 'json',
        success: function(json) {
            \$('.alert-dismissible').remove();
            if (json['error']) {
                \$('#module-alert').html('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ' + json['error'] + ' <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>');
            }
            if (json['success']) {
                \$('#modal-rule').modal('hide');
                loadRules();
            }
        }
    });
}

function editRule(rule_id) {
    \$.ajax({
        url: 'index.php?route=extension/module/customer_segment/getRules&user_token=";
        // line 320
        echo ($context["user_token"] ?? null);
        echo "',
        dataType: 'json',
        success: function(json) {
            var rule = json.find(r => r.rule_id == rule_id);
            if (rule) {
                // For a more robust approach, we'd have a separate getRule API,
                // but since getRules returns basic info, we'll implement that next or use another AJAX.
                // Let's assume we need a getRule endpoint for detailed info.
                \$.ajax({
                    url: 'index.php?route=extension/module/customer_segment/getRule&user_token=";
        // line 329
        echo ($context["user_token"] ?? null);
        echo "&rule_id=' + rule_id,
                    dataType: 'json',
                    success: function(json) {
                        \$('#form-rule')[0].reset();
                        \$('#rule-id').val(json['rule_id']);
                        \$('#rule-name').val(json['name']);
                        \$('#rule-target-group').val(json['target_group_id']);
                        \$('#rule-priority').val(json['priority']);
                        \$('#rule-status').val(json['status']);
                        \$('#rule-spend-min').val(json['spend_min']);
                        \$('#rule-spend-max').val(json['spend_max']);
                        \$('#rule-order-count-min').val(json['order_count_min']);
                        \$('#rule-order-count-max').val(json['order_count_max']);
                        
                        \$('#rule-modal-title').text('";
        // line 343
        echo ($context["text_edit_rule"] ?? null);
        echo "');
                        \$('#modal-rule').modal('show');
                    }
                });
            }
        }
    });
}

function deleteRule(rule_id) {
    if (confirm('Are you sure?')) {
        \$.ajax({
            url: 'index.php?route=extension/module/customer_segment/deleteRule&user_token=";
        // line 355
        echo ($context["user_token"] ?? null);
        echo "&rule_id=' + rule_id,
            dataType: 'json',
            success: function(json) {
                loadRules();
            }
        });
    }
}

\$('#button-verify-firebase').on('click', function() {
\tvar json = \$('#input-firebase-json').val();
\t
\t\$.ajax({
\t\turl: 'index.php?route=extension/module/customer_segment/verifyFirebase&user_token=";
        // line 368
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
\t\t\t\t\$('#module-alert').html('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ' + json['error'] + ' <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>');
\t\t\t}
\t\t\t
\t\t\tif (json['success']) {
\t\t\t\t\$('#module-alert').html('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>');
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
        // line 401
        echo ($context["text_confirm_disconnect"] ?? null);
        echo "')) {
\t\t\$.ajax({
\t\t\turl: 'index.php?route=extension/module/customer_segment/disconnectFirebase&user_token=";
        // line 403
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
// Manual Assignments
\$(document).ready(function() {
    loadManuals();
});

function loadManuals() {
    \$.ajax({
        url: 'index.php?route=extension/module/customer_segment/getManuals&user_token=";
        // line 429
        echo ($context["user_token"] ?? null);
        echo "',
        dataType: 'json',
        success: function(json) {
            var html = '';
            if (json.length > 0) {
                for (var i = 0; i < json.length; i++) {
                    html += '<tr>';
                    html += '  <td class=\"text-left\">' + json[i]['customer_name'] + '</td>';
                    html += '  <td class=\"text-left\">' + json[i]['group_name'] + '</td>';
                    html += '  <td class=\"text-left\">' + json[i]['date_added'] + '</td>';
                    html += '  <td class=\"text-right\">';
                    html += '    <button type=\"button\" onclick=\"deleteManual(' + json[i]['customer_id'] + ');\" class=\"btn btn-danger btn-xs\"><i class=\"fa fa-trash\"></i></button>';
                    html += '  </td>';
                    html += '</tr>';
                }
            } else {
                html = '<tr><td class=\"text-center\" colspan=\"4\">";
        // line 445
        echo ($context["text_no_results"] ?? null);
        echo "</td></tr>';
            }
            \$('#manual-list').html(html);
        }
    });
}

\$('#button-add-manual').on('click', function() {
    \$.ajax({
        url: 'index.php?route=extension/module/customer_segment/addManual&user_token=";
        // line 454
        echo ($context["user_token"] ?? null);
        echo "',
        type: 'post',
        data: {
            customer_id: \$('#input-customer-id').val(),
            customer_group_id: \$('#input-manual-group').val()
        },
        dataType: 'json',
        success: function(json) {
            \$('.alert-dismissible').remove();
            if (json['error']) {
                \$('#module-alert').html('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ' + json['error'] + ' <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>');
            }
            if (json['success']) {
                \$('#module-alert').html('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>');
                \$('#input-customer-search').val('');
                \$('#input-customer-id').val('');
                \$('#input-manual-group').val('');
                loadManuals();
            }
        }
    });
});

function deleteManual(customer_id) {
    if (confirm('Are you sure?')) {
        \$.ajax({
            url: 'index.php?route=extension/module/customer_segment/deleteManual&user_token=";
        // line 480
        echo ($context["user_token"] ?? null);
        echo "&customer_id=' + customer_id,
            dataType: 'json',
            success: function(json) {
                loadManuals();
            }
        });
    }
}

// Autocomplete for customer search
\$('input[name=\\'customer_search\\']').autocomplete({
\t'source': function(request, response) {
\t\t\$.ajax({
\t\t\turl: 'index.php?route=extension/module/customer_segment/autocomplete&user_token=";
        // line 493
        echo ($context["user_token"] ?? null);
        echo "&filter_name=' +  encodeURIComponent(request),
\t\t\tdataType: 'json',
\t\t\tsuccess: function(json) {
\t\t\t\tresponse(\$.map(json, function(item) {
\t\t\t\t\treturn {
\t\t\t\t\t\tlabel: item['name'],
\t\t\t\t\t\tvalue: item['customer_id']
\t\t\t\t\t}
\t\t\t\t}));
\t\t\t}
\t\t});
\t},
\t'select': function(item) {
\t\t\$('input[name=\\'customer_search\\']').val(item['label']);
\t\t\$('input[name=\\'manual_customer_id\\']').val(item['value']);
\t}
});
//--></script>
";
        // line 511
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
        return array (  793 => 511,  772 => 493,  756 => 480,  727 => 454,  715 => 445,  696 => 429,  667 => 403,  662 => 401,  626 => 368,  610 => 355,  595 => 343,  578 => 329,  566 => 320,  544 => 301,  535 => 295,  522 => 285,  502 => 268,  478 => 247,  474 => 246,  468 => 243,  461 => 239,  451 => 232,  444 => 228,  434 => 221,  427 => 217,  416 => 208,  405 => 206,  401 => 205,  395 => 202,  385 => 195,  375 => 188,  356 => 171,  347 => 168,  344 => 167,  336 => 164,  332 => 163,  329 => 162,  324 => 161,  284 => 123,  273 => 121,  269 => 120,  262 => 116,  233 => 90,  229 => 89,  224 => 87,  219 => 85,  212 => 81,  208 => 80,  203 => 78,  188 => 66,  184 => 65,  180 => 64,  171 => 58,  162 => 51,  157 => 49,  152 => 48,  147 => 46,  142 => 45,  140 => 44,  134 => 41,  125 => 35,  121 => 34,  117 => 33,  113 => 32,  109 => 31,  103 => 28,  97 => 25,  93 => 23,  85 => 19,  83 => 18,  76 => 13,  65 => 11,  61 => 10,  56 => 8,  50 => 7,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "extension/module/customer_segment.twig", "");
    }
}
