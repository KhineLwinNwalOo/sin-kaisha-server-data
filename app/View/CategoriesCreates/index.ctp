
 <!-- CategoriesCreates/index -->
<?php 
$ctlHelper	= $this->CategoriesCreate;
//if (!isset($dataPaginate))						throw new RuntimeException(__DIR__ . ':' . __FILE__ . ':' . __LINE__);
if (!$ctlHelper instanceof CategoriesCreateHelper)	throw new RuntimeException(__DIR__ . ':' . __FILE__ . ':' . __LINE__);

?>

<style	type="text/css">
	.datacategory{width: 300px;height:20px;}
</style>
<?php
// 検索フォーム
$formStart                      = $ctlHelper->getFormStart						();
$linkCategoriesSearch		    = $ctlHelper->getLinkCategoriesSearch			();
$linkCategoriesCreate		    = $ctlHelper->getLinkCategoriesCreate			();
$linkCategoriesEdit				= $ctlHelper->getLinkCategoriesEditButtom		();
$linkLogout			            = $ctlHelper->getLinkLogout		                ();
$formEnd			            = $ctlHelper->getFormEnd                        ();

?>
 

<div class="form">
	<h2>事業目的登録</h2>
	<?php echo $formStart; ?>
	<div id="bigcategory"></div>
	<div id="midcategory"></div>
	<div id="mincategory"></div>
	<div id="contentsdata"></div>
	<script>(function($) {
		$('#bigcategory').load('/BigCategoryCreates/index');
		$('#midcategory').load('/MidCategoryCreates/index');
		$('#mincategory').load('/MinCategoryCreates/index');
		$('#contentsdata').load('/ContentsCreates/index');
	})(jQuery);</script>
	
	
</div>
<div class="actions">
	<h3>操作</h3>
        <table>
            <tr>
                <h3 class="title">メニュー</h3>
            </tr>
            <tr>
                <th><?php echo $linkCategoriesSearch; ?></th>
            </tr>
            <tr>
                <th><?php echo $linkCategoriesCreate; ?></th>
            </tr>
			<tr>
                <th><?php echo $linkCategoriesEdit; ?></th>
            </tr>
            <tr>
                <td class="actions">アカウント管理</td>
            </tr>
            <tr>
                <td class="actions">アカウント登録</td>
            </tr>
            <tr>
		<th><?php echo $linkLogout; ?></th>
            </tr>
        </table>
</div> 
 
 <?php echo $formEnd; ?>
<script>(function($) {
		var elBigCat					= '#big_dropdown';
		var elBigCat_1					= '#big_dropdown_1';
		var elMidCat_1					= '#mid_dropdown_1';
		
		var elBigCat_2					= '#big_dropdown_2';
		var elMidCat_2					= '#mid_dropdown_2';
		
		var elMinCat_2					= '#min_dropdown_2';
		var elBigCategoryInsert			= '#big_category_insert';
		var elbigCategoryval			= '#CategoriesCreateBigcategoryName';
		var elMidCategoryInsert			= '#mid_category_insert';
		var elmidCategoryval			= '#CategoriesCreateMiddlecategoryName';
		var elMidCategory				= '#midcategory';	
		var elSmallCategoryInsert		= '#small_category_insert';
		var elSmallCategory				= '#smallcategory';	
		var elContentCategoryInsert		= '#Content_category_insert';
		var elContentCategory			= '#contentsdata';
		 $("input[type=text]").val("");
		var url = '/CategoriesCreates/big_category/';
		$(elBigCat).html('<option value="">検索中 ... </option>');
		$(elBigCat).load(url);
		$(elBigCat_1).load(url);
		$(elBigCat_2).load(url);
		
		$(elBigCat_1).change(function(){
			var Bigid = $(this).val();
			if (Bigid) {
				var url = '/CategoriesCreates/mid_category/' + escape(Bigid);
				$(elMidCat_1).html('<option value="">検索中 ... </option>');
				$(elMidCat_1).load(url);
			} else {
				$(elMidCat_1).html('<option value="">▼選択してください</option>');
			}	
		});
		$(elBigCat_1).change();
		
		
		$(elBigCat_2).change(function(){
			var Bigid = $(this).val();
			if (Bigid) {
				var url = '/CategoriesCreates/mid_category/' + escape(Bigid);
				$(elMidCat_2).html('<option value="">検索中 ... </option>');
				$(elMidCat_2).load(url);
				$(elMinCat_2).html('<option value="">▼選択してください</option>');
			} else {
				$(elMidCat_2).html('<option value="">▼選択してください</option>');
				$(elMinCat_2).html('<option value="">▼選択してください</option>');
			}	
		});
		$(elBigCat_2).change();
		
		 $(elMidCat_2).change(function(){
        var Midid = $(this).val();
        if (Midid) {
            var url = '/CategoriesCreates/min_category/' + escape(Midid);
            $(elMinCat_2).html('<option value="">検索中 ... </option>');
            $(elMinCat_2).load(url);
        } else {
            $(elMinCat_2).html('<option value="">▼選択してください</option>');
        }	
    });
    $(elMidCat_2).change();
		
		<?php /** big Category **/?>
		$(elBigCategoryInsert).click(function(){alert('a');
			var bigcategory_val = {};	
			var action = '/CategoriesCreates/bigcategoryinsert';
			var name=$(elbigCategoryval).attr('name');
			var big_name = $(elbigCategoryval).val();
				bigcategory_val[name] = big_name;
			
			$.ajax({
				url: action,
				type: 'post',
				data: bigcategory_val,
				dataType: 'html',
				success: function(d, t, x) { 
//					$('#CategoriesCreateIndexForm').submit();
				},
			
				error: function(x, t, e) {
					alert('大カテゴリ名前は同じです。');


					var tmp = location.href;
					location.href = tmp;
				}
			
			});
		});
	
		$(elMidCategoryInsert).click(function(){
				var midcategory_val = {};
				var action = '/CategoriesCreates/midcategoryinsert';
			
				$(elMidCategory).find(':input[type!=button]').each(function() {  
					var mid_val = $(this).val();
					var mid_name = $(this).attr('name');
						midcategory_val[mid_name] = mid_val;

				});
			
				$.ajax({
					url: action,
					type: 'post',
					data: midcategory_val,
					dataType: 'html',
					success: function(d, t, x) { 
						//$('#CategoriesCreateIndexForm').submit();
					},

					error: function(x, t, e) {
						alert('中カテゴリ名前は同じです。');


						var tmp = location.href;
						location.href = tmp;
					}

				});
		});
		
		<?php /** small Category **/?>
			
//		$(elSmallCategoryInsert).click(function(){
//			
//			var smallcategory_val = {};
//			var action = '/CategoriesCreates/smallcategoryinsert';
//			$(elSmallCategory).find(':input[type!=button]').each(function() {  
//			var small_val = $(this).val();
//					var small_name = $(this).attr('name');
////						smallcategory_val[small_name] = small_val;
//			});
//			
//			$.ajax({
//					url	: action,
//					type: 'post',
//					data: smallcategory_val,
//					dataType: 'html',
//					success: function(d, t, x) { 
////						$('#CategoriesCreateIndexForm').submit();
//					},
//
//					error: function(x, t, e) {
//						alert('小カテゴリ名前は同じです。');
//
//						var tmp = location.href;
//						location.href = tmp;
//					}
//
//				});
//			
//			
//		});
//		
//		$(elContentCategoryInsert).click(function(){
//			var contentcategory_val ={};
//			var action = '/CategoriesCreates/contentcategoryinsert';
//			$(elContentCategory).find(':input[type!=button]').each(function() {  
//			var content_val = $(this).val();
//					var content_name = $(this).attr('name');
//					if (content_val) {
//						contentcategory_val[content_name] = content_val;
//						//alert(contentcategory_val[small_name]);
//					}
//			});
//			
//			$.ajax({
//					url	: action,
//					type: 'post',
//					data: contentcategory_val,
//					dataType: 'html',
//					success: function(d, t, x) { 
////						$('#CategoriesCreateIndexForm').submit();
//					},
//
//					error: function(x, t, e) {
//						alert('事業目的名前は同じです。');
//
//						var tmp = location.href;
//						location.href = tmp;
//					}
//
//				});
//			
//			
//		});
		
			
 })(jQuery);
</script>