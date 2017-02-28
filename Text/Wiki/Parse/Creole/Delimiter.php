<?php

/**
 *
 * Parses for Text_Wiki delimiter characters already in the source text.
 *
 * This class implements a Text_Wiki_Parse to find instances of the delimiter
 * character already embedded in the source text; it extracts them and replaces
 * them with a delimited token, then renders them as the delimiter itself
 * when the target format is XHTML.
 *
 * @category Text
 *
 * @package Text_Wiki
 *
 * @author Paul M. Jones <pmjones@php.net>
 *
 * @license LGPL
 *
 * @version $Id$
 *
 */

class Text_Wiki_Parse_Delimiter extends Text_Wiki_Parse {

    /**
     * Constructor.  Overrides the Text_Wiki_Parse constructor so that we
     * can set the $regex property dynamically (we need to include the
     * Text_Wiki $delim character.
     *
     * @param object $obj The calling "parent" Text_Wiki object.
     */
    function __construct($obj)
    {
        parent::__construct($obj);
        $this->regex = '/' . $this->wiki->delim . '/';
    }

    /**
     * PHP4 constructor for backwards compatibility with old code
     *
     * @param object $obj The calling "parent" Text_Wiki object.
     */
    function Text_Wiki_Parse_Delimiter($obj)
    {
        self::__construct($obj);
    }


    /**
     *
     * Generates a token entry for the matched text.  Token options are:
     *
     * 'text' => The full matched text.
     *
     * @access public
     *
     * @param array &$matches The array of matches from parse().
     *
     * @return A delimited token number to be used as a placeholder in
     * the source text.
     *
     */

    function process(&$matches)
    {
        return $this->wiki->addToken(
            $this->rule,
            array('text' => $this->wiki->delim)
        );
    }
}
?>