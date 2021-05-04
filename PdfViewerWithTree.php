<?php

/**
 * @package PdfViewerWithTree
 * @version 1.0.0
 */
/*
Plugin Name: PdfViewerWithTree
Plugin URI: -
Description: List document on the left of the page and show document on the right of the page.
Author: NicolasRz
Version: 1.0.1
Author URI:
*/

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly
}

/** Start plugin */
require_once 'inc/setting/PdfViewerWithTree.php';
PdfViewerWithTree::make();

