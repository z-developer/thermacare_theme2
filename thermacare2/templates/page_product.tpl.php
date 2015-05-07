
<script>
    $(function () {
        $("ul.tabs").tabs("div.panes > div");

        $(".scrollbar1").mCustomScrollbar();
        $(".scrollbar2").mCustomScrollbar();
        $(".scrollbar3").mCustomScrollbar();
        $(".scrollbar4").mCustomScrollbar();
    });
</script>



    <?php print render($page['content']); ?>

<?  /* Konkurs */
    $block = module_invoke('block','block_view','3');
    print render($block['content']);
?>
