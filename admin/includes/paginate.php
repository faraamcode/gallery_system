<?php

/**
 * 
 */
class Paginate extends db_object
{

	public $current_page;
	public $max_page_num ;
	public $total_num_count;
	
	public function __construct($page=1, $max_page_num=4, $total_num_count=0)
	{

	$this->current_page =  (int)$page;
	$this->max_page_num = (int)$max_page_num;
	$this->total_num_count =(int)$total_num_count;
		# code...
	}

   public function next(){
   	return $this->current_page+1;
   }

    public function previous(){
   	return $this->current_page-1;
   }
   public function page_total(){

   	return ceil($this->total_num_count/$this->max_page_num);
   }
   public function has_previous(){
  return $this->previous()>=1 ? true : false;

   }
   public function has_next(){
  return $this->next()<=$this->page_total() ? true : false;

   }

   public function offset(){
  return ($this->current_page-1) * $this->max_page_num;

   }

}




?>