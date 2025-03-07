<?php
namespace FlagshipWoocommerceBedrock\Helpers;

use FlagshipWoocommerceBedrock\FlagshipWoocommerceBedrockShipping;
use FlagshipWoocommerceBedrock\REST_Controllers\Package_Box_Controller;

class Menu_Helper {

    public static $menuItemUri = 'flagship/ship';

    public static $package_boxes_uri = 'flagship/boxes';

    protected $flagshipUrlMap = array(
        'flagship_shipment' => 'shipping/ship',
        'flagship_manage_shipment' => 'shipping/manage',
    );

    public function add_flagship_to_menu($items)
    {
        $icon = base64_encode('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 145.595 82.898">
              <g>
                <path fill="black" d="M50.034,33.4c-4.637.279-7.049.464-7.42.464h-.371c-3.71,0-5.936-1.3-5.936-3.71,0-2.04,1.484-3.246,3.989-3.246.742,0,1.576.093,2.6.186,2.5.186,5.286.278,7.976.278,1.3,0,2.041,0,3.8-.092a4.1,4.1,0,0,1,3.71-2.041c1.484,0,2.69.742,2.875,1.855a44.677,44.677,0,0,0,5.75.186c1.113,0,2.134,0,3.247-.094H72.2c15.582,0,21.889,1.577,21.889,5.38a2.849,2.849,0,0,1-3.06,2.968,6.836,6.836,0,0,1-1.763-.279L85.094,34.14a41.845,41.845,0,0,0-12.058-1.391c-1.855,0-4.452,0-7.884.092-1.391.094-2.5.094-3.246.094H60.237l-.278.648-5.1,10.853c-2.875,6.307-3.617,8.069-5.379,12.891l.835-.092c5.75-.371,7.327-.464,9.738-.464,9,0,12.429,1.392,12.429,4.823a3.367,3.367,0,0,1-3.432,3.432,11.94,11.94,0,0,1-2.226-.279,35.894,35.894,0,0,0-9.646-1.112,87.8,87.8,0,0,0-9.182.556l-1.206.093c-.185.463-.278.835-.371,1.113-1.02,2.411-2.04,5.286-3.153,8.718a49.447,49.447,0,0,0-2.319,9L40.852,85.9c-.185,3.153-1.484,4.637-3.988,4.637a4.671,4.671,0,0,1-4.73-4.637,10.216,10.216,0,0,1,.556-2.876,319.422,319.422,0,0,1,18.457-48.6l.464-1.113A10.811,10.811,0,0,1,50.034,33.4Z" transform="translate(-11.396 -25.237)"/>
                <path fill="black" d="M85.231,49.961c0-4.678,4.757-10.307,11.5-13.637A43.956,43.956,0,0,1,115.6,31.8c9.038,0,14.271,4.044,14.271,11.021a22.08,22.08,0,0,1-1.586,7.453c-2.3,5.708-4.836,8.8-7.214,8.8a3.168,3.168,0,0,1-3.013-3.41c0-1.03.951-2.933,2.458-5.232,1.586-2.459,2.933-6.027,2.933-7.77,0-3.647-3.33-5.946-8.563-5.946a35.2,35.2,0,0,0-14.032,3.568c-5.709,2.7-9.2,6.58-9.2,10.227,0,4.2,2.695,7.135,13.716,14.905,2.378,1.665,5.629,4.044,7.056,5.233,3.092,2.537,4.677,5.154,4.677,8.008,0,7.214-9.275,12.447-22.279,12.447-11.733,0-20.216-5.629-20.216-13.32a7.749,7.749,0,0,1,2.616-5.708,3.556,3.556,0,0,1,2.458-1.031,2.608,2.608,0,0,1,2.616,2.7,5.038,5.038,0,0,1-.714,2.219,5.465,5.465,0,0,0-.792,2.538c0,4.282,6.818,7.849,14.826,7.849s15.143-3.726,15.143-7.929a1.818,1.818,0,0,0-.555-1.268,43.311,43.311,0,0,0-8.4-7.056C90.78,62.329,86.024,56.779,85.31,50.675A2.208,2.208,0,0,1,85.231,49.961Z" transform="translate(-11.396 -25.237)"/>
            </g>
            <path fill="black" d="M156.973,100.291a3.82,3.82,0,0,0-1.357-1.152,29.787,29.787,0,0,0-6.283-2.518q-5.352-1.693-10.846-2.873c-1.13-.243-1.266-.294-3.264-.734-1.18-.141-4.174-.911-5.023.192-1.049,1.362,3.625,2.037,4.22,2.187a47.43,47.43,0,0,1,9.215,3.112c-.157,0-.289,0-.384,0q-18.381-.276-36.77-.3-3.023,0-6.047.007c-29.312.054-58.625.69-87.9,2.165a1.2,1.2,0,0,0-1.126,1.394l.041.247a3.261,3.261,0,0,0,3.434,2.735c23.777-1.558,52.025-2.759,84.428-3.048q3.017-.027,6.08-.043,18.6-.1,38.942.236a44.68,44.68,0,0,1-9.916,3.467c-.595.15-5.269.825-4.22,2.187.849,1.1,3.843.333,5.023.192,1.9-.419,2.117-.487,3.109-.7,3.712-.787,7.384-1.766,11-2.91a29.787,29.787,0,0,0,6.283-2.518,3.82,3.82,0,0,0,1.357-1.152.219.219,0,0,0,0-.174Z" transform="translate(-11.396 -25.237)"/>
            </svg>
        ');

        add_menu_page( 'FlagShip', 'FlagShip', 'manage_options', self::$menuItemUri, '', 'data:image/svg+xml;base64,'.$icon, 56.6);

        add_submenu_page(self::$menuItemUri, __( 'Shipment', 'flagship-shipping-extension-for-woocommerce'), __( 'Shipment', 'flagship-shipping-extension-for-woocommerce'), 'manage_options', self::$menuItemUri, array($this, 'load_flagship_shipment_page'));
        add_submenu_page(self::$menuItemUri, __( 'Manage shipment', 'flagship-shipping-extension-for-woocommerce'), __( 'Manage shipment', 'flagship-shipping-extension-for-woocommerce'), 'manage_options', 'flagship/manage', array($this, 'load_flagship_manage_shipment_page'));
        add_submenu_page(self::$menuItemUri, __( 'Package boxes', 'flagship-shipping-extension-for-woocommerce'), __( 'Package boxes', 'flagship-shipping-extension-for-woocommerce'), 'manage_options', self::$package_boxes_uri, array($this, 'list_boxes'));

        $this->add_settings_link();
        $this->add_flagship_link();
    }

    public function __call($function, $args)
    {
        $matched = preg_match('/^load_(\w+)_page$/', $function, $matches);

        if ($matched && isset($matches[1])) {
            $this->load_page($matches[1]);

            return;
        }

        $this->$function($args);
    }

    public function load_page($pageName)
    {
        $flagshipUrl = FlagshipWoocommerceBedrockShipping::getFlagshipUrl();
        $pageUri =!empty($_GET['flagship_uri']) ? sanitize_text_field($_GET['flagship_uri']) : $this->flagshipUrlMap[$pageName];
        $iframePageUrl = $flagshipUrl.'/'.$pageUri.'?ex-iframe=true';

        Template_Helper::render_html('flagship_page.html', array(
            'iframePageUrl' => $iframePageUrl,
        ));
    }

    public function add_flagship_link()
    {
        global $submenu;

        $submenu[self::$menuItemUri][] = array(
            sprintf(
                '<a href="%s" target="_blank">%s <span class="dashicons dashicons-external"></span></a>',
                FlagshipWoocommerceBedrockShipping::getFlagshipUrl().'?ex-iframe=false',
                __('Visit FlagShip site', 'flagship-shipping-extension-for-woocommerce'),
            ),
            "manage_options",
            "flagship\/site",
            "Visit FlagShip site"
        );
    }

    public function add_settings_link()
    {
        global $submenu;

        $settingsUrl = 'admin.php?page=wc-settings&tab=shipping&section='.FlagshipWoocommerceBedrockShipping::$methodId;

        $submenu[self::$menuItemUri][] = array(
            sprintf(
                '<a href="%s">%s </a>',
                $settingsUrl,
                __('Settings', 'flagship-shipping-extension-for-woocommerce'),
            ),
            "manage_options",
            "flagship\/settings",
            "Settings"
        );
    }

    public function list_boxes()
    {
        Template_Helper::render_php('list_boxes.php', array(
            'get_boxes_url' => rest_url(Package_Box_Controller::get_namespace().'/package_boxes/get'),
            'save_boxes_url' => rest_url(Package_Box_Controller::get_namespace().'/package_boxes/save'),
        ));
    }
}
