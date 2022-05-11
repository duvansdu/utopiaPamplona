
 <?php
 if($_SESSION['utopiadesing']){
	$pie = ('
	</div>
		<script src="./assets/js/generales.js?%s" type="module"></script>
	</body>
	</html>
	');
 }else{
	$pie=('');
 }
 printf($pie,$valor);
 ?>