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
class __TwigTemplate_97ad8690abc2c0845f81696e3348fb970b28599a9edaa14f45911c4cd923b392 extends \Twig\Template
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
            <li><a href=\"#tab-analytics\" data-toggle=\"tab\"><i class=\"fa fa-bar-chart\"></i> Analytics Dashboard</a></li>
            <li><a href=\"#tab-manual\" data-toggle=\"tab\">";
        // line 39
        echo ($context["tab_manual"] ?? null);
        echo "</a></li>
            <li><a href=\"#tab-logs\" data-toggle=\"tab\">";
        // line 40
        echo ($context["tab_logs"] ?? null);
        echo "</a></li>
            <li><a href=\"#tab-banners\" data-toggle=\"tab\"><i class=\"fa fa-image\"></i> Banners</a></li>
            <li><a href=\"#tab-sliders\" data-toggle=\"tab\"><i class=\"fa fa-sliders\"></i> Sliders</a></li>
            <li><a href=\"#tab-promotions\" data-toggle=\"tab\"><i class=\"fa fa-tag\"></i> Promotions</a></li>
          </ul>

          <div class=\"tab-content\">
            <div class=\"tab-pane active\" id=\"tab-general\">
              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\" for=\"input-status\">";
        // line 49
        echo ($context["entry_status"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <select name=\"module_customer_segment_status\" id=\"input-status\" class=\"form-control\">
                    ";
        // line 52
        if (($context["module_customer_segment_status"] ?? null)) {
            // line 53
            echo "                    <option value=\"1\" selected=\"selected\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                    <option value=\"0\">";
            // line 54
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                    ";
        } else {
            // line 56
            echo "                    <option value=\"1\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                    <option value=\"0\" selected=\"selected\">";
            // line 57
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                    ";
        }
        // line 59
        echo "                  </select>
                </div>
              </div>
                <div id=\"firebase-connected-ui\" class=\"form-group\" style=\"display: ";
        // line 62
        echo ((($context["module_customer_segment_firebase_project_id"] ?? null)) ? ("block") : ("none"));
        echo ";\">
                  <label class=\"col-sm-2 control-label\">";
        // line 63
        echo ($context["entry_firebase"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div class=\"alert alert-success\" style=\"margin-bottom: 0;\">
                      <i class=\"fa fa-check-circle\"></i> <span id=\"firebase-project-text\">";
        // line 66
        echo twig_replace_filter(($context["text_firebase_connected"] ?? null), ["%s" => ($context["module_customer_segment_firebase_project_id"] ?? null)]);
        echo "</span>
                      <button type=\"button\" id=\"button-disconnect-firebase\" class=\"btn btn-danger btn-xs pull-right\">";
        // line 67
        echo ($context["text_disconnect"] ?? null);
        echo "</button>
                      <button type=\"button\" class=\"btn btn-info btn-xs pull-right\" data-toggle=\"modal\" data-target=\"#modal-testing-app\" style=\"margin-right: 10px;\"><i class=\"fa fa-mobile\"></i> View Mock Notifications App</button>
                    </div>
                  </div>
                </div>

                <div id=\"firebase-setup-ui\" style=\"display: ";
        // line 73
        echo ((($context["module_customer_segment_firebase_project_id"] ?? null)) ? ("none") : ("block"));
        echo ";\">
                  <div class=\"form-group\">
                    <label class=\"col-sm-2 control-label\" for=\"input-firebase-json\">";
        // line 75
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
        // line 84
        echo ($context["module_customer_segment_firebase_json"] ?? null);
        echo "</textarea>
                      <input type=\"hidden\" name=\"module_customer_segment_firebase_project_id\" value=\"";
        // line 85
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
              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\" for=\"input-cron-key\">Cron Secret Key</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"module_customer_segment_cron_key\" id=\"input-cron-key\" value=\"";
        // line 98
        echo ($context["module_customer_segment_cron_key"] ?? null);
        echo "\" class=\"form-control\" placeholder=\"Set a secret key to secure the cron URL\" />
                  <div class=\"help-block\">
                    Cron URL: <code>";
        // line 100
        echo ($context["store_url"] ?? null);
        echo "index.php?route=extension/module/customer_segment/cron&amp;key=YOUR_KEY</code>
                  </div>
                </div>
              </div>
              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\" for=\"input-cron-interval\">Cron Interval</label>
                <div class=\"col-sm-10\">
                  <select name=\"module_customer_segment_cron_interval\" id=\"input-cron-interval\" class=\"form-control\">
                    <option value=\"daily\" ";
        // line 108
        if ((($context["module_customer_segment_cron_interval"] ?? null) == "daily")) {
            echo "selected";
        }
        echo ">Daily (Recommended)</option>
                    <option value=\"hourly\" ";
        // line 109
        if ((($context["module_customer_segment_cron_interval"] ?? null) == "hourly")) {
            echo "selected";
        }
        echo ">Hourly</option>
                    <option value=\"weekly\" ";
        // line 110
        if ((($context["module_customer_segment_cron_interval"] ?? null) == "weekly")) {
            echo "selected";
        }
        echo ">Weekly</option>
                  </select>
                  <div class=\"help-block\">Add the Cron URL to your server cron job at this frequency.</div>
                </div>
              </div>
              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\" for=\"input-reset-day\">Monthly Reset Day</label>
                <div class=\"col-sm-10\">
                  <select name=\"module_customer_segment_reset_day\" id=\"input-reset-day\" class=\"form-control\">
                    ";
        // line 119
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 28));
        foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
            // line 120
            echo "                    <option value=\"";
            echo $context["d"];
            echo "\" ";
            if ((($context["module_customer_segment_reset_day"] ?? null) == $context["d"])) {
                echo "selected";
            }
            echo ">";
            echo $context["d"];
            echo "</option>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 122
        echo "                  </select>
                  <div class=\"help-block\">On this day each month, Calendar Month-based rules will reset for their windows.</div>
                </div>
              </div>
            </div>
            
            <div class=\"tab-pane\" id=\"tab-rules\">
              <div class=\"text-right\" style=\"margin-bottom: 15px;\">
                <button type=\"button\" onclick=\"bulkRebuild();\" id=\"button-bulk-rebuild\" class=\"btn btn-warning\"><i class=\"fa fa-refresh\"></i> Bulk Rebuild</button>
                <button type=\"button\" onclick=\"openTestModal();\" class=\"btn btn-info\"><i class=\"fa fa-stethoscope\"></i> Test Rule</button>
                <button type=\"button\" onclick=\"addRule();\" class=\"btn btn-primary\"><i class=\"fa fa-plus\"></i> ";
        // line 132
        echo ($context["text_add"] ?? null);
        echo "</button>
              </div>
              <div class=\"table-responsive\">
                <table class=\"table table-bordered table-hover\">
                  <thead>
                    <tr>
                      <td class=\"text-left\">";
        // line 138
        echo ($context["entry_name"] ?? null);
        echo "</td>
                      <td class=\"text-left\">";
        // line 139
        echo ($context["entry_priority"] ?? null);
        echo "</td>
                      <td class=\"text-left\">";
        // line 140
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
        // line 153
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["analytics"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["stat"]) {
            // line 154
            echo "                 <div class=\"col-lg-3 col-md-3 col-sm-6\">
                   <div class=\"tile tile-primary\">
                     <div class=\"tile-heading\">";
            // line 156
            echo twig_get_attribute($this->env, $this->source, $context["stat"], "name", [], "any", false, false, false, 156);
            echo "</div>
                     <div class=\"tile-body\"><i class=\"fa fa-users\"></i> <h2 class=\"pull-right\">";
            // line 157
            echo twig_get_attribute($this->env, $this->source, $context["stat"], "total", [], "any", false, false, false, 157);
            echo "</h2></div>
                   </div>
                 </div>
                 ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['stat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 161
        echo "                 ";
        if ( !($context["analytics"] ?? null)) {
            // line 162
            echo "                   <div class=\"col-sm-12 text-center text-muted\"><p>No customers assigned to any tracking groups.</p></div>
                 ";
        }
        // line 164
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
        // line 183
        echo ($context["entry_target_group"] ?? null);
        echo "</label>
                    <div class=\"col-sm-10\">
                      <select name=\"manual_customer_group_id\" id=\"input-manual-group\" class=\"form-control\">
                         <option value=\"\">-- Select Group --</option>
                         ";
        // line 187
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
            // line 188
            echo "                         <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["group"], "customer_group_id", [], "any", false, false, false, 188);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["group"], "name", [], "any", false, false, false, 188);
            echo "</option>
                         ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 190
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

            <!-- ===== BANNERS TAB ===== -->
            <div class=\"tab-pane\" id=\"tab-banners\">
              <div class=\"well\" style=\"margin-top:10px;\">
                <div class=\"row\">
                  <div class=\"col-sm-4\">
                    <label class=\"control-label\">Filter by Group</label>
                    <select id=\"filter-banner-group\" class=\"form-control\">
                      <option value=\"0\">All Groups</option>
                      ";
        // line 266
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
            // line 267
            echo "                      <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["group"], "customer_group_id", [], "any", false, false, false, 267);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["group"], "name", [], "any", false, false, false, 267);
            echo "</option>
                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 269
        echo "                    </select>
                  </div>
                  <div class=\"col-sm-4\"><button type=\"button\" id=\"btn-filter-banners\" class=\"btn btn-primary\" style=\"margin-top:25px;\"><i class=\"fa fa-filter\"></i> Filter</button></div>
                  <div class=\"col-sm-4 text-right\"><button type=\"button\" onclick=\"openBannerModal(0);\" class=\"btn btn-primary\" style=\"margin-top:25px;\"><i class=\"fa fa-plus\"></i> Add Banner</button></div>
                </div>
              </div>
              <div class=\"table-responsive\">
                <table class=\"table table-bordered table-hover\">
                  <thead><tr><td>ID</td><td>Group</td><td>Title</td><td>Image</td><td>Link</td><td>Status</td><td class=\"text-right\">Action</td></tr></thead>
                  <tbody id=\"banner-list\"></tbody>
                </table>
              </div>
            </div>

            <!-- ===== SLIDERS TAB ===== -->
            <div class=\"tab-pane\" id=\"tab-sliders\">
              <div class=\"well\" style=\"margin-top:10px;\">
                <div class=\"row\">
                  <div class=\"col-sm-4\">
                    <label class=\"control-label\">Filter by Group</label>
                    <select id=\"filter-slider-group\" class=\"form-control\">
                      <option value=\"0\">All Groups</option>
                      ";
        // line 291
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
            // line 292
            echo "                      <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["group"], "customer_group_id", [], "any", false, false, false, 292);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["group"], "name", [], "any", false, false, false, 292);
            echo "</option>
                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 294
        echo "                    </select>
                  </div>
                  <div class=\"col-sm-4\"><button type=\"button\" id=\"btn-filter-sliders\" class=\"btn btn-primary\" style=\"margin-top:25px;\"><i class=\"fa fa-filter\"></i> Filter</button></div>
                  <div class=\"col-sm-4 text-right\"><button type=\"button\" onclick=\"openSliderModal(0);\" class=\"btn btn-primary\" style=\"margin-top:25px;\"><i class=\"fa fa-plus\"></i> Add Slider</button></div>
                </div>
              </div>
              <div class=\"table-responsive\">
                <table class=\"table table-bordered table-hover\">
                  <thead><tr><td>ID</td><td>Group</td><td>Name</td><td>Product IDs</td><td>Status</td><td class=\"text-right\">Action</td></tr></thead>
                  <tbody id=\"slider-list\"></tbody>
                </table>
              </div>
            </div>

            <!-- ===== PROMOTIONS TAB ===== -->
            <div class=\"tab-pane\" id=\"tab-promotions\">
              <div class=\"well\" style=\"margin-top:10px;\">
                <div class=\"row\">
                  <div class=\"col-sm-4\">
                    <label class=\"control-label\">Filter by Group</label>
                    <select id=\"filter-promo-group\" class=\"form-control\">
                      <option value=\"0\">All Groups</option>
                      ";
        // line 316
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
            // line 317
            echo "                      <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["group"], "customer_group_id", [], "any", false, false, false, 317);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["group"], "name", [], "any", false, false, false, 317);
            echo "</option>
                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 319
        echo "                    </select>
                  </div>
                  <div class=\"col-sm-4\"><button type=\"button\" id=\"btn-filter-promos\" class=\"btn btn-primary\" style=\"margin-top:25px;\"><i class=\"fa fa-filter\"></i> Filter</button></div>
                  <div class=\"col-sm-4 text-right\"><button type=\"button\" onclick=\"openPromoModal(0);\" class=\"btn btn-primary\" style=\"margin-top:25px;\"><i class=\"fa fa-plus\"></i> Add Promotion</button></div>
                </div>
              </div>
              <div class=\"table-responsive\">
                <table class=\"table table-bordered table-hover\">
                  <thead><tr><td>ID</td><td>Group</td><td>Title</td><td>Coupon Code</td><td>Status</td><td class=\"text-right\">Action</td></tr></thead>
                  <tbody id=\"promo-list\"></tbody>
                </table>
              </div>
            </div>

          </div>
        </form>

      </div>
    </div>
  </div>
</div>

<!-- Banner Modal -->
<div class=\"modal fade\" id=\"modal-banner\" tabindex=\"-1\" role=\"dialog\">
  <div class=\"modal-dialog\" role=\"document\"><div class=\"modal-content\">
    <div class=\"modal-header\"><button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button><h4 class=\"modal-title\">Banner</h4></div>
    <div class=\"modal-body\">
      <form id=\"form-banner\" class=\"form-horizontal\">
        <input type=\"hidden\" id=\"banner-id\" name=\"banner_id\" value=\"\" />
        <div class=\"form-group\"><label class=\"col-sm-3 control-label\">Group</label><div class=\"col-sm-9\"><select name=\"customer_group_id\" id=\"banner-group\" class=\"form-control\">";
        // line 348
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
            echo "<option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["group"], "customer_group_id", [], "any", false, false, false, 348);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["group"], "name", [], "any", false, false, false, 348);
            echo "</option>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "</select></div></div>
        <div class=\"form-group\"><label class=\"col-sm-3 control-label\">Title</label><div class=\"col-sm-9\"><input type=\"text\" name=\"title\" id=\"banner-title\" class=\"form-control\" /></div></div>
        <div class=\"form-group\">
          <label class=\"col-sm-3 control-label\">Banner Image<br/><small class=\"text-muted\">Recommended: 1140x380 px</small></label>
          <div class=\"col-sm-9\">
            <a href=\"\" id=\"thumb-banner-image\" data-toggle=\"image\" class=\"img-thumbnail\"><img src=\"";
        // line 353
        echo ($context["placeholder"] ?? null);
        echo "\" alt=\"\" title=\"\" data-placeholder=\"";
        echo ($context["placeholder"] ?? null);
        echo "\" /></a>
            <input type=\"hidden\" name=\"image\" value=\"\" id=\"input-banner-image\" />
          </div>
        </div>
        <div class=\"form-group\"><label class=\"col-sm-3 control-label\">Link URL</label><div class=\"col-sm-9\"><input type=\"text\" name=\"link\" id=\"banner-link\" class=\"form-control\" /></div></div>
        <div class=\"form-group\"><label class=\"col-sm-3 control-label\">Status</label><div class=\"col-sm-9\"><select name=\"status\" id=\"banner-status\" class=\"form-control\"><option value=\"1\">Enabled</option><option value=\"0\">Disabled</option></select></div></div>
      </form>
    </div>
    <div class=\"modal-footer\"><button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button><button type=\"button\" class=\"btn btn-primary\" onclick=\"saveBanner();\">Save</button></div>
  </div></div>
</div>

<!-- Slider Modal -->
<div class=\"modal fade\" id=\"modal-slider\" tabindex=\"-1\" role=\"dialog\">
  <div class=\"modal-dialog\" role=\"document\"><div class=\"modal-content\">
    <div class=\"modal-header\"><button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button><h4 class=\"modal-title\">Product Slider</h4></div>
    <div class=\"modal-body\">
      <form id=\"form-slider\" class=\"form-horizontal\">
        <input type=\"hidden\" id=\"slider-id\" name=\"slider_id\" value=\"\" />
        <div class=\"form-group\"><label class=\"col-sm-3 control-label\">Group</label><div class=\"col-sm-9\"><select name=\"customer_group_id\" id=\"slider-group\" class=\"form-control\">";
        // line 372
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
            echo "<option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["group"], "customer_group_id", [], "any", false, false, false, 372);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["group"], "name", [], "any", false, false, false, 372);
            echo "</option>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "</select></div></div>
        <div class=\"form-group\"><label class=\"col-sm-3 control-label\">Name</label><div class=\"col-sm-9\"><input type=\"text\" name=\"name\" id=\"slider-name\" class=\"form-control\" /></div></div>
        <div class=\"form-group\">
          <label class=\"col-sm-3 control-label\">Products</label>
          <div class=\"col-sm-9\">
            <input type=\"text\" name=\"product_name\" value=\"\" placeholder=\"Search products...\" id=\"input-slider-product\" class=\"form-control\" />
            <div id=\"slider-product-list\" class=\"well well-sm\" style=\"height: 150px; overflow: auto; margin-top:10px;\">
            </div>
            <input type=\"hidden\" name=\"product_ids\" value=\"\" id=\"slider-product-ids\" />
          </div>
        </div>
        <div class=\"form-group\"><label class=\"col-sm-3 control-label\">Status</label><div class=\"col-sm-9\"><select name=\"status\" id=\"slider-status\" class=\"form-control\"><option value=\"1\">Enabled</option><option value=\"0\">Disabled</option></select></div></div>
      </form>
    </div>
    <div class=\"modal-footer\"><button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button><button type=\"button\" class=\"btn btn-primary\" onclick=\"saveSlider();\">Save</button></div>
  </div></div>
</div>

<!-- Promotion Modal -->
<div class=\"modal fade\" id=\"modal-promo\" tabindex=\"-1\" role=\"dialog\">
  <div class=\"modal-dialog\" role=\"document\"><div class=\"modal-content\">
    <div class=\"modal-header\"><button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button><h4 class=\"modal-title\">Promotion</h4></div>
    <div class=\"modal-body\">
      <form id=\"form-promo\" class=\"form-horizontal\">
        <input type=\"hidden\" id=\"promo-id\" name=\"promotion_id\" value=\"\" />
        <div class=\"form-group\"><label class=\"col-sm-3 control-label\">Group</label><div class=\"col-sm-9\"><select name=\"customer_group_id\" id=\"promo-group\" class=\"form-control\">";
        // line 397
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
            echo "<option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["group"], "customer_group_id", [], "any", false, false, false, 397);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["group"], "name", [], "any", false, false, false, 397);
            echo "</option>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo "</select></div></div>
        <div class=\"form-group\"><label class=\"col-sm-3 control-label\">Title</label><div class=\"col-sm-9\"><input type=\"text\" name=\"title\" id=\"promo-title\" class=\"form-control\" /></div></div>
        <div class=\"form-group\"><label class=\"col-sm-3 control-label\">Description</label><div class=\"col-sm-9\"><textarea name=\"description\" id=\"promo-desc\" class=\"form-control\" rows=\"3\"></textarea></div></div>
        <div class=\"form-group\"><label class=\"col-sm-3 control-label\">Coupon Code</label><div class=\"col-sm-9\"><input type=\"text\" name=\"code\" id=\"promo-code\" class=\"form-control\" /></div></div>
        <div class=\"form-group\"><label class=\"col-sm-3 control-label\">Status</label><div class=\"col-sm-9\"><select name=\"status\" id=\"promo-status\" class=\"form-control\"><option value=\"1\">Enabled</option><option value=\"0\">Disabled</option></select></div></div>
      </form>
    </div>
    <div class=\"modal-footer\"><button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button><button type=\"button\" class=\"btn btn-primary\" onclick=\"savePromo();\">Save</button></div>
  </div></div>
</div>

<!-- Rule Modal -->
<div class=\"modal fade\" id=\"modal-rule\" tabindex=\"-1\" role=\"dialog\">
  <div class=\"modal-dialog modal-lg\" role=\"document\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
        <h4 class=\"modal-title\" id=\"rule-modal-title\">";
        // line 414
        echo ($context["text_add"] ?? null);
        echo "</h4>
      </div>
      <div class=\"modal-body\">
        <form id=\"form-rule\" class=\"form-horizontal\">
           <input type=\"hidden\" name=\"rule_id\" id=\"rule-id\" value=\"\" />
           
           <div class=\"form-group required\">
             <label class=\"col-sm-3 control-label\">";
        // line 421
        echo ($context["entry_name"] ?? null);
        echo "</label>
             <div class=\"col-sm-9\">
               <input type=\"text\" name=\"name\" id=\"rule-name\" class=\"form-control\" />
             </div>
           </div>

           <div class=\"form-group\">
             <label class=\"col-sm-3 control-label\">";
        // line 428
        echo ($context["entry_target_group"] ?? null);
        echo "</label>
             <div class=\"col-sm-9\">
               <select name=\"target_group_id\" id=\"rule-target-group\" class=\"form-control\">
                 ";
        // line 431
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
            // line 432
            echo "                 <option value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["group"], "customer_group_id", [], "any", false, false, false, 432);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["group"], "name", [], "any", false, false, false, 432);
            echo "</option>
                 ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 434
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
        // line 450
        echo ($context["entry_priority"] ?? null);
        echo "</label>
             <div class=\"col-sm-3\">
               <input type=\"number\" name=\"priority\" id=\"rule-priority\" class=\"form-control\" value=\"0\" />
             </div>
             <label class=\"col-sm-3 control-label\">";
        // line 454
        echo ($context["entry_status"] ?? null);
        echo "</label>
             <div class=\"col-sm-3\">
               <select name=\"status\" id=\"rule-status\" class=\"form-control\">
                 <option value=\"1\">";
        // line 457
        echo ($context["text_enabled"] ?? null);
        echo "</option>
                 <option value=\"0\">";
        // line 458
        echo ($context["text_disabled"] ?? null);
        echo "</option>
               </select>
             </div>
           </div>

           <hr/>
           <fieldset>
             <legend style=\"padding-left:15px; border-bottom:0;\">Firebase Notifications</legend>
             ";
        // line 466
        if (($context["module_customer_segment_firebase_project_id"] ?? null)) {
            // line 467
            echo "             <div class=\"col-sm-12\" style=\"margin-bottom: 15px;\">
                <div style=\"background-color: #fcf8e3; color: #8a6d3b; padding: 10px; border: 1px solid #faebcc; border-radius: 4px; font-weight: bold;\">
                    <i class=\"fa fa-info-circle\"></i> Note: If defined, a Firebase push notification is sent immediately when a user hits this rule.<br>
                    <span style=\"font-weight: normal;\">(Optional: Leave empty if you do not want to send a notification)</span>
                </div>
             </div>
             <div class=\"form-group\">
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
             ";
        } else {
            // line 486
            echo "             <div class=\"col-sm-12\">
                 <div class=\"alert alert-info\"><i class=\"fa fa-info-circle\"></i> Firebase is not connected. Please connect Firebase in the General Settings to enable push notifications.</div>
             </div>
             ";
        }
        // line 490
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
        // line 538
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
        // line 592
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
        // line 609
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
        // line 623
        echo ($context["text_add"] ?? null);
        echo "');
    \$('#modal-rule').modal('show');
}

function saveRule() {
    \$.ajax({
        url: 'index.php?route=extension/module/customer_segment/saveRule&user_token=";
        // line 629
        echo ($context["user_token"] ?? null);
        echo "',
        type: 'post',
        data: \$('#form-rule').serialize(),
        dataType: 'json',
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        },
        success: function(json) {
            \$('.alert-dismissible').remove();
            if (json['error']) {
                \$('#module-alert').html('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ' + json['error'] + ' <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>');
                alert(json['error']); // Also alert since it's behind the modal!
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
        // line 652
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
        // line 661
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
        // line 689
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
        // line 701
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
        // line 714
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
        // line 747
        echo ($context["text_confirm_disconnect"] ?? null);
        echo "')) {
\t\t\$.ajax({
\t\t\turl: 'index.php?route=extension/module/customer_segment/disconnectFirebase&user_token=";
        // line 749
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
        // line 775
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
        // line 791
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
        // line 800
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
        // line 826
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
        // line 839
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
        // line 861
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
    { value: 'spend_total',         label: 'Spend Total (\$)',           type: 'numeric', hasTimeframe: true },
    { value: 'order_count',         label: 'Order Count',               type: 'numeric', hasTimeframe: true },
    { value: 'last_order_days_ago', label: 'Last Order (Days Ago)',     type: 'numeric', hasTimeframe: false },
    { value: 'inactive_days',       label: 'Inactive Days',             type: 'numeric', hasTimeframe: false },
    { value: 'age',                 label: 'Age (Years)',               type: 'numeric', hasTimeframe: false },
    { value: 'gender',              label: 'Gender',                    type: 'gender',  hasTimeframe: false },
    { value: 'has_category',        label: 'Has Ordered Category',      type: 'category', hasTimeframe: false },
    { value: 'has_product',         label: 'Has Ordered Product',       type: 'product',  hasTimeframe: false },
    { value: 'has_coupon',          label: 'Has Used Coupon',           type: 'coupon',   hasTimeframe: false },
    { value: 'country_id',          label: 'Location: Country',         type: 'country',  hasTimeframe: false },
    { value: 'zone_id',             label: 'Location: Zone',            type: 'zone',     hasTimeframe: false }
];

function getFieldMeta(fieldValue) {
    for (var i = 0; i < conditionFields.length; i++) {
        if (conditionFields[i].value === fieldValue) return conditionFields[i];
    }
    return { type: 'numeric', hasTimeframe: false };
}

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
    var \$cond = \$('<div class=\"condition-row\" style=\"margin-bottom:8px;\"></div>');

    var \$fieldSel = \$('<select class=\"form-control condition-field\" style=\"display:inline-block; width:220px; margin-right:5px;\"></select>');
    conditionFields.forEach(function(f){
        \$fieldSel.append('<option value=\"'+f.value+'\">'+f.label+'</option>');
    });
    \$fieldSel.val(condNode.field || 'spend_total');

    var currentMeta = getFieldMeta(condNode.field || 'spend_total');

    // Operator select — show/hide options based on field type
    var \$opSel = \$('<select class=\"form-control condition-operator\" style=\"display:inline-block; width:80px; margin-right:5px;\"><option value=\"==\">==</option><option value=\"!=\">!=</option><option value=\">\">&gt;</option><option value=\">=\">&gt;=</option><option value=\"<\">&lt;</option><option value=\"<=\">&lt;=</option></select>');
    \$opSel.val(condNode.operator || '>=');

    // Value input — switches between text and gender select
    var \$valWrapper = \$('<span class=\"condition-value-wrap\"></span>');

    function renderValueInput(fieldMeta, currentVal) {
        \$valWrapper.empty();
        if (fieldMeta.type === 'gender') {
            var \$genderSel = \$('<select class=\"form-control condition-value\" style=\"display:inline-block; width:140px; margin-right:5px;\"><option value=\"male\">Male</option><option value=\"female\">Female</option><option value=\"other\">Other</option></select>');
            \$genderSel.val(currentVal || 'male');
            \$opSel.find('option[value=\">\"], option[value=\">=\"], option[value=\"<\"], option[value=\"<=\"]').prop('disabled', true);
            \$opSel.val('==');
            \$valWrapper.append(\$genderSel);
        } else if (fieldMeta.type === 'country') {
            var \$countrySel = \$('<select class=\"form-control condition-value\" style=\"display:inline-block; width:140px; margin-right:5px;\"><option value=\"\">-- Select Country --</option></select>');
            \$.ajax({
                url: 'index.php?route=extension/module/customer_segment/getCountries&user_token=";
        // line 977
        echo ($context["user_token"] ?? null);
        echo "',
                dataType: 'json',
                success: function(json) {
                    for (var i = 0; i < json.length; i++) {
                        \$countrySel.append('<option value=\"' + json[i].country_id + '\">' + json[i].name + '</option>');
                    }
                    \$countrySel.val(currentVal || '');
                }
            });
            \$valWrapper.append(\$countrySel);
        } else if (fieldMeta.type === 'zone') {
            var \$zoneSel = \$('<select class=\"form-control condition-value\" style=\"display:inline-block; width:140px; margin-right:5px;\"><option value=\"\">-- Select Zone --</option></select>');
            \$.ajax({
                url: 'index.php?route=extension/module/customer_segment/getZones&user_token=";
        // line 990
        echo ($context["user_token"] ?? null);
        echo "',
                dataType: 'json',
                success: function(json) {
                    for (var i = 0; i < json.length; i++) {
                        \$zoneSel.append('<option value=\"' + json[i].zone_id + '\">' + json[i].name + '</option>');
                    }
                    \$zoneSel.val(currentVal || '');
                }
            });
            \$valWrapper.append(\$zoneSel);
        } else if (fieldMeta.type === 'coupon') {
            var \$couponSel = \$('<select class=\"form-control condition-value\" style=\"display:inline-block; width:140px; margin-right:5px;\"><option value=\"\">-- Select Coupon --</option></select>');
            \$.ajax({
                url: 'index.php?route=extension/module/customer_segment/getCoupons&user_token=";
        // line 1003
        echo ($context["user_token"] ?? null);
        echo "',
                dataType: 'json',
                success: function(json) {
                    for (var i = 0; i < json.length; i++) {
                        \$couponSel.append('<option value=\"' + json[i].code + '\">' + json[i].name + ' (' + json[i].code + ')</option>');
                    }
                    \$couponSel.val(currentVal || '');
                }
            });
            \$valWrapper.append(\$couponSel);
        } else if (fieldMeta.type === 'category' || fieldMeta.type === 'product') {
            var idKey = (fieldMeta.type === 'category') ? 'category_id' : 'product_id';
            var route = (fieldMeta.type === 'category') ? 'getCategories' : 'getProducts';
            var \$sel = \$('<select class=\"form-control condition-value\" style=\"display:inline-block; width:180px; margin-right:5px;\"><option value=\"\">-- Select ' + fieldMeta.type.charAt(0).toUpperCase() + fieldMeta.type.slice(1) + ' --</option></select>');
            
            \$.ajax({
                url: 'index.php?route=extension/module/customer_segment/' + route + '&user_token=";
        // line 1019
        echo ($context["user_token"] ?? null);
        echo "',
                dataType: 'json',
                success: function(json) {
                    for (var i = 0; i < json.length; i++) {
                        \$sel.append('<option value=\"' + json[i][idKey] + '\">' + json[i].name + '</option>');
                    }
                    \$sel.val(currentVal || '');
                }
            });
            
            \$valWrapper.append(\$sel);
        } else {
            \$opSel.find('option').prop('disabled', false);
            var \$textInput = \$('<input type=\"text\" class=\"form-control condition-value\" style=\"display:inline-block; width:140px; margin-right:5px;\" />');
            \$textInput.val(currentVal !== undefined ? currentVal : '');
            \$valWrapper.append(\$textInput);
        }
    }

    // Timeframe selector (Phase 2 - only for spend/order fields)
    var \$timeframeWrap = \$('<span class=\"condition-timeframe-wrap\" style=\"display:inline-block;\"></span>');

    function renderTimeframe(fieldMeta, tf) {
        \$timeframeWrap.empty();
        if (!fieldMeta.hasTimeframe) return;
        tf = tf || { type: 'all' };
        var \$tfType = \$('<select class=\"form-control condition-tf-type\" style=\"display:inline-block; width:155px; margin-right:5px;\"><option value=\"all\">Any Time</option><option value=\"calendar_month\">Calendar Month</option><option value=\"rolling\">Last N Days</option><option value=\"custom\">Custom Range</option></select>');
        \$tfType.val(tf.type || 'all');
        \$timeframeWrap.append(\$tfType);

        var \$tfExtra = \$('<span class=\"tf-extra\"></span>');
        \$timeframeWrap.append(\$tfExtra);

        function renderTfExtra(type, savedTf) {
            \$tfExtra.empty();
            if (type === 'rolling') {
                var \$days = \$('<input type=\"number\" class=\"form-control condition-tf-days\" placeholder=\"Days\" style=\"display:inline-block; width:80px; margin-right:5px;\" min=\"1\" />');
                \$days.val(savedTf && savedTf.days ? savedTf.days : 30);
                \$tfExtra.append(\$days);
            } else if (type === 'custom') {
                var \$start = \$('<input type=\"date\" class=\"form-control condition-tf-start\" style=\"display:inline-block; width:140px; margin-right:3px;\" />');
                var \$end = \$('<input type=\"date\" class=\"form-control condition-tf-end\" style=\"display:inline-block; width:140px; margin-right:5px;\" />');
                if (savedTf) { \$start.val(savedTf.start || ''); \$end.val(savedTf.end || ''); }
                \$tfExtra.append(\$start).append(\$('<span style=\"margin-right:3px;\"> to </span>')).append(\$end);
            }
        }
        renderTfExtra(tf.type, tf);
        \$tfType.on('change', function() { renderTfExtra(\$(this).val(), {}); });
    }

    renderValueInput(currentMeta, condNode.value);
    renderTimeframe(currentMeta, condNode.timeframe);

    \$fieldSel.on('change', function() {
        var meta = getFieldMeta(\$(this).val());
        renderValueInput(meta, '');
        renderTimeframe(meta, null);
    });

    var \$removeBtn = \$('<button type=\"button\" class=\"btn btn-danger btn-xs\"><i class=\"fa fa-minus\"></i></button>');
    \$cond.append(\$fieldSel).append(\$opSel).append(\$valWrapper).append(\$timeframeWrap).append(\$removeBtn);

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
            var fieldVal = \$child.find('.condition-field').val();
            var condObj = {
                type: 'condition',
                field: fieldVal,
                operator: \$child.find('.condition-operator').val(),
                value: \$child.find('.condition-value').val()
            };
            // Capture timeframe if present
            var \$tfType = \$child.find('.condition-tf-type');
            if (\$tfType.length) {
                var tfType = \$tfType.val();
                var tf = { type: tfType };
                if (tfType === 'rolling') {
                    tf.days = parseInt(\$child.find('.condition-tf-days').val(), 10) || 30;
                } else if (tfType === 'custom') {
                    tf.start = \$child.find('.condition-tf-start').val();
                    tf.end = \$child.find('.condition-tf-end').val();
                }
                condObj.timeframe = tf;
            }
            data.conditions.push(condObj);
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
        // line 1156
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
        // line 1180
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

// ---------------------------------------------------------------
// BANNERS JS
// ---------------------------------------------------------------
function loadBanners(groupId) {
    groupId = groupId || 0;
    \$.ajax({
        url: 'index.php?route=extension/module/customer_segment/getBanners&user_token=";
        // line 1226
        echo ($context["user_token"] ?? null);
        echo "&customer_group_id=' + groupId,
        dataType: 'json',
        success: function(json) {
            var html = '';
            if (json.length > 0) {
                for (var i = 0; i < json.length; i++) {
                    var b = json[i];
                    html += '<tr>';
                    html += '<td>' + b.banner_id + '</td><td>' + b.customer_group_id + '</td><td>' + b.title + '</td>';
                    html += '<td>' + (b.thumb ? '<img src=\"' + b.thumb + '\" style=\"max-height:40px;\">' : '') + '</td>';
                    html += '<td><a href=\"' + b.link + '\" target=\"_blank\">' + b.link + '</a></td>';
                    html += '<td><span class=\"label label-' + (b.status == 1 ? 'success' : 'default') + '\">' + (b.status == 1 ? 'Enabled' : 'Disabled') + '</span></td>';
                    html += '<td class=\"text-right\"><button type=\"button\" onclick=\"openBannerModal(' + b.banner_id + ');\" class=\"btn btn-primary btn-xs\"><i class=\"fa fa-pencil\"></i></button> ';
                    html += '<button type=\"button\" onclick=\"deleteBannerRow(' + b.banner_id + ');\" class=\"btn btn-danger btn-xs\"><i class=\"fa fa-trash\"></i></button></td>';
                    html += '</tr>';
                }
            } else { html = '<tr><td colspan=\"7\" class=\"text-center\">No banners found.</td></tr>'; }
            \$('#banner-list').html(html);
        }
    });
}

function openBannerModal(banner_id) {
    \$('#form-banner')[0].reset();
    \$('#banner-id').val(banner_id || '');
    
    // Reset image manager
    \$('#thumb-banner-image img').attr('src', '";
        // line 1253
        echo ($context["placeholder"] ?? null);
        echo "');
    \$('#input-banner-image').val('');

    if (banner_id) {
        \$.ajax({
            url: 'index.php?route=extension/module/customer_segment/getBanners&user_token=";
        // line 1258
        echo ($context["user_token"] ?? null);
        echo "',
            dataType: 'json',
            success: function(json) {
                for (var i = 0; i < json.length; i++) {
                    if (json[i].banner_id == banner_id) {
                        \$('#banner-group').val(json[i].customer_group_id);
                        \$('#banner-title').val(json[i].title);
                        \$('#banner-link').val(json[i].link);
                        \$('#banner-status').val(json[i].status);
                        
                        // Set image manager
                        if (json[i].image) {
                            \$('#input-banner-image').val(json[i].image);
                            \$('#thumb-banner-image img').attr('src', json[i].thumb);
                        }
                    }
                }
            }
        });
    }
    \$('#modal-banner').modal('show');
}

function saveBanner() {
    \$.ajax({
        url: 'index.php?route=extension/module/customer_segment/saveBanner&user_token=";
        // line 1283
        echo ($context["user_token"] ?? null);
        echo "',
        type: 'post', data: \$('#form-banner').serialize(), dataType: 'json',
        success: function(json) {
            if (json.error) { alert(json.error); } else { \$('#modal-banner').modal('hide'); loadBanners(\$('#filter-banner-group').val()); }
        }
    });
}

function deleteBannerRow(id) {
    if (confirm('Delete this banner?')) {
        \$.ajax({ url: 'index.php?route=extension/module/customer_segment/deleteBanner&user_token=";
        // line 1293
        echo ($context["user_token"] ?? null);
        echo "&banner_id=' + id, dataType: 'json', success: function() { loadBanners(\$('#filter-banner-group').val()); } });
    }
}

\$(document).ready(function() { loadBanners(0); });
\$('#btn-filter-banners').on('click', function() { loadBanners(\$('#filter-banner-group').val()); });

// ---------------------------------------------------------------
// SLIDERS JS
// ---------------------------------------------------------------
function loadSliders(groupId) {
    groupId = groupId || 0;
    \$.ajax({
        url: 'index.php?route=extension/module/customer_segment/getSliders&user_token=";
        // line 1306
        echo ($context["user_token"] ?? null);
        echo "&customer_group_id=' + groupId,
        dataType: 'json',
        success: function(json) {
            var html = '';
            if (json.length > 0) {
                for (var i = 0; i < json.length; i++) {
                    var s = json[i];
                    html += '<tr><td>' + s.slider_id + '</td><td>' + s.customer_group_id + '</td><td>' + s.name + '</td><td>' + s.product_ids + '</td>';
                    html += '<td><span class=\"label label-' + (s.status == 1 ? 'success' : 'default') + '\">' + (s.status == 1 ? 'Enabled' : 'Disabled') + '</span></td>';
                    html += '<td class=\"text-right\"><button type=\"button\" onclick=\"openSliderModal(' + s.slider_id + ');\" class=\"btn btn-primary btn-xs\"><i class=\"fa fa-pencil\"></i></button> ';
                    html += '<button type=\"button\" onclick=\"deleteSliderRow(' + s.slider_id + ');\" class=\"btn btn-danger btn-xs\"><i class=\"fa fa-trash\"></i></button></td></tr>';
                }
            } else { html = '<tr><td colspan=\"6\" class=\"text-center\">No sliders found.</td></tr>'; }
            \$('#slider-list').html(html);
        }
    });
}

function openSliderModal(slider_id) {
    \$('#form-slider')[0].reset();
    \$('#slider-product-list').empty();
    \$('#slider-id').val(slider_id || '');
    
    if (slider_id) {
        \$.ajax({
            url: 'index.php?route=extension/module/customer_segment/getSliders&user_token=";
        // line 1331
        echo ($context["user_token"] ?? null);
        echo "',
            dataType: 'json',
            success: function(json) {
                for (var i = 0; i < json.length; i++) {
                    if (json[i].slider_id == slider_id) {
                        \$('#slider-group').val(json[i].customer_group_id);
                        \$('#slider-name').val(json[i].name);
                        \$('#slider-status').val(json[i].status);
                        
                        // Populate products
                        if (json[i].product_ids) {
                            \$.ajax({
                                url: 'index.php?route=extension/module/customer_segment/getProductInfo&user_token=";
        // line 1343
        echo ($context["user_token"] ?? null);
        echo "&ids=' + json[i].product_ids,
                                dataType: 'json',
                                success: function(pJson) {
                                    for(var j=0; j<pJson.length; j++) {
                                        \$('#slider-product-list').append('<div id=\"slider-product' + pJson[j].product_id + '\"><i class=\"fa fa-minus-circle\"></i> ' + pJson[j].name + '<input type=\"hidden\" name=\"selected_product[]\" value=\"' + pJson[j].product_id + '\" /></div>');
                                    }
                                }
                            });
                        }
                    }
                }
            }
        });
    }
    \$('#modal-slider').modal('show');
}

function saveSlider() {
    var product_ids = [];
    \$('#slider-product-list input[name=\"selected_product[]\"]').each(function() {
        product_ids.push(\$(this).val());
    });
    \$('#slider-product-ids').val(product_ids.join(','));

    \$.ajax({
        url: 'index.php?route=extension/module/customer_segment/saveSlider&user_token=";
        // line 1368
        echo ($context["user_token"] ?? null);
        echo "',
        type: 'post',
        data: \$('#form-slider').serialize(),
        dataType: 'json',
        success: function(json) {
            if (json.error) {
                alert(json.error);
            } else {
                \$('#modal-slider').modal('hide');
                loadSliders(\$('#filter-slider-group').val());
            }
        }
    });
}

function deleteSliderRow(id) {
    if (confirm('Delete this slider?')) { \$.ajax({ url: 'index.php?route=extension/module/customer_segment/deleteSlider&user_token=";
        // line 1384
        echo ($context["user_token"] ?? null);
        echo "&slider_id=' + id, dataType: 'json', success: function() { loadSliders(\$('#filter-slider-group').val()); } }); }
}

\$(document).ready(function() { loadSliders(0); });
\$('#btn-filter-sliders').on('click', function() { loadSliders(\$('#filter-slider-group').val()); });

// Autocomplete for Slider Products
\$('#input-slider-product').autocomplete({
    'source': function(request, response) {
        \$.ajax({
            url: 'index.php?route=catalog/product/autocomplete&user_token=";
        // line 1394
        echo ($context["user_token"] ?? null);
        echo "&filter_name=' + encodeURIComponent(request),
            dataType: 'json',
            success: function(json) {
                response(\$.map(json, function(item) {
                    return {
                        label: item['name'],
                        value: item['product_id']
                    }
                }));
            }
        });
    },
    'select': function(item) {
        \$('#input-slider-product').val('');
        \$('#slider-product' + item['value']).remove();
        \$('#slider-product-list').append('<div id=\"slider-product' + item['value'] + '\"><i class=\"fa fa-minus-circle\"></i> ' + item['label'] + '<input type=\"hidden\" name=\"selected_product[]\" value=\"' + item['value'] + '\" /></div>');
    }
});

\$('#slider-product-list').delegate('.fa-minus-circle', 'click', function() {
    \$(this).parent().remove();
});

// ---------------------------------------------------------------
// PROMOTIONS JS
// ---------------------------------------------------------------
function loadPromos(groupId) {
    groupId = groupId || 0;
    \$.ajax({
        url: 'index.php?route=extension/module/customer_segment/getPromotions&user_token=";
        // line 1423
        echo ($context["user_token"] ?? null);
        echo "&customer_group_id=' + groupId,
        dataType: 'json',
        success: function(json) {
            var html = '';
            if (json.length > 0) {
                for (var i = 0; i < json.length; i++) {
                    var p = json[i];
                    html += '<tr><td>' + p.promotion_id + '</td><td>' + p.customer_group_id + '</td><td>' + p.title + '</td><td>' + p.code + '</td>';
                    html += '<td><span class=\"label label-' + (p.status == 1 ? 'success' : 'default') + '\">' + (p.status == 1 ? 'Enabled' : 'Disabled') + '</span></td>';
                    html += '<td class=\"text-right\"><button type=\"button\" onclick=\"openPromoModal(' + p.promotion_id + ');\" class=\"btn btn-primary btn-xs\"><i class=\"fa fa-pencil\"></i></button> ';
                    html += '<button type=\"button\" onclick=\"deletePromoRow(' + p.promotion_id + ');\" class=\"btn btn-danger btn-xs\"><i class=\"fa fa-trash\"></i></button></td></tr>';
                }
            } else { html = '<tr><td colspan=\"6\" class=\"text-center\">No promotions found.</td></tr>'; }
            \$('#promo-list').html(html);
        }
    });
}

function openPromoModal(promo_id) {
    \$('#form-promo')[0].reset();
    \$('#promo-id').val(promo_id || '');
    if (promo_id) {
        \$.ajax({ url: 'index.php?route=extension/module/customer_segment/getPromotions&user_token=";
        // line 1445
        echo ($context["user_token"] ?? null);
        echo "', dataType: 'json', success: function(json) {
            for (var i = 0; i < json.length; i++) { if (json[i].promotion_id == promo_id) { \$('#promo-group').val(json[i].customer_group_id); \$('#promo-title').val(json[i].title); \$('#promo-desc').val(json[i].description); \$('#promo-code').val(json[i].code); \$('#promo-status').val(json[i].status); } }
        }});
    }
    \$('#modal-promo').modal('show');
}

function savePromo() {
    \$.ajax({ url: 'index.php?route=extension/module/customer_segment/savePromotion&user_token=";
        // line 1453
        echo ($context["user_token"] ?? null);
        echo "', type: 'post', data: \$('#form-promo').serialize(), dataType: 'json',
        success: function(json) { if (json.error) { alert(json.error); } else { \$('#modal-promo').modal('hide'); loadPromos(\$('#filter-promo-group').val()); } }
    });
}

function deletePromoRow(id) {
    if (confirm('Delete this promotion?')) { \$.ajax({ url: 'index.php?route=extension/module/customer_segment/deletePromotion&user_token=";
        // line 1459
        echo ($context["user_token"] ?? null);
        echo "&promotion_id=' + id, dataType: 'json', success: function() { loadPromos(\$('#filter-promo-group').val()); } }); }
}

\$(document).ready(function() { loadPromos(0); });
\$('#btn-filter-promos').on('click', function() { loadPromos(\$('#filter-promo-group').val()); });

function openTestModal() {
    \$.ajax({
        url: 'index.php?route=extension/module/customer_segment/getRules&user_token=";
        // line 1467
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
        // line 1487
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
        // line 1506
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
        return array (  1993 => 1506,  1971 => 1487,  1948 => 1467,  1937 => 1459,  1928 => 1453,  1917 => 1445,  1892 => 1423,  1860 => 1394,  1847 => 1384,  1828 => 1368,  1800 => 1343,  1785 => 1331,  1757 => 1306,  1741 => 1293,  1728 => 1283,  1700 => 1258,  1692 => 1253,  1662 => 1226,  1613 => 1180,  1586 => 1156,  1446 => 1019,  1427 => 1003,  1411 => 990,  1395 => 977,  1276 => 861,  1251 => 839,  1235 => 826,  1206 => 800,  1194 => 791,  1175 => 775,  1146 => 749,  1141 => 747,  1105 => 714,  1089 => 701,  1074 => 689,  1043 => 661,  1031 => 652,  1005 => 629,  996 => 623,  979 => 609,  959 => 592,  902 => 538,  852 => 490,  846 => 486,  825 => 467,  823 => 466,  812 => 458,  808 => 457,  802 => 454,  795 => 450,  777 => 434,  766 => 432,  762 => 431,  756 => 428,  746 => 421,  736 => 414,  705 => 397,  666 => 372,  642 => 353,  623 => 348,  592 => 319,  581 => 317,  577 => 316,  553 => 294,  542 => 292,  538 => 291,  514 => 269,  503 => 267,  499 => 266,  421 => 190,  410 => 188,  406 => 187,  399 => 183,  378 => 164,  374 => 162,  371 => 161,  361 => 157,  357 => 156,  353 => 154,  349 => 153,  333 => 140,  329 => 139,  325 => 138,  316 => 132,  304 => 122,  289 => 120,  285 => 119,  271 => 110,  265 => 109,  259 => 108,  248 => 100,  243 => 98,  227 => 85,  223 => 84,  211 => 75,  206 => 73,  197 => 67,  193 => 66,  187 => 63,  183 => 62,  178 => 59,  173 => 57,  168 => 56,  163 => 54,  158 => 53,  156 => 52,  150 => 49,  138 => 40,  134 => 39,  129 => 37,  125 => 36,  119 => 33,  113 => 30,  109 => 28,  101 => 24,  98 => 23,  90 => 20,  85 => 19,  83 => 18,  76 => 13,  65 => 11,  61 => 10,  56 => 8,  50 => 7,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "extension/module/customer_segment.twig", "");
    }
}
