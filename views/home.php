<div class="content">
	<div class="img">
		<div class="intro">
			<img src="img/biblio.jpg" class="intro__img" >
			<p class="intro__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam maxime molestiae in dignissimos dolorem. Nesciunt vero distinctio optio, vitae saepe dignissimos nulla soluta provident. Sunt nobis odio, pariatur voluptates fuga.
			</p>
		</div>
	</div>

		<div class="last">
			<h2 class="last__title"> Les derniers ajout :</h2>
		<?php if( $datas[ 'book' ] ): ?>
			<?php foreach ($datas['book'] as $book): ?>
			<div class="one">
                <a href="">
					<h3 class="last__title2">TITRE : <?php echo $book->title ?></h3>

					<?php if( $book->cover ): ?>
					            <img src="<?php echo $book->cover; ?> " alt="" class="last__img" />
					<?php endif; ?>


						<div class="last__content">
							<p class="last__text last__text--resume">

							<?php if( $book->summary ): ?>
						        <p class="summary last__text">Résumé :
						            <?php echo $book->summary; ?>
						            </p>
						        
						    <?php endif; ?>
							</p>
						</div>
				</a>
		</div>
			<?php endforeach; ?>
		<?php endif; ?>
</div>


    