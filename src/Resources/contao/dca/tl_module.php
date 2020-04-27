<?php

// Add palette to tl_module
$GLOBALS['TL_DCA']['tl_module']['palettes']['hibp'] = '{title_legend},name,headline,type;';
$GLOBALS['TL_DCA']['tl_module']['palettes']['hibp'].= '{config_legend},APIKey;';
$GLOBALS['TL_DCA']['tl_module']['palettes']['hibp'].= '{content_legend},txtNotPwned,txtPwned;';
$GLOBALS['TL_DCA']['tl_module']['palettes']['hibp'].= '{protected_legend:hide},protected;';
$GLOBALS['TL_DCA']['tl_module']['palettes']['hibp'].= '{expert_legend:hide},guests,cssID,space;';


$GLOBALS['TL_DCA']['tl_module']['fields']['APIKey'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_module']['APIKey'],
    'inputType'               => 'text',
    'eval'                    => array('maxlength'=>32, 'decodeEntities'=>true, 'tl_class'=>'w50'),
    'sql'                     => "varchar(32) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_module']['fields']['txtNotPwned'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_module']['txtNotPwned'],
    'exclude'                 => true,
    'search'                  => true,
    'inputType'               => 'textarea',
    'eval'                    => array('rte'=>'tinyMCE', 'tl_class' => 'clr'),
    'sql'                     => "mediumtext NULL"
);
$GLOBALS['TL_DCA']['tl_module']['fields']['txtPwned'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_module']['txtPwned'],
    'exclude'                 => true,
    'search'                  => true,
    'inputType'               => 'textarea',
    'eval'                    => array('rte'=>'tinyMCE', 'tl_class' => 'clr'),
    'sql'                     => "mediumtext NULL"
);
