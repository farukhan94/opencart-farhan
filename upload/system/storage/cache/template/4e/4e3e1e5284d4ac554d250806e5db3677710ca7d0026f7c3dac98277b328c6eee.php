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
class __TwigTemplate_fe464af7dcf572168ea9ab5930171beb0e759110be9493ff5149e677e5406d17 extends \Twig\Template
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
        <button type=\"button\" class=\"btn btn-info\" data-toggle=\"modal\" data-target=\"#modal-testing-app\" style=\"margin-right: 15px;\"><i class=\"fa fa-mobile\"></i> Download Testing App</button>
        <button type=\"submit\" form=\"form-module\" data-toggle=\"tooltip\" title=\"";
        // line 7
        echo ($context["button_save"] ?? null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa fa-save\"></i></button>
        <a href=\"";
        // line 8
        echo ($context["cancel"] ?? null);
        echo "\" data-toggle=\"tooltip\" title=\"";
        echo ($context["button_cancel"] ?? null);
        echo "\" class=\"btn btn-default\"><i class=\"fa fa-reply\"></i></a></div>
      <h1>";
        // line 9
        echo ($context["heading_title"] ?? null);
        echo "</h1>
      <ul class=\"breadcrumb\">
        ";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 12
            echo "        <li><a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 12);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 12);
            echo "</a></li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        echo "      </ul>
    </div>
  </div>
  <div class=\"container-fluid\">
    <div id=\"module-alert\"></div>
    ";
        // line 19
        if ( !($context["event_status"] ?? null)) {
            // line 20
            echo "    <div class=\"alert alert-warning\"><i class=\"fa fa-exclamation-triangle\"></i> ";
            echo ($context["text_event_warning"] ?? null);
            echo "
      <div class=\"pull-right\"><a href=\"";
            // line 21
            echo ($context["repair"] ?? null);
            echo "\" class=\"btn btn-warning btn-xs\"><i class=\"fa fa-wrench\"></i> ";
            echo ($context["button_repair"] ?? null);
            echo "</a></div>
    </div>
    ";
        }
        // line 24
        echo "    ";
        if (($context["error_warning"] ?? null)) {
            // line 25
            echo "    <div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo ($context["error_warning"] ?? null);
            echo "
      <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
    </div>
    ";
        }
        // line 29
        echo "    <div class=\"panel panel-default\">
      <div class=\"panel-heading\">
        <h3 class=\"panel-title\"><i class=\"fa fa-pencil\"></i> ";
        // line 31
        echo ($context["text_edit"] ?? null);
        echo "</h3>
      </div>
      <div class=\"panel-body\">
        <form action=\"";
        // line 34
        echo ($context["action"] ?? null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-module\" class=\"form-horizontal\">
          
          <ul class=\"nav nav-tabs\">
            <li class=\"active\"><a href=\"#tab-general\" data-toggle=\"tab\">";
        // line 37
        echo ($context["tab_general"] ?? null);
        echo "</a></li>
            <li><a href=\"#tab-rules\" data-toggle=\"tab\">";
        // line 38
        echo ($context["tab_rules"] ?? null);
        echo "</a></li>
            <li><a href=\"#tab-analytics\" data-toggle=\"tab\"><i class=\"fa fa-bar-chart\"></i> Analytics Dashboard</a></li>
            <li><a href=\"#tab-manual\" data-toggle=\"tab\">";
        // line 40
        echo ($context["tab_manual"] ?? null);
        echo "</a></li>
            <li><a href=\"#tab-logs\" data-toggle=\"tab\">";
        // line 41
        echo ($context["tab_logs"] ?? null);
        echo "</a></li>
          </ul>

          <div class=\"tab-content\">
            <div class=\"tab-pane active\" id=\"tab-general\">
              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\" for=\"input-status\">";
        // line 47
        echo ($context["entry_status"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <select name=\"module_customer_segment_status\" id=\"input-status\" class=\"form-control\">
                    ";
        // line 50
        if (($context["module_customer_segment_status"] ?? null)) {
            // line 51
            echo "                    <option value=\"1\" selected=\"selected\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                    <option value=\"0\">";
            // line 52
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                    ";
        } else {
            // line 54
            echo "                    <option value=\"1\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                    <option value=\"0\" selected=\"selected\">";
            // line 55
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                    ";
        }
        // line 57
        echo "                  </select>
                </div>
              </div>
                <div id=\"firebase-connected-ui\" style=\"display: ";
        // line 60
        echo ((($context["module_customer_segment_firebase_project_id"] ?? null)) ? ("block") : ("none"));
        echo ";\">
                  <div class=\"alert alert-success\">
                    <i class=\"fa fa-check-circle\"></i> <span id=\"firebase-project-text\">";
        // line 62
        echo twig_replace_filter(($context["text_firebase_connected"] ?? null), ["%s" => ($context["module_customer_segment_firebase_project_id"] ?? null)]);
        echo "</span>
                    <button type=\"button\" id=\"button-disconnect-firebase\" class=\"btn btn-danger btn-xs pull-right\">";
        // line 63
        echo ($context["text_disconnect"] ?? null);
        echo "</button>
                  </div>
                </div>

                <div id=\"firebase-setup-ui\" style=\"display: ";
        // line 67
        echo ((($context["module_customer_segment_firebase_project_id"] ?? null)) ? ("none") : ("block"));
        echo ";\">
                  <div class=\"form-group\">
                    <label class=\"col-sm-2 control-label\" for=\"input-firebase-json\">";
        // line 69
        echo ($context["entry_firebase_json"] ?? null);
        echo "<br/><small style=\"font-weight:normal;\">(Paste or Upload File)</small></label>
                    <div class=\"col-sm-10\">
                      <div class=\"input-group\" style=\"margin-bottom: 10px;\">
                        <input type=\"text\" class=\"form-control\" id=\"input-firebase-filename\" readonly placeholder=\"No file selected\">
                        <span class=\"input-group-btn\">
                           <button class=\"btn btn-default\" type=\"button\" onclick=\"\$('#input-firebase-file').click();\"><i class=\"fa fa-upload\"></i> Browse JSON</button>
                        </span>
                      </div>
                      <input type=\"file\" id=\"input-firebase-file\" accept=\".json\" style=\"display:none;\" onchange=\"readFirebaseJsonFile(this);\">
                      <textarea name=\"module_customer_segment_firebase_json\" rows=\"8\" id=\"input-firebase-json\" class=\"form-control\" placeholder=\"Paste Service Account JSON here...\">";
        // line 78
        echo ($context["module_customer_segment_firebase_json"] ?? null);
        echo "</textarea>
                      <input type=\"hidden\" name=\"module_customer_segment_firebase_project_id\" value=\"";
        // line 79
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
            
            <div class=\"tab-pane\" id=\"tab-rules\">
              <div class=\"pull-right\" style=\"margin-bottom:10px;\">
                <button type=\"button\" onclick=\"bulkRebuild();\" id=\"button-bulk-rebuild\" class=\"btn btn-warning\"><i class=\"fa fa-refresh\"></i> Bulk Rebuild</button>
                <button type=\"button\" onclick=\"openTestModal();\" class=\"btn btn-info\"><i class=\"fa fa-stethoscope\"></i> Test Rule</button>
                <button type=\"button\" onclick=\"addRule();\" class=\"btn btn-primary\"><i class=\"fa fa-plus\"></i> ";
        // line 95
        echo ($context["text_add"] ?? null);
        echo "</button>
              </div>
              <div class=\"table-responsive\">
                <table class=\"table table-bordered table-hover\">
                  <thead>
                    <tr>
                      <td class=\"text-left\">";
        // line 101
        echo ($context["entry_name"] ?? null);
        echo "</td>
                      <td class=\"text-left\">";
        // line 102
        echo ($context["entry_priority"] ?? null);
        echo "</td>
                      <td class=\"text-left\">";
        // line 103
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

            <div class=\"tab-pane\" id=\"tab-analytics\">
               <div class=\"row\">
                 ";
        // line 116
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["analytics"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["stat"]) {
            // line 117
            echo "                 <div class=\"col-lg-3 col-md-3 col-sm-6\">
                   <div class=\"tile tile-primary\">
                     <div class=\"tile-heading\">";
            // line 119
            echo twig_get_attribute($this->env, $this->source, $context["stat"], "name", [], "any", false, false, false, 119);
            echo "</div>
                     <div class=\"tile-body\"><i class=\"fa fa-users\"></i> <h2 class=\"pull-right\">";
            // line 120
            echo twig_get_attribute($this->env, $this->source, $context["stat"], "total", [], "any", false, false, false, 120);
            echo "</h2></div>
                   </div>
                 </div>
                 ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['stat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 124
        echo "                 ";
        if ( !($context["analytics"] ?? null)) {
            // line 125
            echo "                   <div class=\"col-sm-12 text-center text-muted\"><p>No customers assigned to any tracking groups.</p></div>
                 ";
        }
        // line 127
        echo "               </div>
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
        // line 146
        echo ($context["entry_target_group"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                      <select name=\"manual_customer_group_id\" id=\"input-manual-group\" class=\"form-control\">
                         <option value=\"\">-- Select Group --</option>
                         ";
        // line 150
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
            // line 151
            echo "                         <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["group"], "customer_group_id", [], "any", false, false, false, 151);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["group"], "name", [], "any", false, false, false, 151);
            echo "</option>
                         ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 153
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
               <div class=\"well\">
                 <div class=\"row\">
                   <div class=\"col-sm-4\">
                     <div class=\"form-group\">
                       <label class=\"control-label\" for=\"input-log-customer-id\">Customer ID</label>
                       <input type=\"text\" name=\"filter_log_customer_id\" value=\"\" id=\"input-log-customer-id\" class=\"form-control\" />
                     </div>
                   </div>
                   <div class=\"col-sm-4\">
                     <div class=\"form-group\">
                       <label class=\"control-label\" for=\"input-log-new-group-id\">Assigned Group ID</label>
                       <input type=\"text\" name=\"filter_log_new_group_id\" value=\"\" id=\"input-log-new-group-id\" class=\"form-control\" />
                     </div>
                   </div>
                   <div class=\"col-sm-4\">
                     <button type=\"button\" id=\"button-filter-log\" class=\"btn btn-primary\" style=\"margin-top:25px;\"><i class=\"fa fa-filter\"></i> Filter</button>
                   </div>
                 </div>
               </div>
               <div class=\"table-responsive\">
                <table class=\"table table-bordered table-hover\">
                  <thead>
                    <tr>
                      <td class=\"text-left\">Date</td>
                      <td class=\"text-left\">Customer</td>
                      <td class=\"text-left\">Old Group</td>
                      <td class=\"text-left\">New Group</td>
                      <td class=\"text-left\">Rule Triggered</td>
                    </tr>
                  </thead>
                  <tbody id=\"dynamic-log-list\">
                  </tbody>
                </table>
               </div>
               <div class=\"row\">
                 <div class=\"col-sm-12 text-left\" id=\"dynamic-log-pagination\"></div>
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
        // line 233
        echo ($context["text_add"] ?? null);
        echo "</h4>
      </div>
      <div class=\"modal-body\">
        <form id=\"form-rule\" class=\"form-horizontal\">
           <input type=\"hidden\" name=\"rule_id\" id=\"rule-id\" value=\"\" />
           
           <div class=\"form-group required\">
             <label class=\"col-sm-3 control-label\">";
        // line 240
        echo ($context["entry_name"] ?? null);
        echo "</label>
             <div class=\"col-sm-9\">
               <input type=\"text\" name=\"name\" id=\"rule-name\" class=\"form-control\" />
             </div>
           </div>

           <div class=\"form-group\">
             <label class=\"col-sm-3 control-label\">";
        // line 247
        echo ($context["entry_target_group"] ?? null);
        echo "</label>
             <div class=\"col-sm-9\">
               <select name=\"target_group_id\" id=\"rule-target-group\" class=\"form-control\">
                 ";
        // line 250
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
            // line 251
            echo "                 <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["group"], "customer_group_id", [], "any", false, false, false, 251);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["group"], "name", [], "any", false, false, false, 251);
            echo "</option>
                 ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 253
        echo "               </select>
             </div>
           </div>

           <div class=\"form-group text-center\">
             <h5 style=\"background:#f5f5f5; padding:10px; border-bottom:1px solid #ddd;\">Requirements Builder (Dynamic)</h5>
           </div>

           <div class=\"form-group\">
             <div class=\"col-sm-12\">
               <input type=\"hidden\" name=\"conditions_json\" id=\"rule-conditions-json\" value=\"\" />
               <div id=\"rule-builder-container\"></div>
             </div>
           </div>

           <div class=\"form-group\">
             <label class=\"col-sm-3 control-label\">";
        // line 269
        echo ($context["entry_priority"] ?? null);
        echo "</label>
             <div class=\"col-sm-3\">
               <input type=\"number\" name=\"priority\" id=\"rule-priority\" class=\"form-control\" value=\"0\" />
             </div>
             <label class=\"col-sm-3 control-label\">";
        // line 273
        echo ($context["entry_status"] ?? null);
        echo "</label>
             <div class=\"col-sm-3\">
               <select name=\"status\" id=\"rule-status\" class=\"form-control\">
                 <option value=\"1\">";
        // line 276
        echo ($context["text_enabled"] ?? null);
        echo "</option>
                 <option value=\"0\">";
        // line 277
        echo ($context["text_disabled"] ?? null);
        echo "</option>
               </select>
             </div>
           </div>

           <hr/>
           <fieldset>
             <legend style=\"padding-left:15px; border-bottom:0;\">Firebase Actions</legend>
             ";
        // line 285
        if (($context["module_customer_segment_firebase_project_id"] ?? null)) {
            // line 286
            echo "             <div class=\"form-group\">
               <label class=\"col-sm-3 control-label\" for=\"action-notif-title\">Push Title</label>
               <div class=\"col-sm-9\">
                 <input type=\"text\" name=\"action_notif_title\" id=\"action-notif-title\" class=\"form-control\" placeholder=\"E.g. You have been upgraded!\" />
               </div>
             </div>
             <div class=\"form-group\">
               <label class=\"col-sm-3 control-label\" for=\"action-notif-body\">Push Body</label>
               <div class=\"col-sm-9\">
                 <input type=\"text\" name=\"action_notif_body\" id=\"action-notif-body\" class=\"form-control\" placeholder=\"E.g. Check out your new VIP benefits.\" />
               </div>
             </div>
             <div class=\"col-sm-9 col-sm-offset-3\">
                <span class=\"help-block\">If defined, a Firebase push notification is sent immediately when a user hits this rule. (Optional: Leave empty if you do not want to send a notification)</span>
             </div>
             ";
        } else {
            // line 302
            echo "             <div class=\"col-sm-12\">
                 <div class=\"alert alert-info\"><i class=\"fa fa-info-circle\"></i> Firebase is not connected. Please connect Firebase in the General Settings to enable push notifications.</div>
             </div>
             ";
        }
        // line 306
        echo "           </fieldset>
        </form>
      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
        <button type=\"button\" class=\"btn btn-primary\" onclick=\"serializeAndSaveRule();\">Save Rule</button>
      </div>
    </div>
  </div>
</div>

<!-- Test Rule Modal -->
<div class=\"modal fade\" id=\"modal-test\" tabindex=\"-1\" role=\"dialog\">
  <div class=\"modal-dialog\" role=\"document\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
        <h4 class=\"modal-title\">Rule Tester Preview</h4>
      </div>
      <div class=\"modal-body\">
         <div class=\"form-group\">
           <label>Select Rule</label>
           <select id=\"test-rule-id\" class=\"form-control\"></select>
         </div>
         <div class=\"form-group\">
           <label>Customer ID to test</label>
           <input type=\"text\" id=\"test-customer-id\" class=\"form-control\" placeholder=\"e.g. 1\" />
         </div>
         <button type=\"button\" class=\"btn btn-info btn-block\" onclick=\"runRuleTest();\">Test Evaluation</button>
         <hr>
         <div id=\"test-results-container\" style=\"display:none;\">
           <h4>Evaluation Trace</h4>
           <div class=\"well\" id=\"test-results-output\" style=\"max-height:300px; overflow-y:auto; font-family:monospace;\"></div>
         </div>
      </div>
    </div>
  </div>
</div>

<!-- Testing App Modal -->
<div class=\"modal fade\" id=\"modal-testing-app\" tabindex=\"-1\" role=\"dialog\">
  <div class=\"modal-dialog\" role=\"document\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
        <h4 class=\"modal-title\">Firebase Testing App</h4>
      </div>
      <div class=\"modal-body\">
         <form id=\"form-testing-app\" action=\"index.php?route=extension/module/customer_segment/openTestingApp&user_token=";
        // line 354
        echo ($context["user_token"] ?? null);
        echo "\" method=\"post\" target=\"_blank\" class=\"form-horizontal\">
           <div class=\"form-group required\">
             <label class=\"col-sm-3 control-label\">Customer</label>
             <div class=\"col-sm-9\">
               <input type=\"text\" name=\"testing_customer_search\" value=\"\" placeholder=\"Type customer name...\" id=\"input-testing-customer-search\" class=\"form-control\" required />
               <input type=\"hidden\" name=\"customer_id\" id=\"input-testing-customer-id\" value=\"\" required />
             </div>
           </div>
           <div class=\"form-group required\">
             <label class=\"col-sm-3 control-label\">Firebase Config</label>
             <div class=\"col-sm-9\">
               <textarea name=\"firebase_config\" rows=\"6\" class=\"form-control\" placeholder=\"const firebaseConfig = {&#10;  apiKey: '...',&#10;  projectId: '...'&#10;};\" required></textarea>
               <small class=\"help-block\">Paste the Firebase Client Config snippet here.</small>
             </div>
           </div>
           <div class=\"form-group required\">
             <label class=\"col-sm-3 control-label\">VAPID Key</label>
             <div class=\"col-sm-9\">
               <input type=\"text\" name=\"vapid_key\" class=\"form-control\" placeholder=\"B... (Public Key)\" required />
               <small class=\"help-block\">Paste the Web Push Public Certificate (VAPID Key).</small>
             </div>
           </div>
         </form>
      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
        <button type=\"button\" class=\"btn btn-primary\" onclick=\"if(\$('#input-testing-customer-id').val() != '') { \$('#form-testing-app').submit(); } else { alert('Please select a customer first.'); }\">Open Testing App</button>
      </div>
    </div>
  </div>
</div>

<script type=\"text/javascript\"><!--
function readFirebaseJsonFile(input) {
    if (input.files && input.files[0]) {
        var file = input.files[0];
        \$('#input-firebase-filename').val(file.name);
        var reader = new FileReader();
        reader.onload = function(e) {
            \$('#input-firebase-json').val(e.target.result);
        };
        reader.readAsText(file);
        
        // Optionally reset file inputs so the same file could be loaded again if needed
        input.value = '';
    }
}

\$(document).ready(function() {
    loadRules();
});

function loadRules() {
    \$.ajax({
        url: 'index.php?route=extension/module/customer_segment/getRules&user_token=";
        // line 408
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
        // line 425
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
    \$('#rule-conditions-json').val('');
    \$('#action-notif-title').val('');
    \$('#action-notif-body').val('');
    renderBuilder({ type: 'group', logic: 'AND', conditions: [] });
    \$('#rule-modal-title').text('";
        // line 439
        echo ($context["text_add"] ?? null);
        echo "');
    \$('#modal-rule').modal('show');
}

function saveRule() {
    \$.ajax({
        url: 'index.php?route=extension/module/customer_segment/saveRule&user_token=";
        // line 445
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
        // line 464
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
        // line 473
        echo ($context["user_token"] ?? null);
        echo "&rule_id=' + rule_id,
                    dataType: 'json',
                    success: function(json) {
                        \$('#rule-id').val(json['rule_id']);
                        \$('#rule-name').val(json['name']);
                        \$('#rule-target-group').val(json['target_group_id']);
                        \$('#rule-priority').val(json['priority']);
                        \$('#rule-status').val(json['status']);
                        
                        \$('#action-notif-title').val('');
                        \$('#action-notif-body').val('');

                        if (json['actions_json']) {
                            try {
                                var act = JSON.parse(json['actions_json']);
                                if (act['notification']) {
                                    \$('#action-notif-title').val(act['notification']['title'] || '');
                                    \$('#action-notif-body').val(act['notification']['body'] || '');
                                }
                            } catch(e) {}
                        }

                        var conditions = { type: 'group', logic: 'AND', conditions: [] };
                        if (json['conditions_json']) {
                            try { conditions = JSON.parse(json['conditions_json']); } catch(e){}
                        }
                        renderBuilder(conditions);
                        
                        \$('#rule-modal-title').text('";
        // line 501
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
        // line 513
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
        // line 526
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
        // line 559
        echo ($context["text_confirm_disconnect"] ?? null);
        echo "')) {
\t\t\$.ajax({
\t\t\turl: 'index.php?route=extension/module/customer_segment/disconnectFirebase&user_token=";
        // line 561
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
        // line 587
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
        // line 603
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
        // line 612
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
        // line 638
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
        // line 651
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

// Autocomplete for testing app modal customer search
\$('input[name=\\'testing_customer_search\\']').autocomplete({
\t'source': function(request, response) {
\t\t\$.ajax({
\t\t\turl: 'index.php?route=extension/module/customer_segment/autocomplete&user_token=";
        // line 673
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
\t\t\$('input[name=\\'testing_customer_search\\']').val(item['label']);
\t\t\$('input[name=\\'customer_id\\']').val(item['value']);
\t}
});

// Dynamic Rule Builder
var conditionFields = [
    { value: 'spend_total', label: 'Spend Total' },
    { value: 'order_count', label: 'Order Count' },
    { value: 'last_order_days_ago', label: 'Last Order (Days Ago)' },
    { value: 'inactive_days', label: 'Inactive Days' },
    { value: 'has_category', label: 'Has Ordered Category ID' },
    { value: 'has_product', label: 'Has Ordered Product ID' },
    { value: 'has_coupon', label: 'Has Used Coupon Code' },
    { value: 'country_id', label: 'Country ID' },
    { value: 'zone_id', label: 'Zone ID' }
];

function renderBuilder(conditions) {
    var \$container = \$('#rule-builder-container');
    \$container.empty();
    if (!conditions || !conditions.type) {
        conditions = { type: 'group', logic: 'AND', conditions: [] };
    }
    \$container.append(buildGroupHTML(conditions));
}

function buildGroupHTML(groupNode) {
    var \$group = \$('<div class=\"condition-group\" style=\"border:1px solid #ccc; padding:10px; margin-bottom:10px; background:#fefefe; border-radius:4px;\"></div>');
    var \$header = \$('<div class=\"group-header\" style=\"margin-bottom:10px;\"></div>');
    var \$logicSelect = \$('<select class=\"form-control\" style=\"display:inline-block; width:100px; margin-right:10px;\"><option value=\"AND\">AND</option><option value=\"OR\">OR</option></select>');
    \$logicSelect.val(groupNode.logic || 'AND');
    
    var \$addCondBtn = \$('<button type=\"button\" class=\"btn btn-info btn-xs\" style=\"margin-right:5px;\"><i class=\"fa fa-plus\"></i> Condition</button>');
    var \$addGroupBtn = \$('<button type=\"button\" class=\"btn btn-default btn-xs\" style=\"margin-right:5px;\"><i class=\"fa fa-plus\"></i> Sub-group</button>');
    var \$removeBtn = \$('<button type=\"button\" class=\"btn btn-danger btn-xs pull-right\"><i class=\"fa fa-trash\"></i></button>');
    
    \$header.append(\$logicSelect).append(\$addCondBtn).append(\$addGroupBtn).append(\$removeBtn);
    \$group.append(\$header);
    
    var \$body = \$('<div class=\"group-body\" style=\"padding-left:20px; border-left:2px solid #ddd;\"></div>');
    if (groupNode.conditions && groupNode.conditions.length > 0) {
        groupNode.conditions.forEach(function(c) {
            if (c.type === 'group') {
                \$body.append(buildGroupHTML(c));
            } else {
                \$body.append(buildConditionHTML(c));
            }
        });
    }
    \$group.append(\$body);
    
    \$addCondBtn.click(function(){
        \$body.append(buildConditionHTML({ type: 'condition', field: 'spend_total', operator: '>=', value: '' }));
    });
    \$addGroupBtn.click(function(){
        \$body.append(buildGroupHTML({ type: 'group', logic: 'AND', conditions: [] }));
    });
    \$removeBtn.click(function(){
        \$group.remove();
    });
    
    return \$group;
}

function buildConditionHTML(condNode) {
    var \$cond = \$('<div class=\"condition-row\" style=\"margin-bottom:5px;\"></div>');
    
    var \$fieldSel = \$('<select class=\"form-control condition-field\" style=\"display:inline-block; width:200px; margin-right:5px;\"></select>');
    conditionFields.forEach(function(f){
        \$fieldSel.append('<option value=\"'+f.value+'\">'+f.label+'</option>');
    });
    \$fieldSel.val(condNode.field || 'spend_total');
    
    var \$opSel = \$('<select class=\"form-control condition-operator\" style=\"display:inline-block; width:80px; margin-right:5px;\"><option value=\"==\">==</option><option value=\"!=\">!=</option><option value=\">\">&gt;</option><option value=\">=\">&gt;=</option><option value=\"<\">&lt;</option><option value=\"<=\">&lt;=</option></select>');
    \$opSel.val(condNode.operator || '>=');
    
    var \$valInput = \$('<input type=\"text\" class=\"form-control condition-value\" style=\"display:inline-block; width:200px; margin-right:5px;\" />');
    \$valInput.val(condNode.value || '');
    
    var \$removeBtn = \$('<button type=\"button\" class=\"btn btn-danger btn-xs\"><i class=\"fa fa-minus\"></i></button>');
    
    \$cond.append(\$fieldSel).append(\$opSel).append(\$valInput).append(\$removeBtn);
    
    \$removeBtn.click(function(){
        \$cond.remove();
    });
    
    return \$cond;
}

function extractGroupData(\$group) {
    var data = { type: 'group', logic: \$group.find('> .group-header select').val(), conditions: [] };
    \$group.find('> .group-body > div').each(function(){
        var \$child = \$(this);
        if (\$child.hasClass('condition-group')) {
            data.conditions.push(extractGroupData(\$child));
        } else if (\$child.hasClass('condition-row')) {
            data.conditions.push({
                type: 'condition',
                field: \$child.find('.condition-field').val(),
                operator: \$child.find('.condition-operator').val(),
                value: \$child.find('.condition-value').val()
            });
        }
    });
    return data;
}

function serializeAndSaveRule() {
    var \$rootGroup = \$('#rule-builder-container > .condition-group');
    if (\$rootGroup.length > 0) {
        var rootData = extractGroupData(\$rootGroup.first());
        \$('#rule-conditions-json').val(JSON.stringify(rootData));
    } else {
        \$('#rule-conditions-json').val('[]');
    }

    var actions = {};
    var notifTitle = \$('#action-notif-title').val();
    var notifBody = \$('#action-notif-body').val();
    if (notifTitle) {
        actions.notification = { title: notifTitle, body: notifBody };
    }
    
    // Append dynamically to the post data by creating a hidden input
    \$('#rule-actions-json').remove();
    \$('<input>').attr({
        type: 'hidden',
        id: 'rule-actions-json',
        name: 'actions_json'
    }).val(JSON.stringify(actions)).appendTo('#form-rule');

    saveRule();
}

function bulkRebuild(start) {
    if (typeof start === 'undefined') start = 0;
    if (start === 0 && !confirm('This will trigger a bulk evaluation of all customers based on active rules. This might take a while on large stores. Continue?')) {
        return;
    }
    if (start === 0) \$('#button-bulk-rebuild').button('loading');
    
    \$.ajax({
        url: 'index.php?route=extension/module/customer_segment/bulkRebuild&user_token=";
        // line 830
        echo ($context["user_token"] ?? null);
        echo "&start=' + start,
        dataType: 'json',
        success: function(json) {
            if (json['error']) {
                \$('#button-bulk-rebuild').button('reset');
                alert(json['error']);
            }
            if (json['done']) {
                \$('#button-bulk-rebuild').button('reset');
                alert(json['success']);
            } else if (json['next']) {
                \$('#button-bulk-rebuild').text(json['success']);
                bulkRebuild(json['next']);
            }
        }
    });
}

function loadDynamicLogs(page) {
    var filter_customer_id = \$('#input-log-customer-id').val();
    var filter_new_group_id = \$('#input-log-new-group-id').val();
    if (typeof page === 'undefined') page = 1;

    \$.ajax({
        url: 'index.php?route=extension/module/customer_segment/getDynamicLogs&user_token=";
        // line 854
        echo ($context["user_token"] ?? null);
        echo "&page=' + page + '&filter_customer_id=' + filter_customer_id + '&filter_new_group_id=' + filter_new_group_id,
        dataType: 'json',
        success: function(json) {
            var html = '';
            if (json['logs'] && json['logs'].length > 0) {
                for (var i = 0; i < json['logs'].length; i++) {
                    var log = json['logs'][i];
                    html += '<tr>';
                    html += '  <td class=\"text-left\">' + log['date_added'] + '</td>';
                    html += '  <td class=\"text-left\">' + log['customer'] + '</td>';
                    html += '  <td class=\"text-left\">' + log['old_group'] + '</td>';
                    html += '  <td class=\"text-left\">' + log['new_group'] + '</td>';
                    html += '  <td class=\"text-left\">' + (log['rule_id'] ? 'Rule ID: ' + log['rule_id'] : 'Manual/Cron') + '</td>';
                    html += '</tr>';
                }
            } else {
                html = '<tr><td class=\"text-center\" colspan=\"5\">No results!</td></tr>';
            }
            \$('#dynamic-log-list').html(html);

            var totalPages = Math.ceil(json['total'] / 20);
            var pagHtml = '<ul class=\"pagination\">';
            for (var p = 1; p <= totalPages; p++) {
                pagHtml += '<li class=\"' + (p == page ? 'active' : '') + '\"><a href=\"#\" onclick=\"event.preventDefault(); loadDynamicLogs(' + p + ');\">' + p + '</a></li>';
            }
            pagHtml += '</ul>';
            \$('#dynamic-log-pagination').html(pagHtml);
        }
    });
}

\$('#button-filter-log').on('click', function() {
    loadDynamicLogs(1);
});

// ensure loadDynamicLogs runs on document ready
\$(document).ready(function() {
    loadDynamicLogs(1);
});

function openTestModal() {
    \$.ajax({
        url: 'index.php?route=extension/module/customer_segment/getRules&user_token=";
        // line 896
        echo ($context["user_token"] ?? null);
        echo "',
        dataType: 'json',
        success: function(json) {
            var html = '';
            for (var i = 0; i < json.length; i++) {
                html += '<option value=\"' + json[i]['rule_id'] + '\">' + json[i]['name'] + '</option>';
            }
            \$('#test-rule-id').html(html);
            \$('#test-results-container').hide();
            \$('#modal-test').modal('show');
        }
    });
}

function runRuleTest() {
    var rule_id = \$('#test-rule-id').val();
    var customer_id = \$('#test-customer-id').val();
    if (!customer_id) { alert('Enter Customer ID'); return; }
    
    \$.ajax({
        url: 'index.php?route=extension/module/customer_segment/testRule&user_token=";
        // line 916
        echo ($context["user_token"] ?? null);
        echo "',
        type: 'post',
        data: { rule_id: rule_id, customer_id: customer_id },
        dataType: 'json',
        success: function(json) {
            \$('#test-results-container').show();
            if (json['error']) {
                \$('#test-results-output').html('<span class=\"text-danger\">' + json['error'] + '</span>');
            } else {
                var outHtml = json['match'] ? '<span class=\"label label-success\">MATCH - Segment Condition Passed</span><hr>' : '<span class=\"label label-danger\">NO MATCH</span><hr>';
                if (json['trace']) {
                    outHtml += json['trace'].join('<br>');
                }
                \$('#test-results-output').html(outHtml);
            }
        }
    });
}
//--></script>
";
        // line 935
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
        return array (  1234 => 935,  1212 => 916,  1189 => 896,  1144 => 854,  1117 => 830,  957 => 673,  932 => 651,  916 => 638,  887 => 612,  875 => 603,  856 => 587,  827 => 561,  822 => 559,  786 => 526,  770 => 513,  755 => 501,  724 => 473,  712 => 464,  690 => 445,  681 => 439,  664 => 425,  644 => 408,  587 => 354,  537 => 306,  531 => 302,  513 => 286,  511 => 285,  500 => 277,  496 => 276,  490 => 273,  483 => 269,  465 => 253,  454 => 251,  450 => 250,  444 => 247,  434 => 240,  424 => 233,  342 => 153,  331 => 151,  327 => 150,  320 => 146,  299 => 127,  295 => 125,  292 => 124,  282 => 120,  278 => 119,  274 => 117,  270 => 116,  254 => 103,  250 => 102,  246 => 101,  237 => 95,  218 => 79,  214 => 78,  202 => 69,  197 => 67,  190 => 63,  186 => 62,  181 => 60,  176 => 57,  171 => 55,  166 => 54,  161 => 52,  156 => 51,  154 => 50,  148 => 47,  139 => 41,  135 => 40,  130 => 38,  126 => 37,  120 => 34,  114 => 31,  110 => 29,  102 => 25,  99 => 24,  91 => 21,  86 => 20,  84 => 19,  77 => 14,  66 => 12,  62 => 11,  57 => 9,  51 => 8,  47 => 7,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "extension/module/customer_segment.twig", "");
    }
}
