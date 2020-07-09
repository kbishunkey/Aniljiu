<?php
/**
 * Recent_Posts widget class
 *
 * @since 1.0
 *
 */
class Rocksite_Widget_Recent_Posts extends WP_Widget
{

    function __construct()
    {

        $widget_ops = array('classname' => 'rocksite-last-articles-widget', 'description' => __("The most recent posts on your site (extended contorls)", 'genui'));
        parent::__construct('rocksite-recent-posts', __('Genui Extended Recent Posts', 'genui'), $widget_ops);
        $this->alt_option_name = 'widget_recent_entries_Smartlib';

        add_action('save_post', array($this, 'flush_widget_cache'));
        add_action('deleted_post', array($this, 'flush_widget_cache'));
        add_action('switch_theme', array($this, 'flush_widget_cache'));
    }

    function widget($args, $instance)
    {

        $cache = wp_cache_get('rocksite-recent-posts', 'widget');

        $title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts', 'genui') : $instance['title'], $instance, $this->id_base);
        if (empty($instance['number']) || !$number = absint($instance['number']))
            $number = 10;
        $show_date = isset($instance['show_date']) ? $instance['show_date'] : false;
        $show_post_thumbnail = isset($instance['show_post_thumbnail']) ? $instance['show_post_thumbnail'] : false;
        $show_post_author = isset($instance['show_post_author']) ? $instance['show_post_author'] : false;

        $r = new WP_Query(apply_filters('widget_posts_args', array('posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true)));
        ?>
        <?php echo $args['before_widget']; ?>
        <?php if ($title) echo $args['before_title'] . $title . $args['after_title']; ?>
        <div class="rocksite-inside-box panel-body">
            <?php

            if ($r->have_posts()) :
                ?>

                    <?php while ($r->have_posts()) : $r->the_post(); ?>

                                <div class="rocksite-m-card -text-box">
                                    <?php
                                    if ('' != get_the_post_thumbnail() && $show_post_thumbnail) {
                                        ?>
                                    <div class="rocksite-m-card__thumbnail">
                                        <a href="<?php the_permalink() ?>"
                                           class="rocksite-m-card__thumbnail__link"><?php the_post_thumbnail('rocksite_medium_wide'); ?>
                                        </a>
                                    </div>
                                        <?php
                                    }
                                    ?>

                                <div class="rocksite-m-card__content">

                                    <h5 class="rocksite-m-card__content__title"><a
                                            href="<?php the_permalink() ?>"><?php if (get_the_title()) the_title();
                                            else the_ID(); ?></a></h5>

                                    <div class="rocksite-m-card__content__meta">
                                        <?php rocksite_action_meta_post('list', true, true) ?>
                                    </div>

                                </div>
                            </div>

                    <?php endwhile;

                    wp_reset_postdata();
                    ?>

                <?php
            endif;
            ?>
        </div>
        <?php echo $args['after_widget']; ?>
        <?php
        // Reset the global $the_post as this query will have stomped on it
        wp_reset_postdata();


        /*
                $cache[$args['widget_id']] = ob_get_flush();
                wp_cache_set( 'widget_recent_posts', $cache, 'widget' );

            */
    }

    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = (int)$new_instance['number'];
        $instance['show_date'] = (bool)isset($new_instance['show_date']) ? 1 : 0;
        $instance['show_post_thumbnail'] = (bool)isset($new_instance['show_post_thumbnail']) ? 1 : 0;
        $instance['show_post_author'] = (bool)isset($new_instance['show_post_author']) ? 1 : 0;

        $this->flush_widget_cache();

        $alloptions = wp_cache_get('alloptions', 'options');
        if (isset($alloptions['widget_recent_entries']))
            delete_option('widget_recent_entries');

        return $instance;
    }

    function flush_widget_cache()
    {
        wp_cache_delete('widget_recent_posts', 'widget');
    }

    function form($instance)
    {


        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $number = isset($instance['number']) ? absint($instance['number']) : 5;
        $show_date = isset($instance['show_date']) ? (bool)$instance['show_date'] : false;
        $show_post_thumbnail = isset($instance['show_post_thumbnail']) ? (bool)$instance['show_post_thumbnail'] : true;
        $show_post_author = isset($instance['show_post_author']) ? (bool)$instance['show_post_author'] : true;
        ?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'genui'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>"/></p>

        <p>
            <label
                for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:', 'genui'); ?></label>
            <input id="<?php echo $this->get_field_id('number'); ?>"
                   name="<?php echo $this->get_field_name('number'); ?>"
                   type="text" value="<?php echo $number; ?>" size="3"/></p>

        <p><input class="checkbox" type="checkbox" <?php checked($show_date); ?>
                  id="<?php echo $this->get_field_id('show_date'); ?>"
                  name="<?php echo $this->get_field_name('show_date'); ?>"/>
            <label
                for="<?php echo $this->get_field_id('show_date'); ?>"><?php _e('Display post date?', 'genui'); ?></label>
        </p>

        <p><input class="checkbox" type="checkbox" <?php checked($show_post_thumbnail); ?>
                  id="<?php echo $this->get_field_id('show_post_thumbnail'); ?>"
                  name="<?php echo $this->get_field_name('show_post_thumbnail', 'genui'); ?>"/>
            <label
                for="<?php echo $this->get_field_id('show_post_thumbnail'); ?>"><?php _e('Display post thumbnail?', 'genui'); ?></label>
        </p>

        <p><input class="checkbox" type="checkbox" <?php checked($show_post_author); ?>
                  id="<?php echo $this->get_field_id('show_post_author'); ?>"
                  name="<?php echo $this->get_field_name('show_post_author'); ?>"/>
            <label
                for="<?php echo $this->get_field_id('show_post_author'); ?>"><?php _e('Display post author?', 'genui'); ?></label>
        </p>
        <?php
    }
}