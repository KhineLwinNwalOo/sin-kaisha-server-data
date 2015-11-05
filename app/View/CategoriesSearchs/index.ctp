 <!-- CategoriesSearchs/index -->
<?php 
$ctlHelper	= $this->CategoriesSearch;

//if (! $ctlHelper    instanceof CategoriesSearchHelper)  throw new RuntimeException(__DIR__ . ':' . __FILE__ . ':' . __LINE__);
if (!isset($dataPaginate))						throw new RuntimeException(__DIR__ . ':' . __FILE__ . ':' . __LINE__);
if (!$ctlHelper instanceof CategoriesSearchHelper)	throw new RuntimeException(__DIR__ . ':' . __FILE__ . ':' . __LINE__);
$ctlHelper->setDataPaginate($dataPaginate);
// ログインフォーム
$formStart	= $ctlHelper->getFormStart();
$formEnd	= $ctlHelper->getFormEnd();

?>
<?php
// 検索フォーム
$linkCategoriesSearch				= $ctlHelper->getLinkCategoriesSearch		();
$linkCategoriesCreate				= $ctlHelper->getLinkCategoriesCreate		();
$linkCategoriesEdit				    = $ctlHelper->getLinkCategoriesEditButtom	();
$PaginatorBigCategoryName			= $ctlHelper->getPaginatorBigCategoryName	();
$PaginatorMiddleCategoryName		= $ctlHelper->getPaginatorMiddleCategoryName();
$PaginatorSmallCategoryName			= $ctlHelper->getPaginatorSmallCategoryName	();
$PaginatorContentName				= $ctlHelper->getPaginatorContentName       ();
$paginatorCounter					= $ctlHelper->getPaginatorCounter           ();
$paginatorLinks						= $ctlHelper->getPaginatorLinks             ();
$linkLogout							= $ctlHelper->getLinkLogout					();
?>
 
<div class="index">
<h2>事業目的検索</h2>
<?php echo $formStart; $count=0;?>
<table cellpadding="0" cellspacing="0" border="0">
		<tr>
			<th><?php echo $PaginatorContentName; ?> </th>
			<th colspan="3"> </th>
		
			<th class="actions">操作</th>
		</tr> 
                <?php  for($i=0;$i<$ctlHelper->getDataPaginateCount();$i++){ 
					$valueContents					= $ctlHelper->getvalueContents					    ($i);
                    $valueContentsId				= $ctlHelper->getvalueContentsId				    ($i);
					$valueContentsBigName           = $ctlHelper->getvalueContentsBigName				($i);
					$valueContentsMidName           = $ctlHelper->getvalueContentsMidName				($i);
					$valueContentsMinName           = $ctlHelper->getvalueContentsMinName				($i);
                    $LinkCategoriesEdit				= $ctlHelper->getLinkCategoriesEdit					($i);
                    $LinkCategoriesDelete			= $ctlHelper->getLinkCategoriesDelete				($i);
                  ?>
        <tr>	
			<td>
				<?php echo $valueContents;?>  
			</td>
			<td class="actions" rowspan="2" colspan="3"> </td>
			<td class="actions"  rowspan="2" style="vertical-align: center;"> 
			<?php echo $LinkCategoriesEdit; ?>	<?php echo $LinkCategoriesDelete;?>
			</td>
		</tr>
		<tr>
			<td colspan="5"> <?php echo $valueContentsBigName.">".$valueContentsMidName.">".$valueContentsMinName;  ?></td>
		</tr>
                <?php } ?>
</table>
<p><?php echo $paginatorCounter; ?></p>
<div class="paging"><?php echo $paginatorLinks; ?></div>
</div>
 <?php 
 $inputSearchBigCatagories             = $ctlHelper->getSearchBigCategoriesName	();
 $inputSearchMidCatagories             = $ctlHelper->getSearchMidCategoriesName	();
 $inputSearchMinCatagories             = $ctlHelper->getSearchMinCategoriesName	();
 $inputSearchContent				   = $ctlHelper->getSearchContent        	();
 $SearchSubmit						   = $ctlHelper->getSearchSubmitConf		();
 ?>
<div class="actions">
	<h3>検索</h3>
	<?php echo $formStart; ?>
        <table border="0" >
			<tr>
				<td><font size="1.5">大カテゴリ </font> </td>     
				<td><select class="datacategory" name="big_id_2" id="big_dropdown_2" style="width:140px;">
					<option value="">▼選択してください</option>
					</select>
				</td>           	
			</tr>
			<tr>
				<td><font size="1.5">中カテゴリ</font></td>     
				<td><select class="datacategory" name="mid_id" id="mid_dropdown_2" style="width:140px;" >
					<option value="">▼選択してください</option>
					</select>
				</td>           	
			</tr>
			<tr>
				<td><font size="1.5">小カテゴリ</font>  </td>     
				<td><select class="datacategory" name="min_id" id="min_dropdown_2" style="width:140px;">
					<option value="">▼選択してください</option>
					</select></td>      
			</tr>
			<tr>
                <td><?php echo $SearchSubmit; ?></td>
            </tr>
        </table>
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
	<?php echo $formEnd; ?>
</div>
 <script>(function($) {

		var elBigCat_2					= '#big_dropdown_2';
		var elMidCat_2					= '#mid_dropdown_2';
		var elMinCat_2					= '#min_dropdown_2';	
		//var elContentCategoryInsert		= '#Content_category_insert';
		//var elContentCategory			= '#contentsdata';
		$("input[type=text]").val("");

		var url		= '/BigCategoryCreates/big_category/';
		$(elBigCat_2).html('<option value="">検索中 ... </option>');
		$(elBigCat_2).load(url);
		
		
		$(elBigCat_2).change(function(){
			var Bigid = $(this).val();
			if (Bigid) {
				var url = '/MidCategoryCreates/mid_category/' + escape(Bigid);
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
            var url = '/MinCategoryCreates/min_category/' + escape(Midid);
            $(elMinCat_2).html('<option value="">検索中 ... </option>');
            $(elMinCat_2).load(url);
        } else {
            $(elMinCat_2).html('<option value="">▼選択してください</option>');
        }	
    });
    $(elMidCat_2).change();
		
			
 })(jQuery);
</script>
