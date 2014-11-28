<?php
	$presenter = new PagePresenter($paginator);

	$trans = $environment->getTranslator();
?>

<?php if ($paginator->getLastPage() > 1): ?>
	
		<?php
			echo $presenter->getPrevious(Lang('pagination.previous'));

			echo $presenter->getNext(Lang('pagination.next'));
		?>
	
<?php endif; ?>