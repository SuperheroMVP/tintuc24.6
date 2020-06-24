<?php

// Mở composer.json
// Thêm vào trong "autoload" chuỗi sau
// "files": [
//         "app/function/function.php"
// ]

// Chạy cmd : composer  dumpautoload
use App\ProductCategory;
use App\PostCategory;
use App\Post;
use App\Product;
use App\Artices_Tags;
use App\Comment;
function changeTitle($str,$strSymbol='-',$case=MB_CASE_LOWER){// MB_CASE_UPPER / MB_CASE_TITLE / MB_CASE_LOWER
	$str=trim($str);
	if ($str=="") return "";
	$str =str_replace('"','',$str);
	$str =str_replace("'",'',$str);
	$str = stripUnicode($str);
	$str = mb_convert_case($str,$case,'utf-8');
	$str = preg_replace('/[\W|_]+/',$strSymbol,$str);
	return $str;
}

function stripUnicode($str){
	if(!$str) return '';
	//$str = str_replace($a, $b, $str);
	$unicode = array(
		'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ|å|ä|æ|ā|ą|ǻ|ǎ',
		'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ|Å|Ä|Æ|Ā|Ą|Ǻ|Ǎ',
		'ae'=>'ǽ',
		'AE'=>'Ǽ',
		'c'=>'ć|ç|ĉ|ċ|č',
		'C'=>'Ć|Ĉ|Ĉ|Ċ|Č',
		'd'=>'đ|ď',
		'D'=>'Đ|Ď',
		'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|ë|ē|ĕ|ę|ė',
		'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ|Ë|Ē|Ĕ|Ę|Ė',
		'f'=>'ƒ',
		'F'=>'',
		'g'=>'ĝ|ğ|ġ|ģ',
		'G'=>'Ĝ|Ğ|Ġ|Ģ',
		'h'=>'ĥ|ħ',
		'H'=>'Ĥ|Ħ',
		'i'=>'í|ì|ỉ|ĩ|ị|î|ï|ī|ĭ|ǐ|į|ı',	  
		'I'=>'Í|Ì|Ỉ|Ĩ|Ị|Î|Ï|Ī|Ĭ|Ǐ|Į|İ',
		'ij'=>'ĳ',	  
		'IJ'=>'Ĳ',
		'j'=>'ĵ',	  
		'J'=>'Ĵ',
		'k'=>'ķ',	  
		'K'=>'Ķ',
		'l'=>'ĺ|ļ|ľ|ŀ|ł',	  
		'L'=>'Ĺ|Ļ|Ľ|Ŀ|Ł',
		'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|ö|ø|ǿ|ǒ|ō|ŏ|ő',
		'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ|Ö|Ø|Ǿ|Ǒ|Ō|Ŏ|Ő',
		'Oe'=>'œ',
		'OE'=>'Œ',
		'n'=>'ñ|ń|ņ|ň|ŉ',
		'N'=>'Ñ|Ń|Ņ|Ň',
		'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|û|ū|ŭ|ü|ů|ű|ų|ǔ|ǖ|ǘ|ǚ|ǜ',
		'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự|Û|Ū|Ŭ|Ü|Ů|Ű|Ų|Ǔ|Ǖ|Ǘ|Ǚ|Ǜ',
		's'=>'ŕ|ŗ|ř',
		'R'=>'Ŕ|Ŗ|Ř',
		's'=>'ß|ſ|ś|ŝ|ş|š',
		'S'=>'Ś|Ŝ|Ş|Š',
		't'=>'ţ|ť|ŧ',
		'T'=>'Ţ|Ť|Ŧ',
		'w'=>'ŵ',
		'W'=>'Ŵ',
		'y'=>'ý|ỳ|ỷ|ỹ|ỵ|ÿ|ŷ',
		'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ|Ÿ|Ŷ',
		'z'=>'ź|ż|ž',
		'Z'=>'Ź|Ż|Ž'
	);
	foreach($unicode as $khongdau=>$codau) {
		$arr=explode("|",$codau);
		$str = str_replace($arr,$khongdau,$str);
	}
	return $str;
}

function cate_parent($data,$parent_id=0,$str="",$select=0){
	foreach ($data as $key => $item) {
		if ($item['ParentID'] == $parent_id)
		{
			if($select!=0 && $item['id']==$select)
			{
				echo'<option value="'.$item->id.'" selected="selected" >'.$str.$item->Name.'</option>'; 
			}
			else
			{
				echo'<option value="'.$item->id.'">'.$str.$item->Name.'</option>';
			}
			
			// Xóa chuyên mục đã lặp
            unset($data[$key]);
            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            cate_parent($data, $item['id'], $str.' --',$select);
		}

		
	}
	
}

    function delete_cate_parent($data,$parent_id)
    {
        foreach ($data as $key => $item) 
        {
            if ($item['ParentID'] == $parent_id)
            {
               $find_img =Product::where('ProductCategoryId',$item['id'])->get();

	               foreach($find_img as $img_delete)
	               {
	                 unlink("public/upload/product/".$img_delete->Image);

	                }
                $delete_id =ProductCategory::where('id',$item['id'] )->get()->each->delete();
                // Xóa chuyên mục đã lặp
                unset($data[$key]);
                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                delete_cate_parent($data, $item['id']);
                        
            }

            
        }
  
    }
    function delete_cate_parent_post($data,$parent_id)
    {
    
        foreach ($data as $key => $item) 
        {
        	////xoa anh thuoc thu muc goc có con
            if ($item['ParentID'] == $parent_id)
            {
            	
               $find_img =Post::where('PostCategory',$item['id'])->get();

              // dd($find_img);
               foreach($find_img as $img_delete)
               {
                  unlink("public/upload/post/".$img_delete->Image);
                
               	//echo($img_delete->Image);
               	    $find_comment =Comment::where('idPost',$img_delete->id)->get();
                    //dd($find_comment);
                    foreach($find_comment as $find_cmt)
                   {
                    
                    $find_cmt->delete();
       

                    }

                }
                 $delete_id =PostCategory::where('id',$item['id'] )->get()->each->delete();
                // Xóa chuyên mục đã lặp
                unset($data[$key]);
                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                delete_cate_parent_post($data, $item['id']);
                        
            }

            
        }

  
    }


    function PagesShowCategories($categories, $parent_id = 0, $char = '')
	{
	    // BƯỚC 2.1: LẤY DANH SÁCH CATE CON
	    $cate_child = array();
	    foreach ($categories as $key => $item)
	    {
	        // Nếu là chuyên mục con thì hiển thị
	        if ($item['ParentID'] == $parent_id)
	        {
	            $cate_child[] = $item;
	            unset($categories[$key]);
	        }
	    }
	     
	    // BƯỚC 2.2: HIỂN THỊ DANH SÁCH CHUYÊN MỤC CON NẾU CÓ
	    if ($cate_child)
	    {
	        
	        foreach ($cate_child as $key => $item)
	        {
	            // Hiển thị tiêu đề chuyên mục
                echo '<li>';
                    echo  '<li class="menu-item"><a href="'."muc-san-pham"."/".$item->id."/".$item->Slug.".html".'" title=""><span>'.$item->Name.'</span></a></li>';
                echo '</li>';
	             
	            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
	            PagesShowCategories($categories, $item['id'], $char.'|---');
	            
	        }
	        ;
	    }
	}

?>

