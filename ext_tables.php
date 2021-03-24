<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('mc_cookie', 'Configuration/TypoScript', 'MC_Cookie');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_mccookie_domain_model_cookie', 'EXT:mc_cookie/Resources/Private/Language/locallang_csh_tx_mccookie_domain_model_cookie.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_mccookie_domain_model_cookie');

    }
);
