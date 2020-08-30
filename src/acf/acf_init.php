<?php

//  ┌─────────────────────────────────────────────────────────────────────────┐
//  │                         Include ACF Options Page                        │
//  └─────────────────────────────────────────────────────────────────────────┘
require __DIR__.'/acf_admin_page.php'; 
require __DIR__.'/acf_admin_Style.php'; 
// require __DIR__.'/acf_panel.php'; 


//  ┌─────────────────────────────────────────────────────────────────────────┐
//  │            Populate all of the 'select' types automatically             │
//  └─────────────────────────────────────────────────────────────────────────┘

require __DIR__.'/selects/populate_filter_slugs.php';
require __DIR__.'/selects/populate_filter_library.php';
require __DIR__.'/selects/populate_layer_names.php';