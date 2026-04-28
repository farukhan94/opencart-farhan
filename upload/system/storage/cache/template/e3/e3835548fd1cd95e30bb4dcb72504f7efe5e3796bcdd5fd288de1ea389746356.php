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
class __TwigTemplate_bcd63cca05b74aa6e108d737dacd57a0b4b59ed93552ec403e56a4ca469cbc53 extends \Twig\Template
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
        if ( !($context["event_status"] ?? null)) {
            // line 19
            echo "    <div class=\"alert alert-warning\"><i class=\"fa fa-exclamation-triangle\"></i> ";
            echo ($context["text_event_warning"] ?? null);
            echo "
      <div class=\"pull-right\"><a href=\"";
            // line 20
            echo ($context["repair"] ?? null);
            echo "\" class=\"btn btn-warning btn-xs\"><i class=\"fa fa-wrench\"></i> ";
            echo ($context["button_repair"] ?? null);
            echo "</a></div>
    </div>
    ";
        }
        // line 23
        echo "    ";
        if (($context["error_warning"] ?? null)) {
            // line 24
            echo "    <div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo ($context["error_warning"] ?? null);
            echo "
      <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
    </div>
    ";
        }
        // line 28
        echo "    <div class=\"panel panel-default\">
      <div class=\"panel-heading\">
        <h3 class=\"panel-title\"><i class=\"fa fa-pencil\"></i> ";
        // line 30
        echo ($context["text_edit"] ?? null);
        echo "</h3>
      </div>
      <div class=\"panel-body\">
        <form action=\"";
        // line 33
        echo ($context["action"] ?? null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-module\" class=\"form-horizontal\">
          
          <ul class=\"nav nav-tabs\">
            <li class=\"active\"><a href=\"#tab-general\" data-toggle=\"tab\">";
        // line 36
        echo ($context["tab_general"] ?? null);
        echo "</a></li>
            <li><a href=\"#tab-rules\" data-toggle=\"tab\">";
        // line 37
        echo ($context["tab_rules"] ?? null);
        echo "</a></li>
            <li><a href=\"#tab-firebase\" data-toggle=\"tab\">";
        // line 38
        echo ($context["tab_firebase"] ?? null);
        echo "</a></li>
            <li><a href=\"#tab-manual\" data-toggle=\"tab\">";
        // line 39
        echo ($context["tab_manual"] ?? null);
        echo "</a></li>
            <li><a href=\"#tab-logs\" data-toggle=\"tab\">";
        // line 40
        echo ($context["tab_logs"] ?? null);
        echo "</a></li>
          </ul>

          <div class=\"tab-content\">
            <div class=\"tab-pane active\" id=\"tab-general\">
              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\" for=\"input-status\">";
        // line 46
        echo ($context["entry_status"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <select name=\"module_customer_segment_status\" id=\"input-status\" class=\"form-control\">
                    ";
        // line 49
        if (($context["module_customer_segment_status"] ?? null)) {
            // line 50
            echo "                    <option value=\"1\" selected=\"selected\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                    <option value=\"0\">";
            // line 51
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                    ";
        } else {
            // line 53
            echo "                    <option value=\"1\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                    <option value=\"0\" selected=\"selected\">";
            // line 54
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                    ";
        }
        // line 56
        echo "                  </select>
                </div>
              </div>
            </div>
            
            <div class=\"tab-pane\" id=\"tab-rules\">
              <div class=\"pull-right\" style=\"margin-bottom:10px;\">
                <button type=\"button\" onclick=\"addRule();\" class=\"btn btn-primary\"><i class=\"fa fa-plus\"></i> ";
        // line 63
        echo ($context["text_add"] ?? null);
        echo "</button>
              </div>
              <div class=\"table-responsive\">
                <table class=\"table table-bordered table-hover\">
                  <thead>
                    <tr>
                      <td class=\"text-left\">";
        // line 69
        echo ($context["entry_name"] ?? null);
        echo "</td>
                      <td class=\"text-left\">";
        // line 70
        echo ($context["entry_priority"] ?? null);
        echo "</td>
                      <td class=\"text-left\">";
        // line 71
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
        // line 83
        echo ((($context["module_customer_segment_firebase_project_id"] ?? null)) ? ("block") : ("none"));
        echo ";\">
                <div class=\"alert alert-success\">
                  <i class=\"fa fa-check-circle\"></i> <span id=\"firebase-project-text\">";
        // line 85
        echo twig_replace_filter(($context["text_firebase_connected"] ?? null), ["%s" => ($context["module_customer_segment_firebase_project_id"] ?? null)]);
        echo "</span>
                  <button type=\"button\" id=\"button-disconnect-firebase\" class=\"btn btn-danger btn-xs pull-right\">";
        // line 86
        echo ($context["text_disconnect"] ?? null);
        echo "</button>
                </div>
              </div>

              <div id=\"firebase-setup-ui\" style=\"display: ";
        // line 90
        echo ((($context["module_customer_segment_firebase_project_id"] ?? null)) ? ("none") : ("block"));
        echo ";\">
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\" for=\"input-firebase-json\">";
        // line 92
        echo ($context["entry_firebase_json"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <textarea name=\"module_customer_segment_firebase_json\" rows=\"8\" id=\"input-firebase-json\" class=\"form-control\" placeholder=\"Paste Service Account JSON here...\">";
        // line 94
        echo ($context["module_customer_segment_firebase_json"] ?? null);
        echo "</textarea>
                    <input type=\"hidden\" name=\"module_customer_segment_firebase_project_id\" value=\"";
        // line 95
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
        // line 121
        echo ($context["entry_target_group"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                      <select name=\"manual_customer_group_id\" id=\"input-manual-group\" class=\"form-control\">
                         <option value=\"\">-- Select Group --</option>
                         ";
        // line 125
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
            // line 126
            echo "                         <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["group"], "customer_group_id", [], "any", false, false, false, 126);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["group"], "name", [], "any", false, false, false, 126);
            echo "</option>
                         ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 128
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
        // line 166
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["logs"] ?? null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["log"]) {
            // line 167
            echo "                    <tr>
                      <td class=\"text-left\" style=\"white-space: nowrap;\">";
            // line 168
            echo twig_get_attribute($this->env, $this->source, $context["log"], "date", [], "any", false, false, false, 168);
            echo "</td>
                      <td class=\"text-left\">";
            // line 169
            echo twig_get_attribute($this->env, $this->source, $context["log"], "message", [], "any", false, false, false, 169);
            echo "</td>
                    </tr>
                    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 172
            echo "                    <tr>
                      <td class=\"text-center\" colspan=\"2\">";
            // line 173
            echo ($context["text_no_logs"] ?? null);
            echo "</td>
                    </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['log'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 176
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
        // line 193
        echo ($context["text_add"] ?? null);
        echo "</h4>
      </div>
      <div class=\"modal-body\">
        <form id=\"form-rule\" class=\"form-horizontal\">
           <input type=\"hidden\" name=\"rule_id\" id=\"rule-id\" value=\"\" />
           
           <div class=\"form-group required\">
             <label class=\"col-sm-3 control-label\">";
        // line 200
        echo ($context["entry_name"] ?? null);
        echo "</label>
             <div class=\"col-sm-9\">
               <input type=\"text\" name=\"name\" id=\"rule-name\" class=\"form-control\" />
             </div>
           </div>

           <div class=\"form-group\">
             <label class=\"col-sm-3 control-label\">";
        // line 207
        echo ($context["entry_target_group"] ?? null);
        echo "</label>
             <div class=\"col-sm-9\">
               <select name=\"target_group_id\" id=\"rule-target-group\" class=\"form-control\">
                 ";
        // line 210
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
            // line 211
            echo "                 <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["group"], "customer_group_id", [], "any", false, false, false, 211);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["group"], "name", [], "any", false, false, false, 211);
            echo "</option>
                 ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 213
        echo "               </select>
             </div>
           </div>

           <div class=\"form-group text-center\">
             <h5 style=\"background:#f5f5f5; padding:10px; border-bottom:1px solid #ddd;\">Requirements (AND Logic)</h5>
           </div>

           <div class=\"form-group\">
             <label class=\"col-sm-3 control-label\">";
        // line 222
        echo ($context["entry_spend_min"] ?? null);
        echo "</label>
             <div class=\"col-sm-3\">
               <input type=\"number\" name=\"spend_min\" id=\"rule-spend-min\" class=\"form-control\" value=\"0.00\" />
             </div>
             <label class=\"col-sm-3 control-label\">";
        // line 226
        echo ($context["entry_spend_max"] ?? null);
        echo "</label>
             <div class=\"col-sm-3\">
               <input type=\"number\" name=\"spend_max\" id=\"rule-spend-max\" class=\"form-control\" value=\"0.00\" />
             </div>
           </div>

           <div class=\"form-group\">
             <label class=\"col-sm-3 control-label\">";
        // line 233
        echo ($context["entry_order_count_min"] ?? null);
        echo "</label>
             <div class=\"col-sm-3\">
               <input type=\"number\" name=\"order_count_min\" id=\"rule-order-count-min\" class=\"form-control\" value=\"0\" />
             </div>
             <label class=\"col-sm-3 control-label\">";
        // line 237
        echo ($context["entry_order_count_max"] ?? null);
        echo "</label>
             <div class=\"col-sm-3\">
               <input type=\"number\" name=\"order_count_max\" id=\"rule-order-count-max\" class=\"form-control\" value=\"0\" />
             </div>
           </div>

           <div class=\"form-group\">
             <label class=\"col-sm-3 control-label\">";
        // line 244
        echo ($context["entry_priority"] ?? null);
        echo "</label>
             <div class=\"col-sm-3\">
               <input type=\"number\" name=\"priority\" id=\"rule-priority\" class=\"form-control\" value=\"0\" />
             </div>
             <label class=\"col-sm-3 control-label\">";
        // line 248
        echo ($context["entry_status"] ?? null);
        echo "</label>
             <div class=\"col-sm-3\">
               <select name=\"status\" id=\"rule-status\" class=\"form-control\">
                 <option value=\"1\">";
        // line 251
        echo ($context["text_enabled"] ?? null);
        echo "</option>
                 <option value=\"0\">";
        // line 252
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
        // line 273
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
        // line 290
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
        // line 300
        echo ($context["text_add"] ?? null);
        echo "');
    \$('#modal-rule').modal('show');
}

function saveRule() {
    \$.ajax({
        url: 'index.php?route=extension/module/customer_segment/saveRule&user_token=";
        // line 306
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
        // line 325
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
        // line 334
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
        // line 348
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
        // line 360
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
        // line 373
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
        // line 406
        echo ($context["text_confirm_disconnect"] ?? null);
        echo "')) {
\t\t\$.ajax({
\t\t\turl: 'index.php?route=extension/module/customer_segment/disconnectFirebase&user_token=";
        // line 408
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
        // line 434
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
        // line 450
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
        // line 459
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
        // line 485
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
        // line 498
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
        // line 516
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
        return array (  809 => 516,  788 => 498,  772 => 485,  743 => 459,  731 => 450,  712 => 434,  683 => 408,  678 => 406,  642 => 373,  626 => 360,  611 => 348,  594 => 334,  582 => 325,  560 => 306,  551 => 300,  538 => 290,  518 => 273,  494 => 252,  490 => 251,  484 => 248,  477 => 244,  467 => 237,  460 => 233,  450 => 226,  443 => 222,  432 => 213,  421 => 211,  417 => 210,  411 => 207,  401 => 200,  391 => 193,  372 => 176,  363 => 173,  360 => 172,  352 => 169,  348 => 168,  345 => 167,  340 => 166,  300 => 128,  289 => 126,  285 => 125,  278 => 121,  249 => 95,  245 => 94,  240 => 92,  235 => 90,  228 => 86,  224 => 85,  219 => 83,  204 => 71,  200 => 70,  196 => 69,  187 => 63,  178 => 56,  173 => 54,  168 => 53,  163 => 51,  158 => 50,  156 => 49,  150 => 46,  141 => 40,  137 => 39,  133 => 38,  129 => 37,  125 => 36,  119 => 33,  113 => 30,  109 => 28,  101 => 24,  98 => 23,  90 => 20,  85 => 19,  83 => 18,  76 => 13,  65 => 11,  61 => 10,  56 => 8,  50 => 7,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "extension/module/customer_segment.twig", "");
    }
}
