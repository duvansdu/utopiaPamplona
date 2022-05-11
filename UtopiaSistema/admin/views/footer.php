
 <?php
 if($_SESSION['utopia']){
	$pie = ('
	</div>
	</body>
	</html>
	');
 }else{
	$pie=('');
 }
 printf($pie,$valor);
 ?>