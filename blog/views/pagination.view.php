<?php
    $quantityPages = getQuantityPage($dbConnection);
    $previousPage = (($currentPage - 1) >= 1) ? $currentPage - 1 : -1;
    $nextPage = (($currentPage + 1) <= $quantityPages) ? $currentPage + 1 : -1;
?>

<?php if ($quantityPages >= 1 && $blogs): ?>
<div class="pagination-content">
    <ul>
        <!-- Create previous button -->
        <?php if ($currentPage === 1): ?>
        <li class="disabled"><a href="#">
        <?php else: ?>
        <li><a href="<?php echo $paginationLink . ($currentPage - 1); ?>">
        <?php endif; ?>
        <i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>

        <!-- Create page number buttons, maximum numbers to show are three -->
        <?php if ($previousPage !== -1): ?>
            <li><a href="<?php echo $paginationLink . $previousPage; ?>"><?php echo $previousPage; ?></a></li>
        <?php endif; ?>

        <li class="active"><a><?php echo $currentPage; ?></a></li>

        <?php if ($nextPage !== -1): ?>
            <li><a href="<?php echo $paginationLink . $nextPage; ?>"><?php echo $nextPage; ?></a></li>
        <?php endif; ?>

        <!-- Create next button -->
        <?php if ($currentPage === $quantityPages): ?>
        <li class="disabled"><a href="#">
        <?php else: ?>
        <li><a href="<?php echo $paginationLink . ($currentPage + 1); ?>">
        <?php endif; ?>
        <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
    </ul>
</div>
<?php endif; ?>
