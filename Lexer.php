<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
// +----------------------------------------------------------------------+
// | Copyright (c) 2002 Brent Cook                                        |
// +----------------------------------------------------------------------+
// | This library is free software; you can redistribute it and/or        |
// | modify it under the terms of the GNU Lesser General Public           |
// | License as published by the Free Software Foundation; either         |
// | version 2.1 of the License, or (at your option) any later version.   |
// |                                                                      |
// | This library is distributed in the hope that it will be useful,      |
// | but WITHOUT ANY WARRANTY; without even the implied warranty of       |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU    |
// | Lesser General Public License for more details.                      |
// |                                                                      |
// | You should have received a copy of the GNU Lesser General Public     |
// | License along with this library; if not, write to the Free Software  |
// | Foundation, Inc., 59 Temple Place, Suite 330,Boston,MA 02111-1307 USA|
// +----------------------------------------------------------------------+
//
// $Id$
//

include 'SQL/ctype.php';

// {{{ token definitions
// variables: 'ident', 'sys_var'
// values:    'real_val', 'text_val', 'int_val', null
// }}}

/**
 * A lexigraphical analyser inspired by the msql lexer
 *
 * @author  Brent Cook <busterb@mail.utexas.edu>
 * @version 0.19
 * @access  public
 * @package DBA
 */
class Lexer
{
    // array of valid tokens for the lexer to recognize
    // format is 'token literal'=>TOKEN_VALUE
    var $symbols = array();

// {{{ instance variables
    var $tokPtr = 0;
    var $tokStart = 0;
    var $tokLen = 0;
    var $tokText = '';
    var $lineNo = 0;
    var $lineBegin = 0;
    var $string = '';
    var $stringLen = 0;
// }}}

// {{{ incidental functions
    function Lexer($string = '')
    {
        $this->string = $string;
        $this->stringLen = strlen($string);
    }

    function get() {
        ++$this->tokLen;
        return $this->string{$this->tokPtr++};
    }

    function unget() {
        --$this->tokPtr;
        --$this->tokLen;
    }

    function skip() {
        ++$this->tokStart;
        return ($this->tokPtr != $this->stringLen) ? $this->string{$this->tokPtr++} : '';
    }

    function revert() {
        $this->tokPtr = $this->tokStart;
        $this->tokLen = 0;
    }

    function isCompop($c) {
        return (($c == '<') || ($c == '>') || ($c == '='));
    }
// }}}

// {{{ lex()
function lex()
{
    if ($this->string == '') return;
    $state = 0;
    while (1) {
        //echo "State: $state, Char: $c\n";
        switch($state) {
            // {{{ State 0 : Start of token
            case 0:
                $this->tokPtr = $this->tokStart;
                $this->tokText = '';
                $this->tokLen = 0;
                $c = $this->get();
                while (($c == ' ') || ($c == "\t") || ($c == "\n")) {
                    if ($c == "\n") {
                        ++$this->lineNo;
                        $this->lineBegin = $this->tokPtr;
                    }
                    $c = $this->skip();
                    $this->tokLen = 1;
                }
                if (($c == '\'') || ($c == '"')) {
                    $quote = $c;
                    $state = 12;
                    break;
                }
                if ($c == '_') {
                    $state = 18;
                    break;
                }
                if (ctype_alpha(ord($c))) {
                    $state = 1;
                    break;
                }
                if (ctype_digit(ord($c))) {
                    $state = 5;
                    break;
                }
                if ($c == '.') {
                    $t = $this->get();
                    if (ctype_digit(ord($t))) {
                        $this->unget();
                        $state = 7;
                        break;
                    } else {
                        $this->unget();
                    }
                }
                if ($c == '-') {
                    $state = 9;
                    break;
                }
                if ($this->isCompop($c)) {
                    $state = 10;
                    break;
                }
                if ($c == '#') {
                    $state = 14;
                    break;
                }
                if ($c == false) {
                    $state = 1000;
                    break;
                }
                $state = 999;
                break;
            // }}}

            // {{{ State 1 : Incomplete keyword or ident
            case 1:
                $c = $this->get();
                if (ctype_alnum(ord($c)) || ($c == '_')) {
                    $state = 1;
                    break;
                }
                $state = 2;
                break;
            // }}}

            /* {{{ State 2 : Complete keyword or ident */
            case 2:
                $this->unget();
                $this->tokText = substr($this->string, $this->tokStart,
                                        $this->tokLen);
                $testToken = strtolower($this->tokText);
                if (isset($this->symbols[$testToken])) {
                    $this->tokStart = $this->tokPtr;
                    return $testToken;
                } else {
                    $this->tokStart = $this->tokPtr;
                    return 'ident';
                }
                break;
            // }}}

            // {{{ State 5: Incomplete real or int number
            case 5:
                $c = $this->get();
                if (ctype_digit(ord($c))) {
                    $state = 5;
                    break;
                }
                if ($c == '.') {
                    $state = 7;
                    break;
                }
                $state = 6;
                break;
            // }}}

            // {{{ State 6: Complete integer number
            case 6:
                $this->unget();
                $this->tokText = intval(substr($this->string, $this->tokStart,
                                        $this->tokLen));
                $this->tokStart = $this->tokPtr;
                return 'int_val';
                break;
            // }}}

            // {{{ State 7: Incomplete real number
            case 7:
                $c = $this->get();

                /* Analogy Start */
                if ($c == 'e' || $c == 'E') {
                        $state = 15;
                        break;
                }
                /* Analogy End   */

                if (ctype_digit(ord($c))) {
                    $state = 7;
                    break;
                }
                $state = 8;
                break;
            // }}}

            // {{{ State 8: Complete real number */
            case 8:
                $this->unget();
                $this->tokText = floatval(substr($this->string, $this->tokStart,
                                        $this->tokLen));
                $this->tokStart = $this->tokPtr;
                return 'real_val';
            // }}}

            // {{{ State 9: Incomplete negative number
            case 9:
                $c = $this->get();
                if (ctype_digit(ord($c))) {
                    $state = 5;
                    break;
                }
                if ($c == '.') {
                    $state = 7;
                    break;
                }
                $state = 999;
                break;
            // }}}

            // {{{ State 10: Incomplete comparison operator
            case 10:
                $c = $this->get();
                if ($this->isCompop($c))
                {
                    $state = 10;
                    break;
                }
                $state = 11;
                break;
            // }}}

            // {{{ State 11: Complete comparison operator
            case 11:
                $this->unget();
                $tokval = substr($this->string, $this->tokStart, $this->tokLen);
                if ($tokval)
                {
                    $this->tokStart = $this->tokPtr;
                    return $tokval;
                }
                $state = 999;
                break;
            // }}}

            // {{{ State 12: Incomplete text string
            case 12:
                $bail = false;
                while (!$bail) {
                    switch ($this->get()) {
                        case '':
                            $this->tokText = null;
                            $bail = true;
                            break;
                        case "\\":
                            if (!$this->get()) {
                                $this->tokText = null;
                                $bail = true;
                            }
                                //$bail = true;
                            break;
                        case $quote:
                            $this->tokText = stripslashes(substr($this->string,
                                       ($this->tokStart+1), ($this->tokLen-2)));
                            $bail = true;
                            break;
                    }
                }
                if (!is_null($this->tokText)) {
                    $state = 13;
                    break;
                }
                $state = 999;
                break;
            // }}}

            // {{{ State 13: Complete text string
            case 13:
                $this->tokStart = $this->tokPtr;
                return 'text_val';
                break;
            // }}}

            // {{{ State 14: Comment
            case 14:
                $c = $this->skip();
                if ($c == '\n') {
                    $state = 0;
                } else {
                    $state = 14;
                }
                break;
            // }}}

    // Analogy Start
            // {{{ State 15: Exponent Sign in Scientific Notation
            case 15:
                    $c = $this->get();
                    if($c == '-' || $c == '+') {
                            $state = 16;
                            break;
                    }
                    $state = 999;
                    break;
            // }}}

            // {{{ state 16: Exponent Value-first digit in Scientific Notation
            case 16:
                    $c = $this->get();
                    if (ctype_digit(ord($c))) {
                            $state = 17;
                            break;
                    }
                    $state = 999;  // if no digit, then token is unknown
                    break;
            // }}}

            // {{{ State 17: Exponent Value in Scientific Notation
            case 17:
                    $c = $this->get();
                    if (ctype_digit(ord($c))) {
                            $state = 17;
                            break;
                    }
                    $state = 8;  // At least 1 exponent digit was required
                    break;
            // }}}
    // Analogy End

            // {{{ State 18 : Incomplete System Variable
            case 18:
                $c = $this->get();
                if (ctype_alnum(ord($c)) || $c == '_') {
                    $state = 18;
                    break;
                }
                $state = 19;
                break;
            // }}}

            // {{{ State 19: Complete Sys Var
            case 19:
                $this->unget();
                $this->tokText = substr($this->tokStart,$this->tokLen);
                $this->tokStart = $this->tokPtr;
                return 'sys_var';
            // }}}

            // {{{ State 999 : Unknown token.  Revert to single char
            case 999:
                $this->revert();
                $this->tokText = $this->get();
                $this->tokStart = $this->tokPtr;
                return $this->tokText;
            // }}}

            // {{{ State 1000 : End Of Input
            case 1000:
                $this->tokText = '*end of input*';
                $this->tokStart = $this->tokPtr;
                return null;
            // }}}

        }
    }
}
// }}}
}
?>
