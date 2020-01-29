<?php
namespace FlagshipWoocommerce;

class Menu_Helper {

    protected $flagshipUrlMap = array(
        'flagship_shipment' => 'shipping/ship',
        'flagship_manage_shipment' => 'shipping/manage',
    );

    public function add_flagship_to_menu($items) 
    {
        add_menu_page( 'FlagShip', 'FlagShip', 'manage_options', 'flagship', array($this, 'load_flagship_shipment_page'), plugin_dir_url(FLAGSHIP_PLUGIN_FILE).'assets/images/flagship_logo.svg', 56.6);
        add_submenu_page('flagship', __( 'Shipment', 'flagship-woocommerce-extension'), __( 'Shipment', 'flagship-woocommerce-extension'), 'manage_options', 'flagship', array($this, 'load_flagship_shipment_page'));
        add_submenu_page('flagship', __( 'Manage shipment', 'flagship-woocommerce-extension'), __( 'Manage shipment', 'flagship-woocommerce-extension'), 'manage_options', 'flagship/manage', array($this, 'load_flagship_manage_shipment_page'));

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
        $flagshipUrl = FlagshipWoocommerceShipping::getFlagshipUrl();
        $pageUri =!empty($_GET['flagship_uri']) ? $_GET['flagship_uri'] : $this->flagshipUrlMap[$pageName];
        $iframePageUrl = $flagshipUrl.'/'.$pageUri.'?iframe=true';

        echo "
        <div class='wrap'>
            <h1 class='wp-heading-inline'>FlagShip</h1>
            <iframe id='flagship_iframe' src='{$iframePageUrl}?&amp;iframe=true' style='min-height:500px' width='100%' height='100%' frameborder='0'>
            </iframe>
        </div>";
    }

    public function add_flagship_link()
    {
        global $submenu;

        $submenu['flagship'][] = array(
            sprintf(
                '<a href="%s" target="_blank">%s <span class="dashicons dashicons-external"></span></a>',
                FlagshipWoocommerceShipping::getFlagshipUrl(),
                __('Visit FlagShip site', 'flagship-woocommerce-extension'),
            ),
            "manage_options",
            "flagship\/site",
            "Visit FlagShip site"
        );
    }
}