<?php
// the namespace
namespace Weblab\Breadcrumb;

/**
 * Class to generate breadcrumbs
 *
 * @author Weblab.nl - Thomas Marinissen
 */
class Breadcrumb {

    /**
     * The singleton instance of the class
     *
     * @var \Html\Breadcrumb|null
     */
    private static $instance = null;

    /**
     * The different steps of the breadcrumb path
     *
     * @var array
     */
    private $breadcrumbPath = array();

    /**
     * The seperator between the crumbs
     *
     * @var string
     */
    private $separator = ' ';

    /**
     * Constructor
     */
    private function __construct() { }

    /**
     * Singleton access to the class
     *
     * @return Breadcrumb|null                  The singleton instance of this class
     */
    public static function instance() {
        // if the instance is set already, return it
        if (!is_null(self::$instance)) {
            return self::$instance;
        }

        // done, return a new instance
        return self::$instance = new \Weblab\Breadcrumb\Breadcrumb();
    }

    /**
     * Get the breadcrumb path
     *
     * @return array                        The breadcrumb path
     */
    public function breadcrumbPath() {
        return $this->breadcrumbPath;
    }

    /**
     * Get the separator
     *
     * @return string                       The separator
     */
    public function separator() {
        return $this->separator;
    }

    /**
     * Add a crumble to the crumble path
     *
     * @param   string                          The title of the crumble
     * @param   string                          The link of the crumble
     * @param   string|null                     The name of the crumble
     * @return  \Html\Breadcrumb                The instance of this, to make chaining possible
     */
    public function addBreadcrumb($title, $link, $name = null) {
        // set the breadcrumb
        $this->breadcrumbPath[] = array(
            'title' => $title,
            'link'  => $link,
            'name'  => !is_null($name) ? $name : $title,
        );

        // done, return the instance of this, to make chaining possible
        return $this;
    }

    /**
     * Set the separator
     *
     * @param   string                      The separator to set
     * @return  \Html\Breadcrumb            The instance of this, to make chaining possible
     */
    public function setSeparator($separator) {
        $this->separator = $separator;

        // done, return the instance of this, to make chaining possible
        return $this;
    }

    /**
     * Get the markup of the crumble path
     *
     * @return  string                  The string value of the breadcrumb
     */
    public function __toString() {
        // get the crumble path
        $breadcrumbPath = $this->breadcrumbPath();

        // generate the markup of the breadcrumb path
        $html = array();
        foreach ($breadcrumbPath as $key => $crumble) {
            $html[] = '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">'
                    .'<a href="' . $crumble['link'] . '">'
                        . $crumble['title']
                        . '<meta itemprop="name" content="' . $crumble['name'] . '" />'
                    . '</a>'
                    . '<meta itemprop="url" content="' . $crumble['link'] . '" />'
                    . '<meta itemprop="position" content="' . ($key + 1) . '" />'
                . '</li>';
        }

        // wrap the breadcrumb list into an unordered list
        $html = '<ul itemscope itemtype="http://schema.org/BreadcrumbList">' . implode($this->separator(), $html) . '</ul>';

        // done, return the html markup of the crumble path
        return $html;
    }
}
