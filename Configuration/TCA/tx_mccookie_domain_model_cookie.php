<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:mc_cookie/Resources/Private/Language/locallang_db.xlf:tx_mccookie_domain_model_cookie',
        'label' => 'message',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'sortby' => 'sorting',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'message,text_mehr_informationen,button_message,message_youtube,text_mehr_informationen_youtube,button_message_youtube',
        'iconfile' => 'EXT:mc_cookie/Resources/Public/Icons/tx_mccookie_domain_model_cookie.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, message, text_mehr_informationen, button_message, pid_data_privacy, message_youtube, text_mehr_informationen_youtube, button_message_youtube, pid_data_privacy_youtube',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden,
        --div--;Google, message, text_mehr_informationen, button_message, pid_data_privacy,
        --div--;Youtube, message_youtube, text_mehr_informationen_youtube, button_message_youtube, pid_data_privacy_youtube,
        --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ]
                ],
                'default' => 0,
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_mccookie_domain_model_cookie',
                'foreign_table_where' => 'AND {#tx_mccookie_domain_model_cookie}.{#pid}=###CURRENT_PID### AND {#tx_mccookie_domain_model_cookie}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],

        'message' => [
            'exclude' => true,
            'label' => 'LLL:EXT:mc_cookie/Resources/Private/Language/locallang_db.xlf:tx_mccookie_domain_model_cookie.message',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim'
            ]
        ],
        'text_mehr_informationen' => [
            'exclude' => true,
            'label' => 'LLL:EXT:mc_cookie/Resources/Private/Language/locallang_db.xlf:tx_mccookie_domain_model_cookie.text_mehr_informationen',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'button_message' => [
            'exclude' => true,
            'label' => 'LLL:EXT:mc_cookie/Resources/Private/Language/locallang_db.xlf:tx_mccookie_domain_model_cookie.button_message',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'pid_data_privacy' => [
            'exclude' => true,
            'label' => 'LLL:EXT:mc_cookie/Resources/Private/Language/locallang_db.xlf:tx_mccookie_domain_model_cookie.pid_data_privacy',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectTree',
                'foreign_table' => 'pages',
                'foreign_table_where' => 'AND sys_language_uid = ###REC_FIELD_sys_language_uid### ORDER BY pages.sorting',
                'treeConfig' => [
                    'parentField' => 'pid',
                    'appearance' => [
                        'expandAll' => true,
                        'showHeader' => true,
                    ],
                ],
                'maxitems' => 1,
                'eval' => '',
                'behaviour' => [
                    'allowLanguageSynchronization' => 1
                ],
            ],
        ],
        'message_youtube' => [
            'exclude' => true,
            'label' => 'LLL:EXT:mc_cookie/Resources/Private/Language/locallang_db.xlf:tx_mccookie_domain_model_cookie.message_youtube',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim'
            ]
        ],
        'text_mehr_informationen_youtube' => [
            'exclude' => true,
            'label' => 'LLL:EXT:mc_cookie/Resources/Private/Language/locallang_db.xlf:tx_mccookie_domain_model_cookie.text_mehr_informationen_youtube',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'button_message_youtube' => [
            'exclude' => true,
            'label' => 'LLL:EXT:mc_cookie/Resources/Private/Language/locallang_db.xlf:tx_mccookie_domain_model_cookie.button_message_youtube',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'pid_data_privacy_youtube' => [
            'exclude' => true,
            'label' => 'LLL:EXT:mc_cookie/Resources/Private/Language/locallang_db.xlf:tx_mccookie_domain_model_cookie.pid_data_privacy_youtube',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectTree',
                'foreign_table' => 'pages',
                'foreign_table_where' => 'AND sys_language_uid = ###REC_FIELD_sys_language_uid### ORDER BY pages.sorting',
                'treeConfig' => [
                    'parentField' => 'pid',
                    'appearance' => [
                        'expandAll' => true,
                        'showHeader' => true,
                    ],
                ],
                'maxitems' => 1,
                'eval' => '',
                'behaviour' => [
                    'allowLanguageSynchronization' => 1
                ],
            ],
        ],

    ],
];
