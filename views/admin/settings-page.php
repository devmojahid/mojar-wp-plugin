<div class="wrap">
    <h1><?php esc_html_e('My Plugin Settings', 'my-plugin'); ?></h1>
    <form method="post" action="options.php">
        <?php
        settings_fields('my_plugin_options_group');
        do_settings_sections('my-plugin-settings');
        submit_button(__('Save Settings', 'my-plugin'));
        ?>
    </form>
</div>