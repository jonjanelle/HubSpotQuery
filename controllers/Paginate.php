
<?php

class Paginator {
  private $_nPerPage;
  private $_total;


  public function getPaginateHTML()
  {
    $last = ceil( $this->_total / $this->_limit );

    $start = (( $this->_page - $links ) > 0 ) ? $this->_page - $links : 1;
    $end = (($this->_page + $links ) < $last ) ? $this->_page + $links : $last;

    $html = '<ul class="' . $list_class . '">';

    $class = ( $this->_page == 1 ) ? "disabled" : "";
    $html .= '<li class="' . $class . '"><a href="?limit=' . $this->_limit . '&page=' . ( $this->_page - 1 ) . '">&laquo;</a></li>';

    if ( $start > 1 ) {
      $html .= '<li><a href="?limit=' . $this->_limit . '&page=1">1</a></li>';
      $html .= '<li class="disabled"><span>...</span></li>';
    }

    for ( $i = $start ; $i <= $end; $i++ ) {
      $class = ( $this->_page == $i ) ? "active" : "";
      $html .= '<li class="' . $class . '"><a href="?limit=' . $this->_limit . '&page=' . $i . '">' . $i . '</a></li>';
    }

    if ( $end < $last ) {
      $html .= '<li class="disabled"><span>...</span></li>';
      $html .= '<li><a href="?limit=' . $this->_limit . '&page=' . $last . '">' . $last . '</a></li>';
    }

    $class = ( $this->_page == $last ) ? "disabled" : "";
    $html .= '<li class="' . $class . '"><a href="?limit=' . $this->_limit . '&page=' . ( $this->_page + 1 ) . '">&raquo;</a></li>';

    $html .= '</ul>';

    return $html;
  }
