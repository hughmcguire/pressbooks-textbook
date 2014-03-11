<?php if( !is_single() ){?>
	
	</div><!-- #content -->

<?php } ?>
<?php if( !is_front_page() ){?>

	<?php get_sidebar(); ?>

	</div><!-- #wrap -->
	<div class="push"></div>
	
	</div><!-- .wrapper for sitting footer at the bottom of the page -->
<?php } ?>


<div class="footer">
	<div class="inner">
		<?php if (get_option('blog_public') == '1' || is_user_logged_in()): ?>
			<?php if (is_page() || is_home( ) ): ?>
			
			<table>
				<tr>
					<td><?php _e('Book Name', 'pressbooks'); ?>:</td>
					<td><?php bloginfo('name'); ?></td>
				</tr>
				<?php global $metakeys; ?>
       			 <?php $metadata = pb_get_book_information();?>
				<?php foreach ($metadata as $key => $val): ?>
				<?php if ( isset( $metakeys[$key] ) && ! empty( $val ) ): ?>
				<tr>
					<td><?php echo $metakeys[$key]; ?></td>
					<td><?php if ( 'pb_publication_date' == $key ) { $val = date_i18n( 'F j, Y', absint( $val ) );  } echo $val; ?></td>
				<?php endif; ?>
				<?php endforeach; ?>
				</tr>
				<?php
				// Copyright
				echo '<tr><td>' . __( 'Copyright', 'pressbooks' ) . '</td><td>';
				echo ( ! empty( $metadata['pb_copyright_year'] ) ) ? $metadata['pb_copyright_year'] : date( 'Y' );
				if ( ! empty( $metadata['pb_copyright_holder'] ) ) echo ' ' . __( 'by', 'pressbooks' ) . ' ' . $metadata['pb_copyright_holder'] . '. ';
				echo "</td></tr>\n";
				?>

				</table>
				<?php endif; ?>
				<?php endif; ?>
		<p class="cie-name">
			<?php
			if ( 'http://opentextbc.ca' == esc_url( home_url() ) ) {
				_e( '<a href="http://open.bccampus.ca/find-open-textbooks/">This textbook is available for free at open.bccampus.ca</a>', 'pressbooks' );
			} else {
				_e('PressBooks.com: Simple Book Production', 'pressbooks');
			}
			?>
		</p>
	</div><!-- #inner -->
</div><!-- #footer -->
<?php wp_footer(); ?>
</body>
</html>
