<?php
/**
 *
 * Dynmic_menu.php
 *
 */
class Dynamic_menu {

    private $ci;                // for CodeIgniter Super Global Reference.

    private $id_menu        = 'id="categorymenu"';
    private $class_menu     = 'class="mcdropdown_menu"';
    private $class_parent   = 'class="parent"';
    private $class_last     = 'class="last"';

    // --------------------------------------------------------------------

    /**
     * PHP5        Constructor
     *
     */
    function __construct()
    {
        $this->ci =& get_instance();    // get a reference to CodeIgniter.
    }

    // --------------------------------------------------------------------

    /**
     * build_menu($table, $type)
     *
     * Description:
     *
     * builds the Dynaminc dropdown menu
     * $table allows for passing in a MySQL table name for different menu tables.
     * $type is for the type of menu to display ie; topmenu, mainmenu, sidebar menu
     * or a footer menu.
     *
     * @param    string    the MySQL database table name.
     * @param    string    the type of menu to display.
     * @return    string    $html_out using CodeIgniter achor tags.
     */
    function build_menu($table = 'category')
    {
        $menu = array();

        // use active record database to get the menu.
        $query = $this->ci->db->get($table);

        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $menu[$row->id]['id']           = $row->id;
                $menu[$row->id]['title']        = $row->title;
                $menu[$row->id]['link']         = '';
                $menu[$row->id]['page']         = '';
                $menu[$row->id]['module']       = $row->title;
                $menu[$row->id]['url']          = '';
                $menu[$row->id]['uri']          = '';
                $menu[$row->id]['dyn_group']    = '';
                $menu[$row->id]['position']     = '';
                $menu[$row->id]['target']       = '';
                $menu[$row->id]['parent']       = $row->category_upper;
                $menu[$row->id]['is_parent']    = '';
                $menu[$row->id]['show']         = 1;
            }
        }
        $query->free_result();    // The $query result object will no longer be available

        // ----------------------------------------------------------------------     
        // now we will build the dynamic menus.
        //$html_out  = "\t".'<div '.$this->id_menu.'>'."\n";

		$html_out = "\t\t".'<ul '.$this->id_menu." ".$this->class_menu.'>'."\n";

        // loop through the $menu array() and build the parent menus.
        for ($i = 1; $i <= count($menu); $i++)
        {
            if (is_array($menu[$i]))    // must be by construction but let's keep the errors home
            {
                if ($menu[$i]['show'] && $menu[$i]['parent'] == 0)    // are we allowed to see this menu?
                {
                    if ($menu[$i]['is_parent'] == TRUE)
                    {
                        // CodeIgniter's anchor(uri segments, text, attributes) tag.
                        $html_out .= "\t\t\t".'<li rel="'.$menu[$i]['id'].'">'.$menu[$i]['title'];
                    }
                    else
                    {
                        $html_out .= "\t\t\t\t".'<li rel="'.$menu[$i]['id'].'">'.$menu[$i]['title'];
                    }

                    // loop through and build all the child submenus.
                    $html_out .= $this->get_childs($menu, $i);

                    $html_out .= '</li>'."\n";
                }
            }
            else
            {
                exit (sprintf('menu nr %s must be an array', $i));
            }
        }

        $html_out .= "\t\t".'</ul>' . "\n";
       // $html_out .= "\t".'</div>' . "\n";

        return $html_out;
    }  
	/**
     * get_childs($menu, $parent_id) - SEE Above Method.
     *
     * Description:
     *
     * Builds all child submenus using a recurse method call.
     *
     * @param    mixed    $menu    array()
     * @param    string    $parent_id    id of parent calling this method.
     * @return    mixed    $html_out if has subcats else FALSE
     */
    function get_childs($menu, $parent_id)
    {
        $has_subcats = FALSE;

        $html_out  = '';
        //$html_out .= "\n\t\t\t\t".'<div>'."\n";
        $html_out .= "\t\t\t\t\t".'<ul>'."\n";

        for ($i = 1; $i <= count($menu); $i++)
        {
            if ($menu[$i]['show'] && $menu[$i]['parent'] == $parent_id)    // are we allowed to see this menu?
            {
                $has_subcats = TRUE;

                if ($menu[$i]['is_parent'] == TRUE)
                {
                    $html_out .= "\t\t\t\t\t\t".'<li rel="'.$menu[$i]['id'].'">'.$menu[$i]['title'];
                }
                else
                {
                    $html_out .= "\t\t\t\t\t\t".'<li rel="'.$menu[$i]['id'].'">'.$menu[$i]['title'];
                }

                // Recurse call to get more child submenus.
                $html_out .= $this->get_childs($menu, $i);

                $html_out .= '</li>' . "\n";
            }
        }
        $html_out .= "\t\t\t\t\t".'</ul>' . "\n";
       // $html_out .= "\t\t\t\t".'</div>' . "\n";

        return ($has_subcats) ? $html_out : FALSE;
    }
}
// ------------------------------------------------------------------------
// End of Dynamic_menu Library Class.

// ------------------------------------------------------------------------
/* End of file Dynamic_menu.php */
/* Location: ../application/libraries/Dynamic_menu.php */  