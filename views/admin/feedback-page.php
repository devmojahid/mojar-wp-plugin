<?php
echo '<div class="wrap">';
echo '<h1>' . esc_html__('Feedback', 'my-plugin') . '</h1>';
echo '<form method="post" action="">';
echo '<textarea name="feedback" rows="10" cols="50"></textarea>';
submit_button(__('Submit Feedback', 'my-plugin'));
echo '</form>';
echo '</div>';