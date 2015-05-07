<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to main-menu administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 */
?>

<div class="container">
    <div class="header">
        <a class="logo" href="/"><img src="<? print $logo; ?>" width="100%" height="100%" alt=""/></a>
        <img class="slogan" src="/<?=$directory?>/images/slogan.png" width="100%" height="100%" alt=""/>
      
        <form class="search" action="/" method="post" id="search-block-form" accept-charset="UTF-8">
            <input type="text" placeholder="поиск по сайту" id="edit-search-block-form" name="search_block_form" value="<?=$_POST['search_block_form']?>" />
            <a id="search_button" class="search-submit" onclick="SearchGo();"></a>
        </form>    
    <script>
        var formobj = document.getElementById("search-block-form");
        formobj.addEventListener( "onsubmit", SearchGo() );
        
        
        function SearchGo()
        {
            var str = document.getElementById("edit-search-block-form").value;
            if( str.length < 3 )
            {
                return;
            }
            document.location.href = '/?q=search/node/'+str;
        }
    </script>
    </div>
<?php 
    $main_menu_tree = menu_tree(variable_get('menu_main_links_source', 'main-menu'));
?>
<div class="mobile-nav">
<div class="mobile-nav-btn">Меню</div>
<ul class="main-nav">
<?
    foreach( $main_menu_tree as $mItem )
    {        
        $title = @$mItem['#title'];
        $url = @$mItem['#href'];
        
        $alias = drupal_get_path_alias( $url );

        if( strpos( $url, 'node' ) !== false )
        {
            $url = '/?q='.$url;
        }
        
        if ( $alias != '' )
        {
            $url = '/'.$alias;
        }
        
        $below = @$mItem['#below'];
        if( !$title ) { continue; }
        
        if( $title != 'Поделиться' ) //Share
        {
            echo '<li> <a class="main-nav-a '.($below?'sub':'').'" href="'.$url.'">'.$title.'</a>';
        }
        else
        {
            echo '<li> <a href="" class="main-nav-a share-btn">'.$title.'</a>';
        }
        
        if ( $below )
        {
            echo '<ul class="sub-nav">';
            
            foreach ( $below as $subItem )
            {
                $sub_title = @$subItem['#title'];
                $sub_url = @$subItem['#href'];
                $sub_desc = @$subItem['#localized_options']['attributes']['title'];
                
/*                
                echo '<pre>';
                print_r($subItem['#href']);
                echo '</pre>';
*/                
                switch( $subItem['#href'] )
                {
                    case 'node/136':{ $sub_img ='boli_1.png'; break;}
                    case 'node/146':{ $sub_img ='boli_2.png'; break;}
                    case 'node/141':{ $sub_img ='boli_3.png'; break;}
                    case 'node/151':{ $sub_img ='boli_4.png'; break;}
                    
                    case 'node/61':{ $sub_img ='pic5.png'; break;}
                    case 'node/91':{ $sub_img ='pic8.png'; break;}
                    case 'node/86':{ $sub_img ='pic6.png'; break;}
                    case 'node/66':{ $sub_img ='pic7.png'; break;}
                    case 'node/76':{ $sub_img ='pic10.png'; break;}
                    
                    case 'node/41':{ $sub_img ='test.png'; break;}
                    case 'node/166':{ $sub_img ='fizicheskiy.png'; break;}
                    case 'node/81':{ $sub_img ='komplex.png'; break;}
                    
                    default: { $sub_img = ''; }
                }
                
                $alias_sub = drupal_get_path_alias( $sub_url );
                $sub_url = '/?q='.$sub_url;
                if ( $alias_sub != '' )
                {
                    $sub_url = '/'.$alias_sub;
                }

                if( $sub_title == '' ) continue;
                
                echo '
                <li>
                    <a href="'.$sub_url.'"><img src="/sites/g/files/g10021546/f/201504/'.$sub_img.'" width="121" height="85" alt=""/></a>
                    <p class="text">
                        <a href="'.$sub_url.'"><span>'.$sub_title.'</span></a>
                        '.$sub_desc.'
                    </p>
                    <a class="more-btn" href="'.$sub_url.'">подробнее</a>
                    <div class="clear"></div>
                </li>
                ';
            }
            echo '</ul>';
        }
    }
?>
</ul>
</div>  

<div class="content">

<?
/*
    echo '<pre>';
    print_r($variables['page']['sidebar_first']['search_form']);
    echo '</pre>';
*/
?>

    <?php if ($is_front): ?>

    <? /* Short Link */
        $block = module_invoke('block','block_view','21'); //4
        print render( $block['content'] );
    ?>

    <?  /* Slider */
        $block = module_invoke('block','block_view','26'); //5
        print render( $block['content'] );
    ?> 

    <?  /* Konkurs */
        $block = module_invoke('block','block_view','16'); //3
        print render($block['content']);
    ?>
    
    <?php else : ?>
    
    <?
        if( arg(0) == 'node' && in_array( arg(1), array(36, 61, 66)) ) //2,11
        {
            include('page_product.tpl.php');
        }
        else
        {
    ?>

        <div class="page-title"><?= isset($node) ? $node->title:'' ?></div>
        <div class="page-content">
            <?php /*print isset($node) ? $node->body['und'][0]['value'] : ''; */?>
            
            <?php print render($page['content']); ?>
        </div>
        <div class="ads toRight">
        <?
            $bannerArr = array(0, 6, 36, 41, 46, 51, 56, 61, 66, 71);
            $cont = render($page['content']);
            $BannerPos = strpos($cont, '#banner');
            if( $BannerPos !== false )
            {
                $bannerNum = substr($cont, $BannerPos+7, 1);
                $bannerID = $bannerArr[$bannerNum];
            }
            else
            {
                $bannerID = 71;
            }
            
            $block = module_invoke('block','block_view',$bannerID);
            print render($block['content']);
        ?>
        </div> 
        <? } ?>
    <?php endif; ?>
 
   
</div>
<div class="footer">
<?php
/*
$block = block_load('block', 1); // выводим блок с ID 1
$output = drupal_render(_block_get_renderable_array(_block_render_blocks(array($block))));
print $output;
*/
//        echo $page['footer']['block_1']['#markup'];

        $block = module_invoke('block','block_view','1');
        print render($block['content']);
     ?>
     </div>
    <div class="warningdiv">
<?
    $block = module_invoke('block','block_view','11');
    print render( $block['content'] );
?>
    </div>
    
    <?  /* Soc Icons */
        $block = module_invoke('block','block_view','31');
        print render($block['content']);
    ?>
    
</div>

