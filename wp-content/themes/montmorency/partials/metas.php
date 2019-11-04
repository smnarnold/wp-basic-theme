<div class="meta">
  <div class="category">
    <?php echo get_the_category_list(); // Display the categories this post belongs to, as links ?>
  </div>
  <div class="tags">
    <?php echo get_the_tag_list( '| &nbsp;', '&nbsp;' ); // Display the tags this post has, as links separated by spaces and pipes ?>
  </div>
</div>