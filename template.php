<?php
/**
 * @file
 * Contains the theme's functions to manipulate Drupal's default markup.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728096
 */

/**
 * Implements theme_ctools_wizard_trail().
 */
function ads_base_ctools_wizard_trail($vars) {

  $action = arg(1) == 'add' ? 'add' : 'edit';

  if ($action === 'add') {
    // Advert adding action.
    $step = substr(arg(2), 5);
  }
  elseif ($action === 'edit') {
    // Advert editing action.
    $step = substr(arg(3), 5);
  }

  if (empty($step)) {
    $step = 1;
  }


  $groups_info = field_group_info_groups('node', 'advert');
  $groups      = $groups_info['form'];
  $step_labels = array();

  foreach ($groups as $machine_name => $group) {
    if (isset($group -> format_settings['instance_settings']['classes'])) {
      if ($group -> format_settings['instance_settings']['classes'] == 'hidden') {
        continue;
      }
    }

    $step_labels[] = $group->label;
  }

  $trail = $vars['trail'];
  if (!empty($trail)) {
    return theme('ads_advert_wizard_trail', array('labels' => $step_labels, 'step' => $step));
  }
}
/**
 * Returns HTML for the facet title, usually the title of the block.
 *
 * @param $variables
 *   An associative array containing:
 *   - title: The title of the facet.
 *   - facet: The facet definition as returned by facetapi_facet_load().
 *
 * @see theme_facetapi_title()
 */
function ads_base_facetapi_title($variables) {
  return $variables['title'];
}

/**
 * Implements template_preprocess_panels_pane().
 */
function ads_base_preprocess_panels_pane(&$vars) {
  if ($vars['pane']->type === 'ads_include_page') {
    $vars['theme_hook_suggestions'][] = 'panels_pane__' . $vars['pane']->configuration['page_name'];
  }
}

/**
 * Implements template_panels_default_style_render_region().
 */
function ads_base_panels_default_style_render_region($vars) {
  return implode('', $vars['panes']);
}

/**
 * Override or insert variables into the maintenance page template.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("maintenance_page" in this case.)
 */
/* -- Delete this line if you want to use this function
function ads_base_preprocess_maintenance_page(&$variables, $hook) {
  // When a variable is manipulated or added in preprocess_html or
  // preprocess_page, that same work is probably needed for the maintenance page
  // as well, so we can just re-use those functions to do that work here.
  ads_preprocess_html($variables, $hook);
  ads_preprocess_page($variables, $hook);
}
// */

/**
 * Override or insert variables into the html templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("html" in this case.)
 */
/* -- Delete this line if you want to use this function
function ads_base_preprocess_html(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');

  // The body tag's classes are controlled by the $classes_array variable. To
  // remove a class from $classes_array, use array_diff().
  //$variables['classes_array'] = array_diff($variables['classes_array'], array('class-to-remove'));
}
// */

/**
 * Override or insert variables into the page templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
/* -- Delete this line if you want to use this function
function ads_base_preprocess_page(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the node templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
/* -- Delete this line if you want to use this function
function ads_base_preprocess_node(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');

  // Optionally, run node-type-specific preprocess functions, like
  // ads_preprocess_node_page() or ads_preprocess_node_story().
  $function = __FUNCTION__ . '_' . $variables['node']->type;
  if (function_exists($function)) {
    $function($variables, $hook);
  }
}
// */

/**
 * Override or insert variables into the comment templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function ads_base_preprocess_comment(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the region templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("region" in this case.)
 */
/* -- Delete this line if you want to use this function
function ads_base_preprocess_region(&$variables, $hook) {
  // Don't use Zen's region--sidebar.tpl.php template for sidebars.
  //if (strpos($variables['region'], 'sidebar_') === 0) {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('region__sidebar'));
  //}
}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function
function ads_base_preprocess_block(&$variables, $hook) {
  // Add a count to all the blocks in the region.
  // $variables['classes_array'][] = 'count-' . $variables['block_id'];

  // By default, Zen will use the block--no-wrapper.tpl.php for the main
  // content. This optional bit of code undoes that:
  //if ($variables['block_html_id'] == 'block-system-main') {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('block__no_wrapper'));
  //}
}
// */
