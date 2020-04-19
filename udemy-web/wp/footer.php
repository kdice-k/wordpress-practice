  <footer>
		<div id="footer_inner" class="cf">
			<dl id="footer_left">
				<dt><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="ロゴ"></dt>
				<dd>株式会社Campus  TEL: 000-000-000<br>〒000-0000  京都市京都区京都町00-0 町家ビル2F</dd>
			</dl>
			<div id="contact">
				<h4>お問い合わせ<span>お問い合わせおまちしております</span></h4>
				<form id="the-form">
					<textarea id="sendContent"></textarea>
					<br>
					<input id="submitBtn" type="submit" value="送信する">
					<p id="result"></p>
				</form>
			</div>
			<button id="submit">View Sitename</button>

		</div>
		<script type="text/javascript">
			jQuery(document).ready(function ($) {
				$( '#submit' ).on( 'click', function(){
    			$.ajax({
        		type: 'POST',
        		url: ajaxurl,
        		data: {
            	'action' : 'view_sitename',
        	},
        	success: function( response ){
            alert( response );
        	}
    		});
    		return false;
			});

			//formのテスト
			$('#the-form').submit(function(event) {
    		// HTMLでの送信をキャンセル
    		event.preventDefault();
 
    		// …
					// alert("送信する処理を書く");
					$("#result").html("送信中");
					$("#submitBtn").prop("disabled", true);

					let inText = $("#sendContent").val();

					$.ajax({
						type: "POST",
						dataType: "json",
						url: ajaxurl,
						data: {
							'action' : 'view_sitename',
							'name' : inText,
						},
					})
					.done(function(data){
						console.log(data);
						$("#result").html(data);
						$("#submitBtn").prop("disabled", false);
					})
					.fail(function(data){ 
						console.log("失敗");
						$("#result").html(data);
						$("#submitBtn").prop("disabled", false);
					})
				});
				return false;
			});

	    //ここに普通のjQueryの書き方で。下の行は例
    	// $("#jquery_test_wp").text("jQuery WordPress構文テスト");
/*
				$("#submitBtn").click(function(){
					// alert("送信する処理を書く");
					$("#result").html("送信中");
					$("#submitBtn").prop("disabled", true);

					let inText = $("#sendContent").val();

					$.ajax({
						type: "POST",
						dataType: "json",
						url: ajaxurl,
						data: {
							'action' : 'view_sitename',
							'name' : inText,
						},
					})
					.done(function(data){
						console.log(data);
						$("#result").html(data);
						$("#submitBtn").prop("disabled", false);
					})
					.fail(function(data){ 
						console.log("失敗");
						$("#result").html(data);
						$("#submitBtn").prop("disabled", false);
					})
				});
				return false;
    	});
*/
		</script>
	</footer>
  <?php wp_footer(); ?>
  </body>
</html>