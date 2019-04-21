<?php

    /**
     * For full documentation, please visit: http://docs.reduxframework.com/
     * For a more extensive sample-config file, you may look at:
     * https://github.com/reduxframework/redux-framework/blob/master/sample/sample-config.php
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "theme_options";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        'opt_name' => 'Theme_options',
        'dev_mode' => False,
        'use_cdn' => TRUE,
        'display_name' => 'admin',
        'display_version' => FALSE,
        'page_slug' => 'metaboxes',
        'page_title' => 'Options',
        'update_notice' => TRUE,
        'intro_text' => 'You can edit content in the admin panel.',
        'footer_text' => 'All copyrights reserved',
        'menu_type' => 'menu',
        'menu_title' => 'Theme options',
        'allow_sub_menu' => TRUE,
        'page_parent_post_type' => 'your_post_type',
        'customizer' => TRUE,
        'default_mark' => '*',
        'hints' => array(
            'icon_position' => 'right',
            'icon_size' => 'normal',
            'tip_style' => array(
                'color' => 'light',
            ),
            'tip_position' => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect' => array(
                'show' => array(
                    'duration' => '500',
                    'event' => 'mouseover',
                ),
                'hide' => array(
                    'duration' => '500',
                    'event' => 'mouseleave unfocus',
                ),
            ),
        ),
        'output' => TRUE,
        'output_tag' => TRUE,
        'settings_api' => TRUE,
        'cdn_check_time' => '1440',
        'compiler' => TRUE,
        'page_permissions' => 'manage_options',
        'save_defaults' => TRUE,
        'show_import_export' => TRUE,
        'database' => 'options',
        'transient_time' => '3600',
        'network_sites' => TRUE,
    );

    

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'admin_folder' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'admin_folder' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'admin_folder' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'admin_folder' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'admin_folder' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    Redux::setSection( $opt_name, array(
        'title'  => __( 'Basic Field'),
        'id'     => 'basic',
        'desc'   => __( 'Basic field with no subsections.'),
        'icon'   => 'el el-home',
        'fields' => array(
            array(
                'id'       => 'opt-text',
                'type'     => 'text',
                'title'    => __( 'Example Text'),
                'desc'     => __( 'Example description.'),
                'subtitle' => __( 'Example subtitle.'),
            )
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title' => __( 'Basic Fields'),
        'id'    => 'basic',
        'desc'  => __( 'Basic fields as subsections.'),
        'icon'  => 'el el-home'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Info'),
        'desc'       => __( 'You can change some information' ),
        'id'         => 'info',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'phone',
                'type'     => 'text',
                'title'    => __( 'Phone number'),
                'desc'     => __( 'Put your phone number'),
                'default'  => '9930 1234 5679',
            ),
            array(
                'id'       => 'email',
                'type'     => 'text',
                'validate' => 'email',
                'title'    => __( 'Email addres'),
                'desc'     => __( 'Put your email addres here'),
                'default'  => 'contact@domain.com',
            ),
            array(
                'id'       => 'address',
                'type'     => 'text',
                'title'    => __( 'Street addres'),
                'desc'     => __( 'Put your street addres here'),
                'default'  => 'street address example',
            ),
            array(
                'id'       => 'footer',
                'type'     => 'text',
                'title'    => __( 'Footer'),
                'desc'     => __( 'Footer information'),
                'default'  => '© 2014 Kappe, All Rights Reserved',
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Social'),
        'desc'       => __( 'You can link your social media' ),
        'id'         => 'social',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'twitter',
                'type'     => 'text',
                'title'    => __( 'twitter'),
                'desc'     => __( 'Put here your twitter link'),
                'default'  => 'www.twitter.com',
            ),
            array(
                'id'       => 'inst',
                'type'     => 'text',
                'title'    => __( 'instagram'),
                'desc'     => __( 'Put here your instagram link'),
                'default'  => 'www.instagram.com',
            ),
            array(
                'id'       => 'google',
                'type'     => 'text',
                'title'    => __( 'google'),
                'desc'     => __( 'Put here your google plus link'),
                'default'  => 'https://plus.google.com/discover',
            ),
            array(
                'id'       => 'reddit',
                'type'     => 'text',
                'title'    => __( 'reddit'),
                'desc'     => __( 'Put here your reddit link'),
                'default'  => 'www.reddit.com',
            ),
            array(
                'id'       => 'github',
                'type'     => 'text',
                'title'    => __( 'github'),
                'desc'     => __( 'Put here your github link'),
                'default'  => 'www.github.com',
            ),
        )
    ) );

    /*
     * <--- END SECTIONS
     */

    Redux::setSection( $opt_name, array(
        'title' => __( 'Page edits'),
        'id'    => 'page',
        'desc'  => __( 'Basic fields as subsections.'),
        'icon'  => 'el el-home'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Women'),
        'desc'       => __( 'You can change some information' ),
        'id'         => 'woman_page',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'page_info',
                'type'     => 'text',
                'title'    => __( 'Page Info'),
                'desc'     => __( 'information about this page'),
            ),
        )
    ) );
