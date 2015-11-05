<?php 

App::uses('AppToConvert', 'Lib/Convert');
//App::uses('MstUserGroup', 'Model');

class CategoriesCreateToTblMidCategory extends AppToConvert {

	/**
	 * OrmModel Save Data
	 * @return array
	 */
	
	public function getSaveData() {
		$convert	= $this;
		$ctlAlias	= $convert->ctlAlias;
		$ormAlias	= $convert->ormAlias;
		$ctlData	= $convert->ctlData;
		$big_category_id = $ctlData['big_id'];				
		if($big_category_id){
			for($i = 1 ;$i < 4 ;$i++){ 			
				$midCatname = 'middlecategory_name_'. $i; 
				$mid_Catname = $ctlData[$ctlAlias][$midCatname];
				if($mid_Catname){
					$saveData = array(
						$ormAlias => array(
							'tbl_big_category_id'		=> $ctlData['big_id'],
							'name'						=> $ctlData[$ctlAlias][$midCatname],
							'sort'						=> '2300',
							'tbl_content_count'			=> '1',
							'tbl_content_count_all'		=> '1',
					
						)
					);
					debug($saveData);
				}				
			}
			return $saveData;
		}
	}
}
//	public function getSaveData() {
//	
//		$convert	= $this;
//		$ctlAlias	= $convert->ctlAlias;
//		$ormAlias	= $convert->ormAlias;
//		$ctlData	= $convert->ctlData;
//		//$tblTblMidCategory = self::getTblMidCategory($ctlData, $ctlAlias);
//		$saveDataHasMany = array();
//			for ($i = 1, $cnt = 4; $i < $cnt; $i++) {
//			
//			$field = 'middlecategory_name_'. $i; 
//			if (!isset($ctlData[$ctlAlias][$field])) {
//				debug($i);
//				continue;
//			}
//			$saveDataHasMany[] = array(
//						$ormAlias => array(
//							'tbl_big_category_id'		=> $ctlData['big_id'],
//							'name'						=> $ctlData[$ctlAlias][$field],
//							'sort'						=> '2300',
//							'tbl_content_count'			=> '1',
//							'tbl_content_count_all'		=> '1',
//							)
//			);
//					return $saveDataHasMany;
//			}
//			 
//	}
////		$saveData = array(
////			// HasMany
////			'TblMidCategory'	=> $tblTblMidCategory,
////		);
////		//return $saveData;
////	}
////	private static function getTblMidCategory(array $ctlData, $ctlAlias) {
////		$saveDataHasMany = array();
////		for ($i = 1, $cnt = 4; $i < $cnt; $i++) {
////			
////			$field = 'middlecategory_name_'. $i; 
////			if (!isset($ctlData[$ctlAlias][$field])) {
////				debug($i);
////				continue;
////			}
////
////			$saveDataHasMany[] = array(
////				'tbl_big_category_id'		=> $ctlData['big_id'],
////				'name'						=> $ctlData[$ctlAlias][$field],
////				'sort'						=> '2300',
////				'tbl_content_count'			=> '1',
////				'tbl_content_count_all'		=> '1',
////				'created'					=> 'NULL',
////				'updated'					=> 'NULL',
////			);
////		}
////		return $saveDataHasMany;
////		
////	}
//}
////		$tblmidCategory = self::getmidCategory($ctlData, $ctlAlias,$ormAlias);
////		//debug($tblmidCategory);
////		if($big_category_id){
////			for($i = 0 ;$i < 3 ;$i++){ 
//////				debug($i);
//////				$dataname= "middlecategory_name_". $i; 
//////				
//////				if($dataname){
////					//debug($ctlData[$ctlAlias][$dataname]);
////					$saveData = array(
////						$ormAlias => $tblmidCategory[$i],
//////							'tbl_big_category_id'		=> $ctlData[$ctlAlias]['tbl_big_category_id'],
//////							'name'						=> $tblmidCategory[$i], //$ctlData[$ctlAlias][$dataname],
//////							
//////							'sort'						=> '2300',
//////							'tbl_content_count'			=> '1',
//////							'tbl_content_count_all'		=> '1',
//////							'created'					=> 'NULL',
//////							'updated'					=> 'NULL',
//////						)
////					);
////					return $saveData;
////				}
////				
////			//}
////			
////		}
////		
////	}	
////	
////	private static function getmidCategory(array $ctlData, $ctlAlias,$ormAlias) {
////		$result = array();
////		//$prefix = uniqid();
////		for ($i = 1, $cnt = 4; $i < $cnt; ++$i) {
////			$dataname= "middlecategory_name_". $i; 
////			
////			$result[] =array(//$ormAlias => array(
////							'tbl_big_category_id'		=> $ctlData[$ctlAlias]['tbl_big_category_id'],
////							'name'						=> $ctlData[$ctlAlias][$dataname],
////							
////							'sort'						=> '2300',
////							'tbl_content_count'			=> '1',
////							'tbl_content_count_all'		=> '1',
////							'created'					=> 'NULL',
////							'updated'					=> 'NULL',
////						);
//////$ctlData[$ctlAlias][$dataname] ;
////		}
////		//debug($result);
////		return $result;
////	}
//	
//	
