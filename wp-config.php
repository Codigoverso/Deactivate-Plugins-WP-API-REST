<?php 

// Desactivar plugins durante las solicitudes a la API REST
if (defined('REST_REQUEST') && REST_REQUEST) {
    add_filter('option_active_plugins', 'disable_plugins_on_rest_api');

    function cv_disable_plugins_on_rest_api($plugins) {
        // Lista de plugins a desactivar
        $plugins_to_disable = [
            'woocommerce/woocommerce.php', // Desactiva WooCommerce
            // Añade otros plugins que quieras desactivar
        ];

        foreach ($plugins_to_disable as $plugin) {
            if (($key = array_search($plugin, $plugins)) !== false) {
                unset($plugins[$key]);
            }
        }
        return $plugins;
    }
}
