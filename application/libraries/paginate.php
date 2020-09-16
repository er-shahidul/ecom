<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paginate {
	
	function pagination( $url, $count, $link, $limit = 10, $page = 1 ) {
		$targetpage = base_url() . $url;
		$total_pages = $count;
		$stages = 3;
		$page2 = $page;
		if( $page2 ) $start = ( $page2 - 1 ) * $limit;
		else $start = 0;
		
		// Initial page num setup
		if( $page2 == 0 ) $page2 = 1;
		$prev = $page2 - 1;
		$next = $page2 + 1;
		$lastpage = ceil( $total_pages / $limit );
		$LastPagem1 = $lastpage - 1;
		
		$paginate = '';
		if( $lastpage > 1 ) {
			$paginate .= "<div class='paginate'>";
			// Previous
			if( $page2 > 1 ) $paginate .= "<a href='$targetpage/$prev$link'>previous</a>";
			else $paginate .= "<span class='disabled'>previous</span>";
			// Pages
			if( $lastpage < 7 + ( $stages * 2 ) ) {	// Not enough pages to breaking it up
				for( $counter = 1; $counter <= $lastpage; $counter++ ) {
					if( $counter == $page2 ) $paginate .= "<span class='current'>$counter</span>";
					else $paginate .= "<a href='$targetpage/$counter$link'>$counter</a>";
				}
			}
			elseif( $lastpage > 5 + ( $stages * 2 ) ) {	// Enough pages to hide a few?
				// Beginning only hide later pages
				if( $page2 < 1 + ( $stages * 2 ) ) {
					for( $counter = 1; $counter < 4 + ( $stages * 2 ); $counter++ ) {
						if( $counter == $page2 ) $paginate .= "<span class='current'>$counter</span>";
						else $paginate .= "<a href='$targetpage/$counter$link'>$counter</a>";
					}
					$paginate .= "...";
					$paginate .= "<a href='$targetpage/$LastPagem1$link'>$LastPagem1</a>";
					$paginate .= "<a href='$targetpage/$lastpage$link'>$lastpage</a>";
				}
				// Middle hide some front and some back
				else if( $lastpage - ( $stages * 2 ) > $page2 && $page2 > ( $stages * 2 ) ) {
					$paginate .= "<a href='$targetpage/1'>1</a>";
					$paginate .= "<a href='$targetpage/2'>2</a>";
					$paginate .= "...";
					for( $counter = $page2 - $stages; $counter <= $page2 + $stages; $counter++ ) {
						if( $counter == $page2 ) $paginate .= "<span class='current'>$counter</span>";
						else $paginate .= "<a href='$targetpage/$counter$link'>$counter</a>";
					}
					$paginate .= "...";
					$paginate .= "<a href='$targetpage/$LastPagem1$link'>$LastPagem1</a>";
					$paginate .= "<a href='$targetpage/$lastpage$link'>$lastpage</a>";
				}
				// End only hide early pages
				else {
					$paginate .= "<a href='$targetpage/1$link'>1</a>";
					$paginate .= "<a href='$targetpage/2$link'>2</a>";
					$paginate .= "...";
					for( $counter = $lastpage - ( 2 + ( $stages * 2 ) ); $counter <= $lastpage; $counter++ ) {
						if( $counter == $page2 ) $paginate .= "<span class='current'>$counter</span>";
						else $paginate.= "<a href='$targetpage/$counter$link'>$counter</a>";
					}
				}
			}
			// Next
			if( $page2 < $counter - 1 ) $paginate .= "<a href='$targetpage/$next$link'>next</a>";
			else $paginate .= "<span class='disabled'>next</span>";
			$paginate .= "</div>";
		}
		return array( $start, $limit, $paginate );
	}
	
}